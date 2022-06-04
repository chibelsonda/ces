@extends('layouts.main')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h4>Edit Subject</h4>
            </div>
            <div class="float-end">
                <a class="btn btn-sm btn-primary" href="{{ route('subjects.index') }}"> Back</a>
            </div>
        </div>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('subjects.update', $subject) }}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="row">
            <input type="hidden" name="id" value="{{ $subject->id }}">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Code:</strong>
                    <input type="text" name="code" class="form-control" value="{{  $subject->code }}" placeholder="Code" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description" required>
                        {{  $subject->description }}
                    </textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Units:</strong>
                    <input type="text" name="units" class="form-control" value="{{  $subject->units }}"  placeholder="Units" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    
    </form>
@endsection