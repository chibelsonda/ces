@extends('layouts.admin')
 
@section('content')

    <div class="row">
        <div class="col-12">
            <h1 class="mt-4">Courses</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Courses</li>
            </ol>
        </div>
        
        <div class="col-12">
            <div class="float-end mb-3">
                <a class="btn btn-sm btn-success" href="{{ route('courses.create') }}"> Create New</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->name }}</td>
            <td>{{ $course->description }}</td>
            <td>
                <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
   
                    <a class="btn btn-sm btn-info" href="{{ route('courses.show', $course) }}">Show</a>
    
                    <a class="btn btn-sm btn-primary" href="{{ route('courses.edit', $course) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $courses->links() !!}
      
@endsection