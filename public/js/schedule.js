
function generateRandomColor(){
    return "#" + ((1<<24)*Math.random() | 0).toString(16);
}

$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'en',
      //  initialDate: initialDate,
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
        // scrollTime:"12:00:00",
        // eventMinHeight: "15",
        dayHeaderFormat: function(date) { 

            let day = moment(date.date).format('ddd');

            return {html: `<span style="font-weight:normal;">${day}</span>`};
        },
        eventColor: '#66c6cc',
        events: function(info, successCallback, failureCallback) {

            let events = [];

            $.ajax({
                type: 'GET',
                url: `/subject-offering-schedules/section-schedules/${$('#subject_offering').val()}`,
                success: function (response) {
                    
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

                    successCallback(events);
                    
                },
                error: function (e) {
                    $.snack('error','Error occur', 5000);
                    console.log(e);
                }
            });
        },

        selectAllow:function(info){
            $.snack('error','別の時間帯を選択してください', 5000);
            return false;
        },

        eventClick: function(info) {

        },
    });

    calendar.render();
});