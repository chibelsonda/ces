<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Services\InstructorService;
use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;

class InstructorController extends Controller
{

    public function __construct(
        private $instructorService = new InstructorService()
    ){}

    public function index()
    {
        $instructors = $this->instructorService->getAll();

        return view('instructor.index', compact('instructors'))
               ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('instructor.create');
    }

    public function store(StoreInstructorRequest $request)
    {
        $instructor = $request->except(['_token','_method']);

        $this->instructorService->store($instructor);
        
        return redirect()->route('instructors.index')
                ->with('success','Instructor has been created successfully.');
        
    }

    public function show(Instructor $instructor)
    {
        return view('instructor.show', compact('instructor'));
    }

    public function edit(Instructor $instructor)
    {
        return view('instructor.edit', compact('instructor'));
    }

    public function update(UpdateInstructorRequest $request, Instructor $instructor)
    {
        $data = $request->except(['_token','_method']);

        $instructor->update($data);
      
        return redirect()->route('instructors.index')
               ->with('success','Instructor has been updated successfully');
    }

    public function destroy(Instructor $instructor)
    {  
        $instructor->delete();

        return redirect()->route('instructors.index')
                ->with('success','Instructor has been deleted successfully');
        
    }
}
