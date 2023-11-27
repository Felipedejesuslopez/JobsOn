<?php

require_once '../../clases/class.conexion.php';  
require_once '../../clases/class.reclutador.php';  


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reclutador = new reclutador(
        $_POST['id'],
        $_POST['user'],
        $_POST['email'],
        $_POST['password'],
        $_POST['cedula'],
        $_POST['name'],
        $_POST['telefono'],
        $_POST['foto'],
        $_POST['nacimiento'],
        $_POST['ingreso'],
        $_POST['estatus']
    );

    $action = $_POST['action'];

    if ($action === 'create') {
        $admin->create();
        return "Reclutador creado correctamente.";

    } elseif ($action === 'read') {
        $id = !empty($_POST['id']) ? $_POST['id'] : null;
        $result = $admin->read($id);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return "Reclutador encontrado.". print_r($row, true);
            }
        } else {
            return "No se encontraron coincidencias.";
        }

    } 
    
}
?>