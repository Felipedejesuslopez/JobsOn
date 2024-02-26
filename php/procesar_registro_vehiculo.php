<?php
session_start();
include '../clases/class.conexion.php';
include '../clases/class.vehiculo.php';

if (!isset($_SESSION['ID'])) {
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $placa = $_POST['placa'];
    $id_conductor = $_SESSION['ID'];

    // Renombrar las imágenes
    $foto_name = 'foto_vehiculo.jpg';
    $placa_delantera_name = 'foto_placa_delantera.jpg';
    $placa_trasera_name = 'foto_placa_trasera.jpg';

    // Guardar las imágenes en el directorio del conductor
    $folder_path = "../imagenes_conductor/{$id_conductor}/vehiculo/";
    if (!is_dir($folder_path)) {
        mkdir($folder_path, 0777, true);
    }

    move_uploaded_file($_FILES['foto']['tmp_name'], $folder_path . $foto_name);
    move_uploaded_file($_FILES['placa_delantera']['tmp_name'], $folder_path . $placa_delantera_name);
    move_uploaded_file($_FILES['placa_trasera']['tmp_name'], $folder_path . $placa_trasera_name);

    // Crear una instancia de Vehiculo y almacenar los nombres de las imágenes en la base de datos
    $vehiculo = new Vehiculo($id_conductor, $marca, $modelo, $foto_name, $placa_delantera_name, $placa_trasera_name);
    $id_vehiculo = $vehiculo->create();

    if ($id_vehiculo) {
        echo "El vehículo se registró correctamente.";
    } else {
        echo "Error al registrar el vehículo. Por favor, inténtalo de nuevo.";
    }
} else {
    exit();
}
?>

