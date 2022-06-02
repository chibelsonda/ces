<?php

namespace App\Services;

use App\Models\Subject;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SubjectService{

    /** 
     * @return LengthAwarePaginator
     */
    public function getAll() : LengthAwarePaginator
    {
        return Subject::latest()->paginate(5);
    }

    public function store($subject) 
    {
        return Subject::insert($subject);
    }

}