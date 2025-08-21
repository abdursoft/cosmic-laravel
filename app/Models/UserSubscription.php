<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'status',
        'price',
        'subscription_id',
        'expire_at',
    ];

    protected $dates = [
        'expire_at',
    ];

    /**
     * Get the user who owns this subscription
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the package associated with this subscription
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
