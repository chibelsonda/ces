<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Services\CourseService;

class CourseController extends Controller
{
    public function __construct(
        private $courseService = new CourseService()
    ){}

    public function index()
    {
        $courses = $this->courseService->getAll();

        return view('course.index', compact('courses'))
               ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(StoreCourseRequest $request)
    {
        $course = $request->except(['_token','_method']);

        $this->courseService->store($course);
        
        return redirect()->route('courses.index')
                ->with('success','Course has been created successfully.');
        
    }

    public function show(Course $course)
    {
        return view('course.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('course.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $data = $request->except(['_token','_method']);

        $course->update($data);
      
        return redirect()->route('courses.index')
               ->with('success','Course has been updated successfully');
    }

    public function destroy(Course $course)
    {  
        $course->delete();

        return redirect()->route('courses.index')
                ->with('success','Course has been deleted successfully');
        
    }
}
