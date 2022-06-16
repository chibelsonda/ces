@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <h2 class="mt-4">Add New Subject Offering</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Room</li>
            </ol>
        </div>
        
        <div class="col-12 col-lg-6">
            <div class="float-end">
                <a class="btn btn-sm btn-success" href="{{ route('subject-offerings.index') }}"> Back</a>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 col-lg-6">
            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('subject-offerings.store') }}" method="POST">
                @csrf
            
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label>Year:</label>
                        <select class="form-select" name="school_year" aria-label="Select Year">
                            <option selected>Select Year</option>
                            @foreach($years as $year)
                                <option value="{{ $year }}" @selected(old('school_year') == $year)>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <label>Course:</label>
                        <select class="form-select" name="course_id" aria-label="Select Course">
                            <option selected>Select Course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" @selected(old('course_id') == $course->id)>
                                    {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <label>Subject:</label>
                        <select class="form-select" name="subject_id" aria-label="Select Subject">
                            <option selected>Select Subject</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" @selected(old('subject_id') == $subject->id)>
                                    {{ $subject->code . ' - ' . $subject->description }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <label>Section:</label>
                        <select class="form-select" name="section" aria-label="Select Subject">
                            <option selected>Select Section</option>
                            @foreach($sections as $section)
                                <option value="{{ $section }}" @selected(old('section') == $section)>
                                    {{ $section }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-12 col-sm-12 col-md-12 text-center mt-3">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            
            </form>
        </div>
    </div>
@endsection