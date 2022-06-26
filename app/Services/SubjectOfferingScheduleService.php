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

    public function getSchedules($subjectOffering)
    {
        $schoolYear = $subjectOffering->school_year ?? null;
        $instructorId = $subjectOffering->instructor_id ?? null;
        $roomId = $subjectOffering->room_id ?? null;

        $schedules = SubjectOffering::select(
                'subject_offerings.id',
                'sos.days',
                'sos.time_start',
                'sos.time_end',
                's.code',
                's.description'
             )
            ->join('subject_offering_schedules AS sos', 'sos.subject_offering_id', '=', 'subject_offerings.id')
            ->join('subjects AS s', 's.id', '=', 'subject_offerings.subject_id')

            ->when($schoolYear, function($query, $schoolYear) {
                $query->where('subject_offerings.school_year', '=', $schoolYear);
            })
            ->when($instructorId, function($query, $instructorId) {
                $query->where('sos.instructor_id', '=', $instructorId);
            })
            ->when($roomId, function($query, $roomId) {
                $query->where('sos.room_id', '=', $roomId);
            })
            ->get();

        return $schedules;
    }
}