<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'is_replied',
        'reply_message',
    ];

    /**
     * Get the created at timestamp.
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * Get the updated at timestamp.
     */
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value);
    }
}
