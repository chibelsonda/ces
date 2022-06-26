<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectOfferingScheduleRequest;
use App\Http\Requests\UpdateSubjectOfferingScheduleRequest;
use App\Services\SubjectOfferingScheduleService;

class SubjectOfferingScheduleController extends Controller
{
    public function __construct(
        private $subjectOfferingScheduleService = new SubjectOfferingScheduleService()
    ){}

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreSubjectOfferingScheduleRequest $request)
    {

        $subjectOfferingSchedule = $request->except(['_token','_method']);

        $this->subjectOfferingScheduleService->store($subjectOfferingSchedule);

        return response()->json([
            'message' => 'Schedule has been saved.',
            'success' => true
        ], 201);
    }

    public function show(SubjectOfferingSchedule $subjectOfferingSchedule)
    {
        //
    }

    public function edit(SubjectOfferingSchedule $subjectOfferingSchedule)
    {
        //
    }

    public function update(UpdateSubjectOfferingScheduleRequest $request, SubjectOfferingSchedule $subjectOfferingSchedule)
    {
        //
    }

    public function destroy(SubjectOfferingSchedule $subjectOfferingSchedule)
    {
        //
    }

    public function getSectionSchedules($subjectOffering)
    {
        $sectionSchedules = $this->subjectOfferingScheduleService->getSectionSchedules(json_decode($subjectOffering));

        return response()->json([
            'section_schedules' => $sectionSchedules
        ], 200);
    }
}
