<?php
require_once 'registrolaboratorio.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Laboratorios</title>
</head>
<body>

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
