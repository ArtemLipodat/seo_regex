<?php

namespace App\Traits;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasRolesAndPermissions {

    /**
    * @return BelongsToMany
     */
    public function roles(): BelongsToMany {
        return $this->belongsToMany(Role::class,'users_roles');
    }
    /**
    * @return BelongsToMany
     */
    public function permissions(): BelongsToMany {
        return $this->belongsToMany(Permission::class,'users_permissions');
    }

    public function hasRole(... $roles ): bool {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    public function giveRolesTo(... $roles): static {
        $roles = $this->getAllRoles($roles);
        if($roles === null) {
            return $this;
        }
        $this->roles()->saveMany($roles);
        return $this;
    }

    public function getAllRoles(array $roles) {
        return Role::whereIn('slug',$roles)->get();
    }

    /**
     * @param $permission
     * @return bool
     */
    public function hasPermission($permission): bool {
        return (bool) $this->permissions->where('slug', $permission)->count();
    }
    /**
     * @param $permission
     * @return bool
     */
    public function hasPermissionTo($permission): bool {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission->slug);
    }

    public function hasPermissionThroughRole($permission): bool {
        foreach ($permission->roles as $role){
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    public function getAllPermissions(array $permissions) {
        return Permission::whereIn('slug',$permissions)->get();
    }

    public function givePermissionsTo(... $permissions): static {
        $permissions = $this->getAllPermissions($permissions);
        if($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }


    /**
     * @param mixed ...$permissions
     * @return $this
     */
    public function deletePermissions(... $permissions ): static {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }
    /**
     * @param mixed ...$permissions
     * @return HasRolesAndPermissions
     */
    public function refreshPermissions(... $permissions ): HasRolesAndPermissions {
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }


}
