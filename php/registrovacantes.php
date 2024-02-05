<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
include '../clases/class.conexion.php';
include '../clases/class.ofertalaboral.php';
include '../clases/class.vacantes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $of = new OfertaLaboral('', '', '', '', '', '', '', '', '', '', '', '');
    $ids = $of->lastid();
    $fechaPublicacion = date('Y-m-d');
    $ID = intval($ids) + 1;

    $directorioImagenes = "../imagenes_vacantes/{$ID}/";

    if (!file_exists($directorioImagenes)) {
        mkdir($directorioImagenes, 0777, true);
    }
    $imagen1Tmp = $_FILES['imagen1']['tmp_name'];
    $nombreImagen1 = $_FILES['imagen1']['name'];
    move_uploaded_file($imagen1Tmp, $directorioImagenes . $nombreImagen1);
    $rutaImagen1 = $directorioImagenes . $nombreImagen1;

    if (isset($_FILES['imagen2'])) {
        $imagen2Tmp = $_FILES['imagen2']['tmp_name'];
        $nombreImagen2 = $_FILES['imagen2']['name'];
        move_uploaded_file($imagen2Tmp, $directorioImagenes . $nombreImagen2);
        $rutaImagen2 = $directorioImagenes . $nombreImagen2;
    }

    if (isset($_FILES['imagen3'])) {
        $imagen3Tmp = $_FILES['imagen3']['tmp_name'];
        $nombreImagen3 = $_FILES['imagen3']['name'];
        move_uploaded_file($imagen3Tmp, $directorioImagenes . $nombreImagen3);
        $rutaImagen3 = $directorioImagenes . $nombreImagen3;
    }

    //Se registran los campos de la vacante (los básicos)
    $oferta = new OfertaLaboral(null, $_POST['titulo'], $_POST['descripcion'], $_POST['ubicacion'], $_POST['salario'], $_POST['requisitos'], $fechaPublicacion, $_POST['fechaExpiracion'], $_POST['empresa'], $_POST['tipoContrato'], $_POST['nivelExperiencia'], $_POST['beneficios']);
    $resultado = $oferta->create();
    
    //Se registran los detalles de la vacante
    $vacante = new vacantes($resultado,$_POST['titulores'],$_POST['planta'],$_POST['departamento'],$_POST['contactos'], $_POST['problemas'],$_POST['estudios'],$_POST['especialidad'],$_POST['experiencia'],$_post['alcance'],$_POST['idiomas'],$_POST['habilidades']);
    $vacante->create();

    if ($resultado) {
        echo "<p style='color: green;'>Oferta registrada con éxito.</p>";
    } else {
        echo "<p style='color: red;'>Error al registrar la oferta.</p>";
    }
}
