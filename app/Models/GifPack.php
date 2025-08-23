<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GifPack extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'status',
        'thumbnail',
        'gif_archive'
    ];

    // connect with user gif table
    public function user_gif(){
        return $this->hasMany(UserGif::class);
    }
}
