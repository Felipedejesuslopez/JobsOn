<?php 
ini_set('display_errors',1);
error_reporting(E_ALL);
include '../clases/class.conexion.php';
include '../clases/class.curriculum.php';
$datos = $_POST;

$cv = new curriculum('',$datos['iduser'],$datos['experiencia'],$datos['estadocivil'],$datos['estudios'],$datos['certificaciones'],$datos['telefono'],$datos['correo'],$datos['referencias'],$datos['trabajoprevio'],$datos['idiomas'],$datos['aptitudes'],$datos['descripcion']);
$curricul = $cv->read();
if($curriculum = $curricul->fetch_array()){
    $id = $curriculum['ID'];
    $cv = new curriculum($id,$datos['iduser'],$datos['experiencia'],$datos['estadocivil'],$datos['estudios'],$datos['certificaciones'],$datos['telefono'],$datos['correo'],$datos['referencias'],$datos['trabajoprevio'],$datos['idiomas'],$datos['aptitudes'],$datos['descripcion']);
    $cv->update();
    echo '<div class="alert alert-success">Datos Actualizados, ve a "Curriculum" en el menú para visualizar tu CV</div>';
}else{
    $cv->create();
    echo '<div class="alert alert-success">Datos Registrados, ve a "Curriculum" en el menú para visualizar tu registro</div>';
}
?>