<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model {
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author',
        'image_path',
        'status'
    ];

    public function favorites() {
        return $this->hasMany(Favorites::class);
    }

}
