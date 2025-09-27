<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sub_title',
        'thumbnail',
        'description',
        'issue_path',
        'type',
        'price',
        'status',
        'issue',
        'issue_type',
        'magazine_id',
        'is_archive',
        'issue_index'
    ];

    /**
     * Relationship: Issues belongs to a Magazine
     */
    public function magazines(){
        return $this->belongsTo(Magazine::class, 'magazine_id');
    }

    /**
     * check model is archive or not
     */
    public function isArchive(){
        if($this->is_archive == '1'){
            return true;
        }
        return false;
    }
}
