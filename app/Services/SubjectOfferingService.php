<?php

namespace App\Services;

use App\Models\SubjectOffering;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SubjectOfferingService{

    /** 
     * @return LengthAwarePaginator
     */
    public function getAll() : LengthAwarePaginator
    {
        $subjectOfferings = SubjectOffering::select('subject_offerings.id', 
                'subject_offerings.school_year',
                'subject_offerings.section',
                'c.name AS course', 
                's.code AS subject', 
                's.description')
            ->join('courses AS c', 'c.id', '=', 'subject_offerings.course_id')
            ->join('subjects AS s', 's.id', '=', 'subject_offerings.subject_id')
            ->paginate(5);

        return $subjectOfferings;
    }

    public function store($subjectOffering) 
    {
        return SubjectOffering::create($subjectOffering);
    }
}