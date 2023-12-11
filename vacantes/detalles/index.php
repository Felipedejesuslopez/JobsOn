<?php
if (is_file('../../clases/class.conexion.php')) {
    include '../../clases/class.conexion.php';
    include '../../clases/class.ofertalaboral.php';
    include '../../clases/class.empresa.php';
} else if (is_file('../clases/class.conexion.php')) {
    include '../clases/class.conexion.php';
    include '../clases/class.ofertalaboral.php';
    include '../clases/class.empresa.php';
} else {
    include 'clases/class.conexion.php';
    include 'clases/class.ofertalaboral.php';
    include 'clases/class.empresa.php';
}

$of = new OfertaLaboral($_GET['id'], '', '', '', '', '', '', '', '', '', '', '');
$oferta = $of->read()->fetch_array();

$em = new Empresa($oferta['EMPRESA'], '', '', '', '', '', '', '', '', '', '');
$empresa = $em->read()->fetch_array();
?>

<div class="container">
    <center>
        <h1><?php echo $oferta['TITULO']; ?></h1>
    </center>
    <br>
    <?php echo $empresa[''] ?>
</div>