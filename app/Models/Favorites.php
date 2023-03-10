<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Favorites extends Model
{
    use HasFactory;


    protected $fillable = [
        'post_id',
        'user_id',
    ];

    public function post() {
        return $this->belongsTo(Posts::class);
    }

}
