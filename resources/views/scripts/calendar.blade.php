<script>
    document.addEventListener("DOMContentLoaded", function() {
        var calendarEl = document.getElementById('fullcalendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap',
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events:
            [
                @foreach($appointments as $appointment)
                @if($appointment->date >= $today)
                {
                    title : '{{ $appointment->job_order->job_type }} - {{ $appointment->employee->name }}',
                    start : '{{ $appointment->date }} {{ $appointment->time }}',
                    url: '{{ route('appointment.view',$appointment->job_order_id) }}',
                    color: '{{ $appointment->background_color }}',
                },
                @endif
                @endforeach
                
            ]
        });
        setTimeout(function() {
            calendar.render();
        }, 250)
    });
</script>