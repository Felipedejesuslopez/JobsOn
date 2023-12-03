<?php
ini_set ("display_errors",1);
error_reporting (E_ALL);

require_once '../clases/class.conexion.php';  
require_once '../clases/class.admin.php';  


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin = new admin(
        '',
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
        echo "Administrador creado correctamente.";

    } elseif ($action === 'read') {
        $id = !empty($_POST['id']) ? $_POST['id'] : null;
        $result = $admin->read($id);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Administrador encontrado.". print_r($row, true);
            }
        } else {
            echo "No se encontraron coincidencias.";
        }

    } 
    
}
?>
