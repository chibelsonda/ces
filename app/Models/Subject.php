<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'code', 
        'description',
        'units',
        'created_at',
        'update_at'
    ];

    public $timestamps = true;
}
