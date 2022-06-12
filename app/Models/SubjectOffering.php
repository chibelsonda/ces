<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectOffering extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id', 
        'subject_id',
        'school_year',
        'section'
    ];

    public $timestamps = true;
}
