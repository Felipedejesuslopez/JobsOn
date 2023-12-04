<?php
require_once '../clases/class.conexion.php';
$conexion = new conexion();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"];
    $email = $_POST["email"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    if (isset($_POST["token"])) {
        $token = $_POST["token"];

    } else {
        echo "Error: No se proporcionó un token.";
    }

    // Verificar si las contraseñas coinciden
    if ($newPassword === $confirmPassword) {

        // Validacion de token que se encuentra en la URL del formulario
        $urlToken=$_GET['token'] ?? null;
        $token = $conexion->authenticate($urlToken, $token);

        if ($token === $urlToken) {

            $conexion = new mysqli($host, $user, $psw, $database);

            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Actualizar la contraseña en la base de datos
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $sqlUpdate = "UPDATE usuarios SET password = ? WHERE email = ?";
            $stmtUpdate = $conexion->prepare($sqlUpdate);
            $stmtUpdate->bind_param("ss", $hashedPassword, $email);

            if ($stmtUpdate->execute()) {
                echo "Contraseña actualizada exitosamente.";
            } else {
                echo "Error al actualizar la contraseña.";
            }

            $stmtUpdate->close();
            $conexion->close();
        } else {
            echo "Token inválido.";
        }
    } else {
        echo "Las contraseñas no coinciden.";
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>
