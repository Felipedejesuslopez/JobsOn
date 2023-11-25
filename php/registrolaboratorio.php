<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Laboratorios</title>
</head>
<body>

<?php
require_once 'class.laboratorio.php';
require_once 'class.conexion.php';  


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

<form method="post" action="">
    <label for="action">Acción:</label>
    <select name="action" id="action">
        <option value="create">Crear Laboratorio</option>
        <option value="read">Buscar Laboratorio por ID</option>
        <option value="update">Actualizar Laboratorio por ID</option>
        <option value="delete">Eliminar Laboratorio por ID</option>
    </select>
    <br>

    <label for="id">ID:</label>
    <input type="text" name="id">
    <br>

    <label for="user">Usuario:</label>
    <input type="text" name="user">
    <br>

    <label for="email">Correo Electrónico:</label>
    <input type="email" name="email">
    <br>

    <label for="password">Contraseña:</label>
    <input type="password" name="password">
    <br>

    <label for="name">Nombre:</label>
    <input type="text" name="name">
    <br>

    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion">
    <br>

    <label for="horario">Horario:</label>
    <input type="text" name="horario">
    <br>

    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono">
    <br>

    <label for="estatus">Estatus:</label>
    <input type="text" name="estatus">
    <br>

    <label for="op1">Opción 1:</label>
    <input type="text" name="op1">
    <br>

    <label for="op2">Opción 2:</label>
    <input type="text" name="op2">
    <br>

    <label for="op3">Opción 3:</label>
    <input type="text" name="op3">
    <br>

  
    <input type="submit" value="Enviar">
</form>

</body>
</html>