@extends('layouts.admin')
 
@section('content')

    <div class="row mb-2">
        <div class="col-12">
            <h2 class="mt-4">Subject Offerings</h2>
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item active">Subject Offerings</li> --}}
            </ol>
        </div>
        
        <div class="row">
            <div class="col-12 col-lg-10">
                <form method="GET" action="{{ url('subject-offerings/search') }}">

                    <div class="row">

                        <div class="col-12 col-md-6 col-lg-2 mb-1">
                            <select class="form-select" name="school_year" aria-label="Select Year">
                                <option value="">Select Year</option>
                                @foreach($schoolYears as $schoolYear)
                                    <option value="{{ $schoolYear }}" @selected(request()->get('school_year') == $schoolYear)>
                                        {{ $schoolYear }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-md-6 col-lg-2 mb-1">
                            <select class="form-select" name="course_id" aria-label="Select Course">
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" @selected(request()->get('course_id') == $course->id)>
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-md-6 col-lg-2 mb-1">
                            <select class="form-select" name="year_level" aria-label="Select Year Level">
                                <option value="">Select Year Level</option>
                                @foreach($yearLevels as $yearLevel)
                                    <option value="{{ $yearLevel }}" @selected(request()->get('year_level') == $yearLevel)>
                                        {{ $yearLevel }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-md-6 col-lg-2 mb-1">
                            <select class="form-select" name="section" aria-label="Select Subject">
                                <option value="">Select Section</option>
                                @foreach($sections as $section)
                                    <option value="{{ $section }}" @selected(request()->get('section') == $section)>
                                        {{ $section }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-md-6 col-lg-2 mb-1">
                            <select class="form-select" name="subject_id" aria-label="Select Subject">
                                <option value="">Select Subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" @selected(request()->get('subject_id') == $subject->id)>
                                        {{ $subject->code }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="col-12 col-md-6 col-lg-2 mb-1">
                            <button type="submit" class="btn btn-sm btn-info w-100">Search</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12 col-lg-2">
                <div class="float-end mb-3">
                    <a class="btn btn-sm btn-success" href="{{ route('subject-offerings.create') }}"> Create New</a>
                </div>
            </div>
        </div>
        
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-sm">
        <tr>
            <th>ID</th>
            <th>Course</th>
            <th>Year Level</th>
            <th>Subject</th>
            <th>Description</th>
            <th>Section</th>
            <th>School Year</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($subjectOfferings as $subjectOffering)
        <tr>
            <td>{{ $subjectOffering->id }}</td>
            <td>{{ $subjectOffering->course }}</td>
            <td>{{ $subjectOffering->year_level }}</td>
            <td>{{ $subjectOffering->subject }}</td>
            <td>{{ $subjectOffering->description }}</td>
            <td>{{ $subjectOffering->section }}</td>
            <td>{{ $subjectOffering->school_year }}</td>
            <td>
                <form action="{{ route('subject-offerings.destroy', $subjectOffering->id) }}" method="POST">
       
                    <a class="btn btn-sm btn-primary" href="{{ route('subject-offerings.edit', $subjectOffering) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $subjectOfferings->links() !!}
      
@endsection