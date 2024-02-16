<?php
include '../clases/class.conexion.php';
include '../clases/class.entrevista.php';
include '../clases/class.postulacion.php';
include '../clases/class.usuariopostulante.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$postulacion = new postulacion($_POST['postulacion'], null, null, null, null, null, null, null);
$postulacion = $postulacion->read()->fetch_array();

$fecha = date('Y-m-d', strtotime(strval($_POST['date'])));
$hour = date('H:i:s', strtotime(strval($_POST['hour'])));
$timezone = date('P');


// Crear un objeto DateTime con la hora dada
$dateTime = new DateTime($hour);

// Sumar una hora al objeto DateTime
$dateTime->add(new DateInterval('PT1H'));

// Obtener la nueva hora
$endhour = $dateTime->format('H:i:s');

require  '../vendor/autoload.php';

// Configuración de la aplicación
$client = new Google_Client();
$client->setApplicationName('Crear Reunión Google Meet');
$client->setScopes([Google_Service_Calendar::CALENDAR_EVENTS]);
$client->setAuthConfig('../claves/calendarapi.json');
$client->setAccessType('offline');
$client->setPrompt('select_account consent');

// Inicialización de la API de Google Calendar
$service = new Google_Service_Calendar($client);

// Crear una nueva reunión de Google Meet
$event = new Google_Service_Calendar_Event([
    'summary' => 'Reunión pública de Google Meet',
    'description' => 'Esta es una reunión pública creada desde PHP',
    'start' => [
        'dateTime' => '2022-02-17T09:00:00-07:00',
        'timeZone' => 'America/Mexico_City',
    ],
    'end' => [
        'dateTime' => '2022-02-17T10:00:00-07:00',
        'timeZone' => 'America/Mexico_City',
    ],
    'conferenceData' => [
        'createRequest' => [
            'requestId' => uniqid(),
            'conferenceSolutionKey' => [
                'type' => 'hangoutsMeet',
            ],
        ],
    ],
]);

$calendarId = 'primary'; // ID del calendario en el que crear la reunión

// Envío de la solicitud para crear la reunión
$event = $service->events->insert($calendarId, $event, ['conferenceDataVersion' => 1]);

// URL de la reunión
$meetingUrl = $event->conferenceData->entryPoints[0]->uri;

echo 'La reunión se ha creado correctamente. Puedes unirte aquí: ' . $meetingUrl;
