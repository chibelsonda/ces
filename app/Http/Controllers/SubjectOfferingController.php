<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Models\SubjectOffering;
use App\Services\CourseService;
use App\Services\SubjectService;
use App\Services\RoomService;
use App\Services\InstructorService;
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
        private $subjectService = new SubjectService(),
        private $instructorService = new InstructorService(),
        private $roomService = new RoomService(),
    ){}
    
    public function index()
    {
        $subjectOfferings = $this->subjectOfferingService->getAll();
        $courses = $this->courseService->getCourses();
        $subjects = $this->subjectService->getSubjects();
        $sections = $this->getSections();
        $schoolYears = $this->createSchoolYears();
        $semesters = $this->getSemesters();
        $yearLevels = $this->getYearLevels();

        return view('subject_offering.index', compact(
                'subjectOfferings', 
                'sections', 
                'subjects', 
                'courses',
                'schoolYears',
                'semesters',
                'yearLevels'
            ))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $courses = $this->courseService->getCourses();
        $subjects = $this->subjectService->getSubjects();
        $sections = $this->getSections();
        $yearLevels = $this->getYearLevels();
        $schoolYears = $this->createSchoolYears();
        $semesters = $this->getSemesters();

        return view('subject_offering.create', compact(
            'courses', 
            'subjects', 
            'sections',
            'schoolYears',
            'semesters',
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
        $timeIntervals = $this->generateTimeIntervals();
        $rooms = $this->roomService->getRooms();
        $instructors = $this->instructorService->getInstructors();
        $days = $this->getDays();

        $subjectOffering = $this->subjectOfferingService->getDetails($subjectOffering->id);
        
        return view('subject_offering_schedule.index', compact(
            'subjectOffering',
            'timeIntervals',
            'rooms',
            'instructors',
            'days'
        ));
    }

    public function edit(SubjectOffering $subjectOffering)
    {
        $courses = $this->courseService->getCourses();
        $subjects = $this->subjectService->getSubjects();
        $sections = $this->getSections();
        $yearLevels = $this->getYearLevels();
        $schoolYears = $this->createSchoolYears();
        $semesters = $this->getSemesters();

        return view('subject_offering.edit', compact(
                'courses', 
                'subjects', 
                'sections', 
                'subjectOffering',
                'yearLevels',
                'schoolYears',
                'semesters'
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
        $sections = $this->getSections();
        $schoolYears = $this->createSchoolYears();
        $yearLevels = $this->getYearLevels();

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

    private function getSections()
    {
        return config('constants.SECTIONS');
    }

    private function getYearLevels()
    {
        return config('constants.YEAR_LEVELS');
    }

    private function getSemesters()
    {
        return config('constants.SEMESTERS');
    }

    private function generateTimeIntervals()
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

    private function getDays()
    {
        return config('constants.DAYS');
    }
}
