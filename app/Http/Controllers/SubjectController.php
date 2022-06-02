<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use App\Services\SubjectService;

class SubjectController extends Controller
{

    public function __construct(
        private $subjectService = new SubjectService()
    ){}

    public function index()
    {
        $subjects = $this->subjectService->getAll();

        return view('subject.index', compact('subjects'))
               ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('subject.create');
    }

    public function store(StoreSubjectRequest $request)
    {
        $subject = $request->except(['_token','_method']);

        $this->subjectService->store($subject);
        
        return redirect()->route('subjects.index')
                ->with('success','Subject has been created successfully.');
        
    }

    public function show(Subject $subject)
    {
        return view('subject.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        return view('subject.edit', compact('subject'));
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $data = $request->except(['_token','_method']);

        $subject->update($data);
      
        return redirect()->route('subjects.index')
               ->with('success','Subject has been updated successfully');
    }

    public function destroy(Subject $subject)
    {  
        $subject->delete();

        return redirect()->route('subjects.index')
                ->with('success','Subject has been deleted successfully');
        
    }
}
