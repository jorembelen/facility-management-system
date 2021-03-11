<script>
    document.addEventListener("DOMContentLoaded", function() {
        var calendarEl = document.getElementById('fullcalendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap',
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
                @foreach($appointments as $appointment)
                { 
                   title: '{{ $appointment->category->name }} {{ $appointment->schedule_time }}',
                   start: '{{ $appointment->date }}',
                   url: '{{ route('client-appointments.show',$appointment->id) }}',
                },
                @endforeach
            ]
        });
        setTimeout(function() {
            calendar.render();
        }, 250)
    });
</script>