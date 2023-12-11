
<link rel="stylesheet" href="css/vacantes.css">
<?php session_start();
if (is_file('../../clases/class.conexion.php')) {
    include '../../clases/class.conexion.php';
    include '../../clases/class.empresa.php';
    include '../../clases/class.ofertalaboral.php';
} else if (is_file('../clases/class.conexion.php')) {
    include '../clases/class.conexion.php';
    include '../clases/class.empresa.php';
    include '../clases/class.ofertalaboral.php';
} else if (is_file('clases/class.conexion.php')) {
    include 'clases/class.conexion.php';
    include 'clases/class.empresa.php';
    include 'clases/class.ofertalaboral.php';
}

$vac = new OfertaLaboral('', '', '', '', '', '', '', '', $_SESSION['ID'], '', '', '');
$vacant = $vac->read();
?>
<div class="container">
    <center>
        <h1>Vacantes por <?php echo $_SESSION['NOMBRE']; ?></h1>
    </center>
    <div class="row">
        <?php
        while ($oferta = $vacant->fetch_array()) {
        ?>
        <div class="col-sm-4">
        <div class="contenedor">
                    <div class="cuadrado">
                        <a href="empresa/vacantes/detalles/?id=<?php echo $oferta['ID']; ?>">
                            <div class="contenido">
                                <div class="container">
                                    <br>
                                    <center>
                                        <b class="titulo">
                                            <?php echo $oferta['TITULO']; ?>
                                        </b>
                                    </center>
                                    <p style="text-align:justify;">
                                        <?php echo substr($oferta['DESCRIPCION'], 0, 50); ?>...
                                    </p>
                                    <div class="details">

                                        $<?php echo $oferta['SALARIO']; ?><br>
                                        <?php echo $empresa['NOMBRE']; ?><br>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
        </div>
        <?php
        }
        ?>
    </div>
    <br><br>
    <a href="vacantes/registro/" class="btn btn-success" style="width: 100%;">Agregar Vacante</a>
</div>