<?php

require_once '../../clases/class.conexion.php';  
require_once '../../clases/class.comentario.php';  


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin = new admin(
        $_POST['id'],
        $_POST['username'],
        $_POST['password'],
        $_POST['email'],
        $_POST['name'],
        $_POST['nacimiento'],
        $_POST['ciudad'],
        $_POST['telefono'],
        $_POST['respaldo']
    );

    $action = $_POST['action'];

    if ($action === 'create') {
        $admin->create();
        return "Administrador creado correctamente.";

    } elseif ($action === 'read') {
        $id = !empty($_POST['id']) ? $_POST['id'] : null;
        $result = $admin->read($id);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return "Administrador encontrado.". print_r($row, true);
            }
        } else {
            return "No se encontraron coincidencias.";
        }

    } 
    
}
?>
