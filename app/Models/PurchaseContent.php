<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseContent extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'magazine_content_id'
    ];

    // user magazine content
    public function contents(){
        return $this->belongsTo(MagazinContent::class, 'magazin_content_id');
    }
}
