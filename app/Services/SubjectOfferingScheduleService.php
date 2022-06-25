<?php

namespace App\Services;

use App\Models\SubjectOfferingSchedule;

class SubjectOfferingScheduleService{

    public function store($subjectOfferingSchedule) 
    {
        return SubjectOfferingSchedule::create($subjectOfferingSchedule);
    }
}