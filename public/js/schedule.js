
function generateRandomColor(){
    return "#" + ((1<<24)*Math.random() | 0).toString(16);
}

function displayCalendar(calendar, events){
    var calendarEl = document.getElementById(calendar);

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'en',
        initialView: 'timeGridWeek',
        nowIndicator: true,
        timeZone: 'local',
        height: 700,
        headerToolbar:false,
        navLinks: false, // can click day/week names to navigate views
        allDaySlot: false,
        editable: false,
        selectable: true,
        selectMirror: true,
        dayMaxEvents: true, // allow "more" link when too many events
        slotMinTime: "07:00:00",
        slotMaxTime: "21:00:00",
        slotLabelInterval: "00:30:00",
        slotDuration: "00:30:00",
        slotLabelFormat: ["HH:mm"],
        dayHeaderFormat: function(date) { 

            let day = moment(date.date).format('ddd');

            return {html: `<span style="font-weight:normal;">${day}</span>`};
        },
        eventColor: '#66c6cc',
        events: function(info, successCallback, failureCallback)  {

            successCallback(events); 
        },

        selectAllow:function(info){
            // return false;
        },

        eventClick: function(info) {

        },
    });

    calendar.render();
}

$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let subjectOffering = $('#subject_offering').val();

    $.ajax({
        type: 'GET',
        url: `/subject-offering-schedules/section-schedules/${subjectOffering}`,
        success: function (response) {
            let events = [];
            $.map(response.section_schedules, function(schedule) {
                events.push({
                    id: schedule.id,
                    title: `${schedule.code} - ${schedule.description}`, 
                    daysOfWeek: schedule.days.split(','),
                    startTime: schedule.time_start,
                    endTime: schedule.time_end,
                    color: generateRandomColor()
                });
            });
        
            displayCalendar('sectionCalendar', events);

            // displayCalendar('instructorCalendar', events);

            // displayCalendar('roomCalendar', events);
        },
        error: function (e) {
            $.snack('error','Error occur', 5000);
            console.log(e);
        }
    });

    subjectOffering = JSON.parse(subjectOffering);

    let room = {
        school_year : subjectOffering.school_year,
        room_id : 2
    }
    
    $.ajax({
        type: 'GET',
        url: `/subject-offering-schedules/room-schedules/${JSON.stringify(room)}`,
        success: function (response) {

            let events = [];
            $.map(response.room_schedules, function(schedule) {
                events.push({
                    id: schedule.id,
                    title: `${schedule.code} - ${schedule.description}`, 
                    daysOfWeek: schedule.days.split(','),
                    startTime: schedule.time_start,
                    endTime: schedule.time_end,
                    color: generateRandomColor()
                });
            });

            displayCalendar('roomCalendar', events);
        },
        error: function (e) {
            $.snack('error','Error occur', 5000);
            console.log(e);
        }
    });


    let instructor = {
        school_year : subjectOffering.school_year,
        instructor_id : 1
    }
    
    $.ajax({
        type: 'GET',
        url: `/subject-offering-schedules/instructor-schedules/${JSON.stringify(instructor)}`,
        success: function (response) {

            let events = [];
            $.map(response.instructor_schedules, function(schedule) {
                events.push({
                    id: schedule.id,
                    title: `${schedule.code} - ${schedule.description}`, 
                    daysOfWeek: schedule.days.split(','),
                    startTime: schedule.time_start,
                    endTime: schedule.time_end,
                    color: generateRandomColor()
                });
            });

            displayCalendar('instructorCalendar', events);
        },
        error: function (e) {
            $.snack('error','Error occur', 5000);
            console.log(e);
        }
    });
     
});