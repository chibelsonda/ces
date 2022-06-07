@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="mt-4">Show Instructor</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Instructor</li>
            </ol>
        </div>
        
        <div class="col-12">
            <div class="float-end mb-3">
                <a class="btn btn-sm btn-success" href="{{ route('instructors.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $instructor->name }}
            </div>
        </div>

    </div>
@endsection