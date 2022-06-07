@extends('layouts.admin')
 
@section('content')

    <div class="row">
        <div class="col-12">
            <h1 class="mt-4">Instructors</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Instructors</li>
            </ol>
        </div>
        
        <div class="col-12">
            <div class="float-end mb-3">
                <a class="btn btn-sm btn-success" href="{{ route('instructors.create') }}"> Create New</a>
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
            <th width="280px">Action</th>
        </tr>
        @foreach ($instructors as $instructor)
        <tr>
            <td>{{ $instructor->id }}</td>
            <td>{{ $instructor->name }}</td>
            <td>
                <form action="{{ route('instructors.destroy', $instructor->id) }}" method="POST">
   
                    <a class="btn btn-sm btn-info" href="{{ route('instructors.show', $instructor) }}">Show</a>
    
                    <a class="btn btn-sm btn-primary" href="{{ route('instructors.edit', $instructor) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $instructors->links() !!}
      
@endsection