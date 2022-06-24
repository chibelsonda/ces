Testing

@extends('layouts.admin')

@section('title', 'Subject Offering Schedule')

@push('styles')
<link href="{{ asset('fullcalendar/css/fullcalendar.css') }}" rel="stylesheet">
@endpush

@section('content')

{{ $subjectOffering }}


<div class="row mb-2">
    <div class="col-12">
        <h2 class="mt-4">Subject Offering Schedules</h2>
        <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item active">Subject Offerings</li> --}}
        </ol>
    </div>

    <form action="{{ route('subject-offerings.store') }}" method="POST">
        @csrf
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
            <label>Time Start:</label>
            <select class="form-select" name="time_start" aria-label="Select Time Start">
                <option selected value="">Select Start Time</option>
                @foreach($timeIntervals as $timeInterval)
                    <option value="{{ $timeInterval }}" @selected(old('time_start') == $timeInterval)>
                        {{ $timeInterval }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
            <label>Time End:</label>
            <select class="form-select" name="time_end" aria-label="Select Time End">
                <option selected value="">Select Start Time</option>
                @foreach($timeIntervals as $timeInterval)
                    <option value="{{ $timeInterval }}" @selected(old('time_end') == $timeInterval)>
                        {{ $timeInterval }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
            <label>Instructor:</label>
            <select class="form-select" name="instructor_id" aria-label="Select Instructor">
                <option selected value="">Select Instructor</option>
                @foreach($instructors as $instructor)
                    <option value="{{ $instructor->id }}" @selected(old('instructor_id') == $instructor->id)>
                        {{ $instructor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
            <label>Room:</label>
            <select class="form-select" name="room_id" aria-label="Select Room">
                <option selected value="">Select Room</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}" @selected(old('room_id') == $room->id)>
                        {{ $room->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 mt-2">
            @php 
                $days = ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'];
            @endphp

            @foreach($days as $day)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="days[]" value="{{ $day }}" id="day{{$day}}">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $day }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="col-12 col-sm-12 col-md-8 col-lg-6 text-center mt-3">
            <button type="submit" class="btn btn-primary w-100">Create</button>
        </div>

    </form>

    <div class="col-12 col-md-6 col-lg-4 mt-4">
        <div id='calendar'></div>
    </div>

</div>
@endsection

@section('script')
<script src="{{ asset('fullcalendar/js/main.js') }}"></script>
<script src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/schedule.js') }}"></script>
<script src='https://cdn.jsdelivr.net/npm/moment@2.27.0/min/moment.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/moment@5.5.0/main.global.min.js'></script>

<script type="text/javascript">
$(document).ready( function () {    
    var days = [];

    $("input[name='days[]']").click(function(){
        days = [];
        $("[name='days[]']:checked").each( function () {
            days.push($(this).val());
        });
    });


});
</script>

@endsection