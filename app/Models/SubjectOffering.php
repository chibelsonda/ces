<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectOffering extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id', 
        'year_level',
        'subject_id',
        'school_year',
        'semester',
        'section',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;
}
