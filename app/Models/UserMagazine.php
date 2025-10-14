<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMagazine extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_subscription_id',
        'magazine_id',
        'user_id',
        'status',
        'next_sub'
    ];

    /**
     * Relationships
     */

    // A user magazine belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A user magazine belongs to a subscription
    public function subscription()
    {
        return $this->belongsTo(UserSubscription::class, 'user_subscription_id');
    }

    // A user magazine belongs to a magazine
    public function magazine()
    {
        return $this->belongsTo(Magazine::class,'magazine_id');
    }

    /**
     * Relationship: User magazine has issue sequences
     */
    public function issueSequence(){
        return $this->hasMany(IssueSequence::class, 'user_magazine_id');
    }
}
