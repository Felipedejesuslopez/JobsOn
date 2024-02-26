<?php

require_once '../clases/class.conductor.php';
require_once '../clases/class.conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    if (isset($_SESSION['ID'])) {

        $id_conductor = $_SESSION['ID'];
        $datos_actualizados = [
            'user' => $_POST['user'],
            'email' => $_POST['email'],
            'password' => $_POST['password'], 
            'name' => $_POST['name'],
            'licencia' => $_POST['licencia'],
            'ine' => $_POST['ine'],
            'telefono' => $_POST['telefono'],
            'opt2' => $_POST['opt2']
        ];

        $conductor = new conductor($id_conductor, '', '', '', '', '', '', '', '', '', '', '', '', '', '');
        $conductor->update($id_conductor, $datos_actualizados);

        echo "¡La información se actualizó correctamente!";
    } else {

        echo "No se pudo obtener el ID del conductor de la sesión.";
    }
} else {
    
    echo "No se recibieron datos para actualizar.";
}
?>
