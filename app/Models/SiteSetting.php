<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'keywords',
        'email',
        'phone',
        'address',
        'facebook',
        'instagram',
        'twitterX',
        'reddit',
        'youtube',
        'favicon',
        'description'
    ];
}
