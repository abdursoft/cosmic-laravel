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
        'cta_text',
        'price_id',
        'product_id',
        'allowed_magazine'
    ];

    /**
     * The user who created the package
     */
    public function userSubscription()
    {
        return $this->hasMany(UserSubscription::class);
    }

    /**
     * Relationship: Package has to magazines
     */
    public function magazines(){
        return $this->hasMany(Magazine::class);
    }
}
