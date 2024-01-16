<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
include '../clases/class.conexion.php';
include '../clases/class.usuariopostulante.php';
$datos = $_POST;

$usuario = new usuariopostulante('',$datos['user'],$datos['email'], $datos['psw'],$datos['nombre'],$datos['paterno'] . ' ' . $datos['materno'], strval($datos['nacimiento']), $datos['direccion'], $datos['telefono'],$datos['email'],'1','1','1','1','1');
$usuario->create();

$sig = $usuario->ultimo();

// Verificar si se ha enviado un archivo
if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    // Nombre del archivo temporal en el servidor
    $archivo_temporal = $_FILES['foto']['tmp_name'];

    // Ruta de destino para la imagen
    $ruta_destino = '../img/profile/' . $sig.'.png';

    // Mover el archivo temporal a la ruta de destino
    if (move_uploaded_file($archivo_temporal, $ruta_destino)) {
        // La imagen se ha subido con éxito

    } else {
        // Ocurrió un error al mover el archivo
        echo 'Error al subir la imagen.';
    }
} else {
    // Ocurrió un error al cargar el archivo
    echo 'Error al cargar la imagen.';
}


echo "<div clasSs='alert alert-success'>Registrado Correctamente, ya puedes Iniciar Sesión</div>";
?>