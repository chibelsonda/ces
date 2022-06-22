<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectOfferingSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_offering_id',
        'room_id',
        'instructor_id',
        'days',
        'time_start',
        'time_end',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;
}
