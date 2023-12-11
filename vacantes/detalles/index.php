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
    <div class="row">
        <div class="col-sm-1 col-2">
            <img src="img/empresas/<?php echo $empresa['ID']; ?>.jpg" style="width:100%;">
        </div>
        <div class="col-sm-2 col-8" style="vertical-align:center;">
            <b><?php echo $empresa['NOMBRE']; ?></b>
        </div>
        <div class="col-sm-7"></div>
        <div class="col-sm-2 col-2" style="text-align:right;">
            $<?php echo $oferta['SALARIO']; ?>
        </div>
    </div>
    <p style="text-align:justify; font-size:10pt;"><?php echo utf8_encode($oferta['DESCRIPCION']); ?></p>
    <div class="row">
        <div class="col-sm-6">
            <b>Requisitos:</b>
            <p style="text-align:justify; font-size:10pt;"><?php echo utf8_encode($oferta['REQUISITOS']); ?></p>
        </div>
        <div class="col-sm-6">
            <b>Beneficios:</b>
            <p style="text-align:justify; font-size:10pt;"><?php echo utf8_encode($oferta['BENEFICIOS']); ?></p><br>
            <b>Nivel de Experiencia:</b>
            <p style="text-align:justify; font-size:10pt;"><?php echo utf8_encode($oferta['NIVEL_EXPERIENCIA']); ?></p>
        </div>
    </div>

    <button class="btn btn-primary" style="width:100%;">Postularme</button>
</div>