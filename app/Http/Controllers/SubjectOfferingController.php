<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Models\SubjectOffering;
use App\Services\CourseService;
use App\Services\SubjectService;
use App\Services\SubjectOfferingService;
use App\Http\Requests\StoreSubjectOfferingRequest;
use App\Http\Requests\UpdateSubjectOfferingRequest;

class SubjectOfferingController extends Controller
{
    const TIME_INTERVAL_START = '08:00';
    const TIME_INTERVAL_END = '20:00';
    const THIRTY_MINUTES_INTERVAL = '30 minutes';

    public function __construct(
        private $subjectOfferingService = new SubjectOfferingService(),
        private $courseService = new CourseService(),
        private $subjectService = new SubjectService()
    ){}
    
    public function index()
    {
        $subjectOfferings = $this->subjectOfferingService->getAll();
        $courses = $this->courseService->getCourses();
        $subjects = $this->subjectService->getSubjects();
        $sections = $this->createSections();
        $schoolYears = $this->createSchoolYears();
        $yearLevels = $this->createYearLevels();

        return view('subject_offering.index', compact(
                'subjectOfferings', 
                'sections', 
                'subjects', 
                'courses',
                'schoolYears',
                'yearLevels'
            ))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $courses = $this->courseService->getCourses();
        $subjects = $this->subjectService->getSubjects();
        $sections = $this->createSections();
        $yearLevels = $this->createYearLevels();
        $schoolYears = $this->createSchoolYears();

        return view('subject_offering.create', compact(
            'courses', 
            'subjects', 
            'sections',
            'schoolYears',
            'yearLevels'
        ));
    }

    public function store(StoreSubjectOfferingRequest $request)
    {
        $subjectOffering = $request->except(['_token','_method']);

        $this->subjectOfferingService->store($subjectOffering);
        
        return redirect()->route('subject-offerings.index')
                ->with('success','Subject offering has been created successfully.');
    }

    public function showSchedules(SubjectOffering $subjectOffering)
    {
        dd($this->getTimeIntervals());

        $subjectOffering = $this->subjectOfferingService->getDetails($subjectOffering->id);
        
        return view('subject_offering_schedule.index', compact('subjectOffering'));
    }

    public function edit(SubjectOffering $subjectOffering)
    {
        $courses = $this->courseService->getCourses();
        $subjects = $this->subjectService->getSubjects();
        $sections = $this->createSections();
        $yearLevels = $this->createYearLevels();
        $schoolYears = $this->createSchoolYears();

        return view('subject_offering.edit', compact(
                'courses', 
                'subjects', 
                'sections', 
                'subjectOffering',
                'yearLevels',
                'schoolYears'
            ));
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

    public function search(Request $request)
    {
        $subjectOfferings = $this->subjectOfferingService->getAll($request);
        $courses = $this->courseService->getCourses();
        $subjects = $this->subjectService->getSubjects();
        $sections = $this->createSections();
        $schoolYears = $this->createSchoolYears();
        $yearLevels = $this->createYearLevels();

        return view('subject_offering.index', compact(
                'subjectOfferings', 
                'sections', 
                'subjects', 
                'courses',
                'schoolYears',
                'yearLevels'
            ))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    private function createSchoolYears()
    {
        $years = [];
        for( $i = 0; $i <= 2; $i++){
            array_push($years, (date('Y') - 1) + $i);
        }

        return  $years;
    }

    private function createSections()
    {
        return ['A', 'B', 'C', 'D', 'E', 'F'];
    }

    private function createYearLevels()
    {
        return [1, 2, 3, 4, 5];
    }

    private function getTimeIntervals()
    {
        $period = CarbonPeriod::create(
            Carbon::Parse(self::TIME_INTERVAL_START), 
            self::THIRTY_MINUTES_INTERVAL, 
            Carbon::Parse(self::TIME_INTERVAL_END)
        );

        $timeIntervals = [];
        foreach($period as $time){
            array_push($timeIntervals, $time->format('h:i A'));
        }

        return $timeIntervals;
    }
}
