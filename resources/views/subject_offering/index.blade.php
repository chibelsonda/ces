@extends('layouts.admin')
 
@section('content')

    <div class="row">
        <div class="col-12">
            <h2 class="mt-4">Subject Offerings</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Subject Offerings</li>
            </ol>
        </div>
        
        <div class="col-12">
            <div class="float-end mb-3">
                <a class="btn btn-sm btn-success" href="{{ route('subject-offerings.create') }}"> Create New</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-sm table-bordered">
        <tr>
            <th>ID</th>
            <th>Course</th>
            <th>Subject</th>
            <th>Description</th>
            <th>Section</th>
            <th>School Year</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($subjectOfferings as $subjectOffering)
        <tr>
            <td>{{ $subjectOffering->id }}</td>
            <td>{{ $subjectOffering->course }}</td>
            <td>{{ $subjectOffering->subject }}</td>
            <td>{{ $subjectOffering->description }}</td>
            <td>{{ $subjectOffering->section }}</td>
            <td>{{ $subjectOffering->school_year }}</td>
            <td>
                <form action="{{ route('subject-offerings.destroy', $subjectOffering->id) }}" method="POST">
       
                    <a class="btn btn-sm btn-primary" href="{{ route('subject-offerings.edit', $subjectOffering) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $subjectOfferings->links() !!}
      
@endsection