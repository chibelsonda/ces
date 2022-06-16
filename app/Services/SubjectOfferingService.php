<?php

namespace App\Services;

use App\Models\SubjectOffering;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SubjectOfferingService{

    /** 
     * @return LengthAwarePaginator
     */
    public function getAll($filter = null) : LengthAwarePaginator
    {
        $section = $filter->section ?? null;
        $courseId = $filter->course_id ?? null;
        $ubjectId = $filter->subject_id ?? null;
        $schoolYear = $filter->school_year ?? null;
        $yearLevel = $filter->year_level ?? null;

        $subjectOfferings = SubjectOffering::select('subject_offerings.id', 
                'subject_offerings.school_year',
                'subject_offerings.section',
                'c.name AS course', 
                's.code AS subject', 
                's.description')
            ->join('courses AS c', 'c.id', '=', 'subject_offerings.course_id')
            ->join('subjects AS s', 's.id', '=', 'subject_offerings.subject_id')
            ->when($section, function($query, $section) {
                $query->where('subject_offerings.section', $section);
            })
            ->when($courseId, function($query, $courseId) {
                $query->where('subject_offerings.course_id', $courseId);
            })
            ->when($schoolYear, function($query, $schoolYear) {
                $query->where('subject_offerings.school_year', $schoolYear);
            })
            ->when($ubjectId, function($query, $ubjectId) {
                $query->where('subject_offerings.subject_id', $ubjectId);
            })
            ->when($yearLevel, function($query, $yearLevel) {
                $query->where('subject_offerings.year_level', $yearLevel);
            })
            ->paginate(5);

        return $subjectOfferings;
    }

    public function store($subjectOffering) 
    {
        return SubjectOffering::create($subjectOffering);
    }
}