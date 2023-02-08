<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $adminUser = new Permission();
        $adminUser->name = 'Admin user';
        $adminUser->slug = 'admin-user';
        $adminUser->save();

        $user = new Permission();
        $user->name = 'User';
        $user->slug = 'user';
        $user->save();
    }
}
