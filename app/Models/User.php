<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'otp',
        'role',
        'avatar',
        'password',
        'customer_id',
        'remember_token',
        'password_reset_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'otp',
        'password',
        'remember_token',
        'password_reset_token'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Determine if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Get the user's role.
     *
     * @return bool
     */
    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    // make the relation with user_subscription table
    public function user_subscription(){
        return $this->hasMany(UserSubscription::class);
    }

    /**
     * Make the relation with purchase gif packs
     */
    public function gifs(){
        return $this->hasMany(UserGif::class);
    }

    /**
     * Make the relation with user purchase magazine
     */
    public function userMagazine(){
        return $this->hasMany(UserMagazine::class);
    }

    /**
     * Relationship: Shopping cart has users
     */
    public function shoppingCart(){
        return $this->hasMany(ShoppingCart::class);
    }

    /**
     * Relationship:  Subscription tier has users
     */
    public function tier(){
        return $this->hasMany(SubscriptionTier::class);
    }
}
