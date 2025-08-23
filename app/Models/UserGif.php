<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGif extends Model
{
    protected $fillable = [
        'gif_pack_id',
        'user_id',
        'status',
        'price',
        'payment_id',
        'txn_id'
    ];

    // connected with gif pack table
    public function packs(){
        return $this->belongsTo(GifPack::class,'gif_pack_id');
    }

    // connected with users table
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
