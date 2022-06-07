@extends('layouts.admin')
 
@section('content')

    <div class="row">
        <div class="col-12">
            <h1 class="mt-4">Rooms</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Rooms</li>
            </ol>
        </div>
        
        <div class="col-12">
            <div class="float-end mb-3">
                <a class="btn btn-sm btn-success" href="{{ route('rooms.create') }}"> Create New</a>
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
        @foreach ($rooms as $room)
        <tr>
            <td>{{ $room->id }}</td>
            <td>{{ $room->name }}</td>
            <td>
                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
   
                    <a class="btn btn-sm btn-info" href="{{ route('rooms.show', $room) }}">Show</a>
    
                    <a class="btn btn-sm btn-primary" href="{{ route('rooms.edit', $room) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $rooms->links() !!}
      
@endsection