<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (file_exists('../clases/class.conexion.php')) {
    include '../clases/class.conexion.php';
    include '../clases/class.ofertalaboral.php';
    include '../clases/class.empresa.php';
} else {
    include 'clases/class.conexion.php';
    include 'clases/class.ofertalaboral.php';
    include 'clases/class.empresa.php';
}

$vacante = new OfertaLaboral('', '', '', '', '', '', '', '', '', '', '', '');
$list = $vacante->read();
?>
<script src="js/main.js"></script>
<link rel="stylesheet" href="css/vacantes.css">
<div class="container">

    <center>
        <h1>Vacantes Basadas en tu perfil</h1>
    </center>
    <div class="row">
        <?php
        while ($oferta = $list->fetch_array()) {

            $emp = new Empresa($oferta['EMPRESA'], '', '', '', '', '', '', '', '', '', '');
            $empresa = $emp->read()->fetch_array();

        ?>
            <div class="col-sm-4">
                <div class="contenedor">
                    <div class="cuadrado">
                        <a href="vacantes/detalles/?id=<?php echo $oferta['ID']; ?>">
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
</div>