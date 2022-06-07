@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="mt-4">Show Room</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Room</li>
            </ol>
        </div>
        
        <div class="col-12">
            <div class="float-end mb-3">
                <a class="btn btn-sm btn-success" href="{{ route('rooms.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $room->name }}
            </div>
        </div>

    </div>
@endsection