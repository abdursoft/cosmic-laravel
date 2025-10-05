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
        'publish_date',
        'publish_status'
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

    /**
     * Relationship with user magazines table
     */
    public function userMagazine(){
        return $this->hasMany(UserMagazine::class);
    }

    /**
     * Relationship: Shopping cart has magazines
     */
    public function shoppingCart(){
        return $this->hasMany(ShoppingCart::class);
    }


    /**
     * check model is archive access
     */
    public function accessible(){
        if($this->archive_access == '1'){
            return true;
        }
        return false;
    }

    /**
     * Check model is publish
     */
    public function publish(){
        if($this->publish_status == 'published'){
            return true;
        }
        return false;
    }
}
