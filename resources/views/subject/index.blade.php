@extends('layouts.main')
 
@section('content')
    <div class="row mt-4">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h4>Subjects</h4>
            </div>
            <div class="float-end">
                <a class="btn btn-sm btn-success" href="{{ route('subjects.create') }}"> Create New Product</a>
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
            <th>Code</th>
            <th>Description</th>
            <th>Units</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($subjects as $subject)
        <tr>
            <td>{{ $subject->id }}</td>
            <td>{{ $subject->code }}</td>
            <td>{{ $subject->description }}</td>
            <td>{{ $subject->units }}</td>
            <td>
                <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
   
                    <a class="btn btn-sm btn-info" href="{{ route('subjects.show', $subject) }}">Show</a>
    
                    <a class="btn btn-sm btn-primary" href="{{ route('subjects.edit', $subject) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $subjects->links() !!}
      
@endsection