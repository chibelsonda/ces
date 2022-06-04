@extends('layouts.main')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h4> Show Subject</h4>
            </div>
            <div class="float-end">
                <a class="btn btn-sm btn-primary" href="{{ route('subjects.index') }}"> Back</a>
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