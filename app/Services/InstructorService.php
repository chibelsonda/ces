<?php

namespace App\Services;

use App\Models\Instructor;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class InstructorService{

    /** 
     * @return LengthAwarePaginator
     */
    public function getAll() : LengthAwarePaginator
    {
        return Instructor::latest()->paginate(5);
    }

    public function store($course) 
    {
        return Instructor::insert($course);
    }

}