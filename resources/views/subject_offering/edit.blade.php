@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <h2 class="mt-4">Edit Subject Offering</h2>
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

            <form action="{{ route('subject-offerings.update', $subjectOffering) }}" method="POST">
                @csrf
                @method('PUT')
            
                <div class="row">
                    <input type="hidden" name="id" value="{{ $subjectOffering->id }}">

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label>Year:</label>
                        <select class="form-select" name="school_year" aria-label="Select Year">
                            <option selected value="">Select Year</option>
                            @foreach($schoolYears as $schoolYear)
                                <option value="{{ $schoolYear }}" @selected(old('school_year', $schoolYear) == $subjectOffering->school_year)>
                                    {{ $schoolYear }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <label>Semester:</label>
                        <select class="form-select" name="semester" aria-label="Select Semester">
                            <option selected value="">Select Semester</option>
                            @foreach($semesters as $key => $semester)
                                <option value="{{ $key }}" @selected(old('semester', $key) == $subjectOffering->semester)>
                                    {{ $semester }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <label>Course:</label>
                        <select class="form-select" name="course_id" aria-label="Select Course">
                            <option selected value="">Select Course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" @selected(old('course_id', $course->id) == $subjectOffering->course_id)>
                                    {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <label>Year Level:</label>
                        <select class="form-select" name="year_level" aria-label="Select Year Level">
                            <option selected value="">Select Year Level</option>
                            @foreach($yearLevels as $yearLevel)
                                <option value="{{ $yearLevel }}" @selected(old('year_level', $yearLevel) == $subjectOffering->year_level)>
                                    {{ $yearLevel }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <label>Subject:</label>
                        <select class="form-select" name="subject_id" aria-label="Select Subject">
                            <option selected value="">Select Subject</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" @selected(old('subject_id', $subject->id) == $subjectOffering->subject_id)>
                                    {{ $subject->code . ' - ' . $subject->description }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <label>Section:</label>
                        <select class="form-select" name="section" aria-label="Select Subject">
                            <option selected value="">Select Section</option>
                            @foreach($sections as $section)
                                <option value="{{ $section }}" @selected(old('section', $section) == $subjectOffering->section)>
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