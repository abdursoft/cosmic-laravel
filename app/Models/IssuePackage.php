<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssuePackage extends Model
{
    protected $fillable = [
        'issue_id',
        'package_id'
    ];
}
