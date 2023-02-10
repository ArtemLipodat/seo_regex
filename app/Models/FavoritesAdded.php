<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritesAdded extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'added'
    ];

    public function posts() {
        $this->hasMany(Posts::class);
    }

}
