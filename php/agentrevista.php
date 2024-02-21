<?php
include '../clases/class.conexion.php';
include '../clases/class.entrevista.php';
include '../clases/class.postulacion.php';
include '../clases/class.usuariopostulante.php';
include '../clases/class.mensaje.php';

include '../resources/const.php';

date_default_timezone_set('America/Mexico_City');

ini_set('display_errors', 1);
error_reporting(E_ALL);

$rol = $_POST['rol'];
$agendador = $_POST['agendador'];
if ($_POST['observaciones'] != '') {
    $observaciones = $_POST['observaciones'];
} else {
    $observaciones = $l['noobservaciones'];
}

$postulacion = new postulacion($_POST['postulacion'], null, null, null, null, null, null, null);
$postulacion = $postulacion->read()->fetch_array();

$fecha = date('Y-m-d', strtotime(strval($_POST['date'])));
$hour = date('H:i:s', strtotime(strval($_POST['hour'])));
$timezone = date('P');

$endHour = date('H:i:s', strtotime($hour . ' + 30 minutes'));

$startdateTime = $fecha . 'T' . $hour . $timezone;
$enddateTime = $fecha . 'T' . $endHour . $timezone;

require  '../vendor/autoload.php';

// Configuración de la aplicación
$client = new Google_Client();
$client->setApplicationName('Crear Reunión Google Meet');
$client->setScopes([Google_Service_Calendar::CALENDAR_EVENTS]);
$client->setAuthConfig('../claves/calendarapi.json');
$client->setAccessType('offline');
$client->setPrompt('select_account consent');

// Configuración de depuración de cURL en el cliente de Guzzle
$client->setHttpClient(new GuzzleHttp\Client(['debug' => true]));

// Inicialización de la API de Google Calendar
$service = new Google_Service_Calendar($client);

$event = new Google_Service_Calendar_Event(array(
    'summary' => $l['summary_meeting'],
    'description' => $l['description_meeting'],
    'end' => array(
        'dateTime' => $enddateTime,
        'timeZone' => 'America/Mexico_City',
    ),
    'start' => array(
        'dateTime' => $startdateTime,
        'timeZone' => 'America/Mexico_City',
    ),
    'visibility' => 'public',
    'conferenceDataVersion' => 1,
    'conferenceData' => [
        'createRequest' => [
            'requestId' => 'primary',
            'conferenceSolutionKey' => [
                'type' => 'hangoutsMeet'
            ]
        ]
    ]
));

$calendarId = 'e2c0326b106711e992501de2c5992dcf11f610f4aa175a31405da3a08d0db2ca@group.calendar.google.com';
try {
    $evento = $service->events->insert($calendarId, $event);
    $meetLink = $evento->getHangoutLink();
    $link = $evento->htmlLink;
} catch (Google_Service_Exception $e) {
    $error = json_decode($e->getMessage());
    if ($error) {
        $errorMessage = $error->error->message;
        echo 'Error al crear el evento: ' . $errorMessage;
    } else {
        echo 'Error desconocido al crear el evento.';
    }
}



$entrevista = new Entrevista(null, $postulacion['ID'], $rol, $agendador, $postulacion['USUARIO'], $fecha, $hour, $link, 'AGENDADA', $observaciones);
$entrevista->create();
$mensaje = $l['message_agendado_1'] . date('d/m/Y', strtotime($fecha)) . $l['message_agendado_2'] . $hour . $l['message_agendado_3'] . '<a href="' . $link . '" target="_blank">' . $link . '</a>' . $l['message_agendado_4'];

$mensaje = new mensaje(null, $agendador, $postulacion['USUARIO'], $rol, 'postulante', $mensaje, date('Y-m-d'), date('H:i:s'));
$mensaje->create();

$postulacion = new postulacion($postulacion['ID'], null, null, null, 'ENTREVISTA', null, null, null);
$postulacion->avanzar();
echo 'La reunión se ha creado correctamente. Puedes unirte aquí: <br><a class="btn btn-outline-success" href="' . $link . '"><i class="fas fa-calendar-week"></i></a>';
