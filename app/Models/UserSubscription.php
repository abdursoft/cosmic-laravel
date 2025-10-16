<?php

namespace App\Models;

use Carbon\Carbon;
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
        return $this->belongsTo(Package::class,'package_id');
    }

    /**
     * Get the magazine associated with subscription
     */
    public function userMagazine(){
        return $this->hasMany(UserMagazine::class,'user_subscription_id');
    }

    /**
     * Relationship:  Subscription tier has users
     */
    public function tier(){
        return $this->hasMany(SubscriptionTier::class,'subscription_id');
    }


    /**
     * Package renewal date
     */
    public function nextBill(){
        $bill = null;
        if($this->type == 'monthly'){
            $bill = Carbon::now()->addMonth(1);
        }elseif($this->type == 'weekly'){
            $bill = Carbon::now()->addDays(7);
        }elseif($this->type == 'yearly'){
            $bill = Carbon::now()->addMonths(12);
        }else{
            $bill = Carbon::now()->addCenturies(1);
        }
        return date('M-d-Y',strtotime($bill));
    }
}
