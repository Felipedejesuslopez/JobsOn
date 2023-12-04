<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
require_once '../clases/class.conexion.php';  
require_once '../clases/class.laboratorio.php';


function mostrarMensaje($mensaje, $tipo = 'success')
{
    echo "<div style='color: " . ($tipo === 'success' ? 'green' : 'red') . "; margin-bottom: 10px;'>{$mensaje}</div>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $laboratorio = new Laboratorio(
        $_POST['id'],
        $_POST['user'],
        $_POST['email'],
        $_POST['password'],
        $_POST['name'],
        $_POST['direccion'],
        $_POST['horario'],
        $_POST['telefono'],
        $_POST['estatus'],
        $_POST['op1'],
        $_POST['op2'],
        $_POST['op3']
    );

    $action = $_POST['action'];

    if ($action === 'create') {
        $laboratorio->create();
        mostrarMensaje("Laboratorio creado con éxito.");
    } elseif ($action === 'read') {
        $id = !empty($_POST['id']) ? $_POST['id'] : null;
        $result = $laboratorio->read($id);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                mostrarMensaje("Laboratorio encontrado:<br>" . print_r($row, true));
            }
        } else {
            mostrarMensaje("No se encontró ningún laboratorio con el ID proporcionado.", 'error');
        }
    } elseif ($action === 'update') {
        $id = !empty($_POST['id']) ? $_POST['id'] : null;
        $dataToUpdate = [
            'user' => $_POST['user'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'name' => $_POST['name'],
            'direccion' => $_POST['direccion'],
            'horario' => $_POST['horario'],
            'telefono' => $_POST['telefono'],
            'estatus' => $_POST['estatus'],
            'op1' => $_POST['op1'],
            'op2' => $_POST['op2'],
            'op3' => $_POST['op3']
        ];

        $laboratorio->update($id, $dataToUpdate);
        mostrarMensaje("Laboratorio actualizado con éxito.");
    } elseif ($action === 'delete') {
        $id = !empty($_POST['id']) ? $_POST['id'] : null;
        $laboratorio->delete($id);
        mostrarMensaje("Laboratorio eliminado con éxito.");
    }
}
?>
