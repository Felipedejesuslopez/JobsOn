<?php
require_once '../clases/class.conexion.php';

function generateToken() {
    return bin2hex(random_bytes(32));
}

function emailExists($email) {
    $conexion = new Conexion();

    $email = $conexion->real_escape_string($email);

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $conexion->close();
        return true; 
    } else {
        $conexion->close();
        return false;
    }
}

function changePassword($email, $newPassword) {
    $conexion = new Conexion();

    $email = $conexion->real_escape_string($email);

    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $sql = "UPDATE usuarios SET password = '$hashedPassword' WHERE email = '$email'";
    $resultado = $conexion->query($sql);

    if ($resultado) {
        $conexion->close();
        return true;
    } else {
        $conexion->close();
        return false;
    }
}
?>
