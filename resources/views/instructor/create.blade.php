@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1 class="mt-4">Add New Instructor</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Instructor</li>
            </ol>
        </div>
        
        <div class="col-12 col-lg-6">
            <div class="float-end">
                <a class="btn btn-sm btn-success" href="{{ route('instructors.index') }}"> Back</a>
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
            
            <form action="{{ route('instructors.store') }}" method="POST">
                @csrf
            
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Name" required>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 text-center mt-3">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            
            </form>
        </div>
    </div>
@endsection