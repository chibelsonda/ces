<?php

namespace App\Services;

use App\Models\SubjectOfferingSchedule;
use App\Models\SubjectOffering;

class SubjectOfferingScheduleService{

    public function store($subjectOfferingSchedule) 
    {
        return SubjectOfferingSchedule::create($subjectOfferingSchedule);
    }

    public function getSectionSchedules($subjectOffering)
    {
        $sectionSchedules = SubjectOffering::select(
                'subject_offerings.id',
                'sos.days',
                'sos.time_start',
                'sos.time_end',
                's.code',
                's.description'
             )
            ->join('subject_offering_schedules AS sos', 'sos.subject_offering_id', '=', 'subject_offerings.id')
            ->join('subjects AS s', 's.id', '=', 'subject_offerings.subject_id')
            ->where('subject_offerings.school_year', '=', $subjectOffering->school_year)
            ->where('subject_offerings.section', '=', $subjectOffering->section)
            ->where('subject_offerings.year_level', '=', $subjectOffering->year_level)
            ->where('subject_offerings.course_id', '=', $subjectOffering->course_id)
            ->get();

        return $sectionSchedules;
    }
}