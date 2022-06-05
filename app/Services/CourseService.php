<?php

namespace App\Services;

use App\Models\Course;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CourseService{

    /** 
     * @return LengthAwarePaginator
     */
    public function getAll() : LengthAwarePaginator
    {
        return Course::latest()->paginate(5);
    }

    public function store($course) 
    {
        return Course::insert($course);
    }

}