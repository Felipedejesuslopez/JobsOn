<?php
require_once 'class.empresa.php';  
require_once 'class.conexion.php';  

function mostrarMensaje($mensaje, $tipo = 'success')
{
    echo "<div style='color: " . ($tipo === 'success' ? 'green' : 'red') . "; margin-bottom: 10px;'>{$mensaje}</div>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $empresa = new Empresa(
        $_POST['id'],
        $_POST['nombre'],
        $_POST['direccion'],
        $_POST['telefono'],
        $_POST['descripcion'],
        $_POST['sector'],
        $_POST['contactoNombre'],
        $_POST['contactoCorreo'],
        $_POST['sitioWeb'],
        $_POST['correo'],
        $_POST['psw']
    );

    $action = $_POST['action'];

    if ($action === 'create') {
        $empresa->create();
        mostrarMensaje("Empresa creada con éxito.");
    } elseif ($action === 'read') {
        $id = !empty($_POST['id']) ? $_POST['id'] : null;
        $result = $empresa->read($id);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                mostrarMensaje("Empresa encontrada:<br>" . print_r($row, true));
            }
        } else {
            mostrarMensaje("No se encontró ninguna empresa con el ID proporcionado.", 'error');
        }
    } elseif ($action === 'update') {
        $id = !empty($_POST['id']) ? $_POST['id'] : null;
        $dataToUpdate = [
            'nombre' => $_POST['nombre'],
            'direccion' => $_POST['direccion'],
            'telefono' => $_POST['telefono'],
            'descripcion' => $_POST['descripcion'],
            'sector' => $_POST['sector'],
            'contactoNombre' => $_POST['contactoNombre'],
            'contactoCorreo' => $_POST['contactoCorreo'],
            'sitioWeb' => $_POST['sitioWeb'],
            'correo' => $_POST['correo'],
            'psw' => $_POST['psw']
        ];

        $empresa->update($id, $dataToUpdate);
        mostrarMensaje("Empresa actualizada con éxito.");
    } elseif ($action === 'delete') {
        $id = !empty($_POST['id']) ? $_POST['id'] : null;
        $empresa->delete($id);
        mostrarMensaje("Empresa eliminada con éxito.");
    }
}
?>
