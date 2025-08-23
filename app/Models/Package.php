<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'thumbnail',
        'type',
        'description',
        'status',
        'price',
        'price_id',
        'product_id',
    ];

    /**
     * The user who created the package
     */
    public function userSubscription()
    {
        return $this->hasMany(UserSubscription::class);
    }

    public function issues()
    {
        return $this->belongsToMany(Issue::class, 'issue_packages');
    }
}
