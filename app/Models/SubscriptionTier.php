<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionTier extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_id',
        'user_id',
        'package_id',
        'x_package',
        'subscription_id',
        'status',
        'payment_url',
        'magazines',
    ];

    /**
     * Relationship with User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with UserSubscription
     */
    public function subscription()
    {
        return $this->belongsTo(UserSubscription::class, 'subscription_id');
    }


    /**
     * Relationship with package
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Relationship with x package
     */
    public function xPackage(){
        return $this->belongsTo(Package::class, 'x_package');
    }
}
