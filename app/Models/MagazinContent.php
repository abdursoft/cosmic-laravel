<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MagazinContent extends Model
{
    protected $table = 'magazin_contents';

    protected $fillable = [
        'magazine_id',
        'url',
        'path',
        'ext',
        'index_number',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'index_number' => 'integer'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }

    // Giff
    public function giffs(){
        return $this->where('ext','giff')->get();
    }

    //videos 
    public function videos(){
        return $this->whereIn('ext',['mp4','webm'])->get();
    }
}