<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectOfferingRequest;
use App\Http\Requests\UpdateSubjectOfferingRequest;
use App\Models\SubjectOffering;
use App\Services\SubjectOfferingService;
use App\Services\CourseService;
use App\Services\SubjectService;

class SubjectOfferingController extends Controller
{
    public function __construct(
        private $subjectOfferingService = new SubjectOfferingService(),
        private $courseService = new CourseService(),
        private $subjectService = new SubjectService()
    ){}
    
    public function index()
    {
        $subjectOfferings = $this->subjectOfferingService->getAll();

        return view('subject_offering.index', compact('subjectOfferings'))
               ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $courses = $this->courseService->getCourses();
        $subjects = $this->subjectService->getSubjects();
        $sections = [ 'A', 'B', 'C', 'D', 'E', 'F'];

        $years = [];
        for( $i = 0; $i <= 2; $i++){
            array_push($years, (date('Y') - 1) + $i);
        }

        return view('subject_offering.create', compact('years', 'courses', 'subjects', 'sections'));
    }

    public function store(StoreSubjectOfferingRequest $request)
    {
        $subjectOffering = $request->except(['_token','_method']);

        $this->subjectOfferingService->store($subjectOffering);
        
        return redirect()->route('subject-offerings.index')
                ->with('success','Subject offering has been created successfully.');
    }

    public function show(SubjectOffering $subjectOffering)
    {
        //
    }

    public function edit(SubjectOffering $subjectOffering)
    {
        $courses = $this->courseService->getCourses();
        $subjects = $this->subjectService->getSubjects();
        $sections = [ 'A', 'B', 'C', 'D', 'E', 'F'];

        $years = [];
        for( $i = 0; $i <= 2; $i++){
            array_push($years, (date('Y') - 1) + $i);
        }

        return view('subject_offering.edit', compact('years', 'courses', 'subjects', 'sections', 'subjectOffering'));
    }

    public function update(UpdateSubjectOfferingRequest $request, SubjectOffering $subjectOffering)
    {
        $data = $request->except(['_token','_method']);

        $subjectOffering->update($data);
      
        return redirect()->route('subject-offerings.index')
               ->with('success','Subject offering has been updated successfully');
    }

    public function destroy(SubjectOffering $subjectOffering)
    {
        $subjectOffering->delete();

        return redirect()->route('subject-offerings.index')
                ->with('success','Subject offering has been deleted successfully');
        
    }
}
