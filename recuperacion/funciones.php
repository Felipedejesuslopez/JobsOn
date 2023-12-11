<?php
require_once '../clases/class.conexion.php';

function generateToken() {
    return bin2hex(random_bytes(32));
}

function emailExists($email) {
    $conexion = new Conexion();
    
    $email = $conexion->real_escape_string($email);

    // Verifica la existencia del correo electrónico
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $conexion->close();
        return true; // El correo electrónico existe
    } else {
        $conexion->close();
        return false; // El correo electrónico no existe
    }
}

function changePassword($email, $newPassword) {
    $conexion = new Conexion();

    // Escapa el correo electrónico para evitar inyección de SQL
    $email = $conexion->real_escape_string($email);

    // Hash de la nueva contraseña
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Consulta SQL para actualizar la contraseña
    $sql = "UPDATE usuarios SET password = '$hashedPassword' WHERE email = '$email'";
    $resultado = $conexion->query($sql);

    // Verifica si la consulta fue exitosa
    if ($resultado) {
        $conexion->close();
        return true; // Contraseña cambiada exitosamente
    } else {
        $conexion->close();
        return false; // Error al cambiar la contraseña
    }
}
?>
