<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'sub_title',
        'description',
        'thumbnail',
        'package_id',
        'is_archive',
        'archive_days',
        'archive_access',
        'publish_date'
    ];

    /**
     * Relationship: Magazine belongs to a Package
     */
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    /**
     * Relationship: Magazine has to issues
     */
    public function issues(){
        return $this->hasMany(Issue::class);
    }
}
