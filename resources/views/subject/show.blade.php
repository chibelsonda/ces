@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="mt-4">Show Subject</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Subjects</li>
            </ol>
        </div>
        
        <div class="col-12">
            <div class="float-end mb-3">
                <a class="btn btn-sm btn-success" href="{{ route('subjects.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code:</strong>
                {{ $subject->code }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $subject->description }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Units:</strong>
                {{ $subject->units }}
            </div>
        </div>
    </div>
@endsection