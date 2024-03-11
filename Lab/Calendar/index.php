<div class="container">
    <center>
        <h1>
            Calendario de Exámenes Clínicos
        </h1>
        <div id="calendar" style="width:70%;"></div>
    </center>
</div>

<?php session_start();
if (isset($_SESSION['ID'])) {
?>
    <script>
        var calendarEl = document.getElementById('calendar')
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            eventDisplay: 'block',
            locale: 'es',
            buttonText: {
                today: 'Hoy'
            },
            eventContent: function(arg) {
                return {
                    html: '<div class="fc-event-point"></div>', // Punto de evento
                    classNames: ['fc-event-point-container']
                };
            },
            eventClick: function(info) {
                var title = info.event.title;
                moment.locale('es');
                var start = moment(info.event.start).format('LLLL');
                var end = moment(info.event.end).format('LLLL');

                var message = '<div class="alert alert-warning">' + title + '<br>Horario: ' + start + ' - ' + end + '</div>';
                $('#aviso').html(message);
                $('#modalavisos').modal('show');
                // Tu lógica personalizada al hacer clic en un evento
                console.log('Evento clickeado:', info.event.title);
            },
            events: [{
                    title: 'Examenes de Felipe de Jesus/Jobson/Desarrollador Web',
                    start: '2024-03-15T10:14:00', // Fecha y hora de inicio
                    end: '2024-03-15T12:15:00' // Fecha y hora de finalización
                },
                {
                    title: 'Evento 2',
                    start: '2024-03-16T14:00:00',
                    end: '2024-03-16T16:00:00'
                }
            ]
        })
        calendar.render()
    </script>
<?php
}
?>
<style>
    body {
        overflow-y: hidden;
    }
</style>