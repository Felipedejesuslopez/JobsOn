<?php
require_once 'registroempresa.php';   
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Empresas</title>
</head>
<body>    
    
<form method="post" action="">
    <label for="action">Acción:</label>
    <select name="action" id="action">
        <option value="create">Crear Empresa</option>
        <option value="read">Buscar Empresa por ID</option>
        <option value="update">Actualizar Empresa por ID</option>
        <option value="delete">Eliminar Empresa por ID</option>
    </select>
    <br>

    <label for="id">ID:</label>
    <input type="text" name="id">
    <br>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre">
    <br>

    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion">
    <br>

    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono">
    <br>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion"></textarea>
    <br>

    <label for="sector">Sector:</label>
    <input type="text" name="sector">
    <br>

    <label for="contactoNombre">Contacto Nombre:</label>
    <input type="text" name="contactoNombre">
    <br>

    <label for="contactoCorreo">Contacto Correo:</label>
    <input type="email" name="contactoCorreo">
    <br>

    <label for="sitioWeb">Sitio Web:</label>
    <input type="text" name="sitioWeb">
    <br>

    <label for="correo">Correo:</label>
    <input type="email" name="correo">
    <br>

    <label for="psw">Contraseña:</label>
    <input type="password" name="psw">
    <br>

    <input type="submit" value="Enviar">
</form>

</body>
</html>
