<?php
require_once '../clases/class.conexion.php';

function emailExists($email) {
    $conexion = new Conexion();
    $email = $conexion->real_escape_string($email);

    $tables = array('usuarios', 'reclutadores', 'admins', 'conductores', 'empresa', 'laboratorios');

    foreach ($tables as $table) {
        $sql = "SELECT * FROM $table WHERE email = '$email'";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            $conexion->close();
            return true;
        }
    }

    $conexion->close();
    return false;
}

function changePassword($email, $newPassword, $userType) {
    $conexion = new Conexion();
    $email = $conexion->real_escape_string($email);

    // Utiliza MD5 para cifrar la contraseña
    $hashedPassword = md5($newPassword);

    // cambia el nombre de la tabla usuarios
    $table = ($userType == 'usuario') ? 'usuarios' : $userType;

    $sql = "UPDATE $table SET password = '$hashedPassword' WHERE email = '$email'";
    $resultado = $conexion->query($sql);

    if ($resultado) {
        $conexion->close();
        return true;
    } else {
        $conexion->close();
        return false;
    }
}

function generateToken() {
    return bin2hex(random_bytes(32));
}

function getUserTypeByEmail($email) {
    $conexion = new Conexion();
    $email = $conexion->real_escape_string($email);

    $sql = "SELECT 'usuario' as user_type FROM usuarios WHERE email = '$email'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $conexion->close();
        return 'usuario';
    }

    $sql = "SELECT 'reclutador' as user_type FROM reclutadores WHERE email = '$email'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $conexion->close();
        return 'reclutador';
    }

    $sql = "SELECT 'admins' as user_type FROM admins WHERE email = '$email'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $conexion->close();
        return 'admins';
    }

    $sql = "SELECT 'conductores' as user_type FROM conductores WHERE email = '$email'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $conexion->close();
        return 'conductores';
    }

    $sql = "SELECT 'empresa' as user_type FROM empresa WHERE email = '$email'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $conexion->close();
        return 'empresa';
    }

    $sql = "SELECT 'laboratorios' as user_type FROM laboratorios WHERE email = '$email'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $conexion->close();
        return 'laboratorios';
    }

    $conexion->close();
    return false;
}
?>