<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IssueSequence extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'magazine_id',
        'issue_id',
        'status',
        'user_magazine_id'
    ];

    /**
     * Relationships
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }

    public function userMagazine()
    {
        return $this->belongsTo(UserMagazine::class, 'user_magazine_id');
    }
}
