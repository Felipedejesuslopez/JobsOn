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
if ($oferta = $of->read()->fetch_array()) {
} else {
    if (isset($_GET['w'])) {
        if ($_GET['w'] == "l") {
            $maxAttempts = 10;  // Define un número máximo de intentos para evitar bucles infinitos

            for ($i = 0; $i < $maxAttempts; $i++) {
                $of = new OfertaLaboral(intval($_GET['id']) - $i, '', '', '', '', '', '', '', '', '', '', '');

                if ($oferta = $of->read()->fetch_array()) {
                    break;  // Sale del bucle ya que encontró la oferta
                }

                // Si no encuentra la oferta y ha alcanzado el número máximo de intentos, puedes realizar alguna acción adicional o simplemente salir del bucle
                if ($i === $maxAttempts - 1) {
                    $of = new OfertaLaboral(intval($_GET['id']) + 1, '', '', '', '', '', '', '', '', '', '', '');

                    if ($oferta = $of->read()->fetch_array()) {
                        break;  // Sale del bucle ya que encontró la oferta
                    }
                }
            }
        } else if ($_GET['w'] == "n") {
            $maxAttempts = 10;  // Define un número máximo de intentos para evitar bucles infinitos

            for ($i = 0; $i < $maxAttempts; $i++) {
                $of = new OfertaLaboral(intval($_GET['id']) + $i, '', '', '', '', '', '', '', '', '', '', '');

                if ($oferta = $of->read()->fetch_array()) {
                    break;  // Sale del bucle ya que encontró la oferta
                }

                // Si no encuentra la oferta y ha alcanzado el número máximo de intentos, puedes realizar alguna acción adicional o simplemente salir del bucle
                if ($i === $maxAttempts - 1) {
                    $of = new OfertaLaboral(intval($_GET['id']) - 1, '', '', '', '', '', '', '', '', '', '', '');

                    if ($oferta = $of->read()->fetch_array()) {
                        break;  // Sale del bucle ya que encontró la oferta
                    }
                }
            }
        }
    }
}
session_start();
//$_SESSION['TEMA'] = 'D';

$emp = new Empresa($oferta['EMPRESA'], '', '', '', '', '', '', '', '', '', '');
$empresa = $emp->read()->fetch_array();
if (is_dir('../../imagenes_vacantes/' . $oferta['ID'] . '/')) {
    $archivos = scandir('../../imagenes_vacantes/' . $oferta['ID'] . '/');
} else if(is_dir('imagenes_vacantes/' . $oferta['ID'] . '/')){
    $archivos = scandir('imagenes_vacantes/' . $oferta['ID'] . '/');
}else{
    $archivos = [];
}
// Filtrar los archivos y directorios especiales (., ..)
$archivos = array_diff($archivos, array('..', '.'));
shuffle($archivos);
foreach ($archivos as $archivo) {
    $img = $archivo;
}


$em = new Empresa($oferta['EMPRESA'], '', '', '', '', '', '', '', '', '', '');
$empresa = $em->read()->fetch_array();


?>
<link rel="stylesheet" href="css/detallesvacante.css">
<style>
    .options:hover{
        transform: scale(1.5);
        z-index: 5;
    }
</style>
<div class="container" id="tarjetavacante" style="background-image: url('imagenes_vacantes/<?php echo $oferta['ID']; ?>/<?php echo $img; ?>'); background-repeat: no-repeat; background-size: cover; margin-top:-5%;">
    <script src="vacantes/detalles/main.js"></script>
    <div id="espacio" style="height:85%; text-align:right;">
    </div>
    <div id="btnpc" style="margin-top: -30%; color: aqua; z-index: 2; text-align: right;">
        <div class="row">
            <div class="col-1">
                <button class="btn btn-outline-primary">
                    < </button>
            </div>
            <div class="col-10"></div>
            <div class="col-1">
                <button class="btn btn-outline-primary">></button>
            </div>
        </div><br><br>
        <div class="row">
            <div class="col-10"></div>
            <div class="col-2">
                <img src="img/vacantes/postulate.png" style="width:40%; cursor: pointer;" class="options" id="postulatepc" onclick="postulate('<?php echo $oferta['ID'] ?>','<?php echo $_SESSION['ID'] ?>')">
                <br><br>
                <img src="img/vacantes/love.png" style="width:40%; cursor: pointer;" class="options">
                <br>
                <img src="img/vacantes/reject.png" style="width:40%; cursor: pointer;" class="options">
                <br>
                <img src="img/vacantes/share.png" style="width:40%; cursor: pointer;" class="options">
                <br>
                <img src="img/vacantes/details.png" style="width:40%; cursor: pointer;" class="options" onclick="$('#detalles').show(); bajar();">
            </div>
        </div>
    </div>
    <div id="datos" style="background-color: rgba(255,255,255,0.5); color:black;">
        <center>
            <input type="number" value="<?php echo $oferta['ID']; ?>" id="idvac" style="display: none;">
            <h1><?php echo $oferta['TITULO']; ?></h1>
        </center>
        <h4><?php echo $oferta['UBICACION']; ?></h4>
        <h5><?php echo $oferta['SALARIO']; ?></h5>
        <p><?php echo substr($oferta['REQUISITOS'], 0, 150); ?></p>
        <h3><?php echo $empresa['NOMBRE']; ?></h3>
    </div>
    <br>
    <div class="row" id="btnc">
        <div class="col-2">
            <img src="img/vacantes/postulate.png" style="width:100%;" class="options" id="postulatec" onclick="postulate('<?php echo $oferta['ID'] ?>','<?php echo $_SESSION['ID']; ?>')">
        </div>
        <div class="col-2"></div>
        <div class="col-2">
            <img src="img/vacantes/love.png" style="width:100%;" class="options">
        </div>
        <div class="col-2">
            <img src="img/vacantes/reject.png" style="width:100%;" class="options">
        </div>
        <div class="col-2">
            <img src="img/vacantes/share.png" style="width:100%;" class="options">
        </div>
        <div class="col-2">
            <img src="img/vacantes/details.png" style="width:100%;" class="options" onclick="$('#detalles').show(); bajar();">
        </div>
    </div>
</div>


<!-- Detalles a visualizar -->
<div class="container" id="detalles" style="display: none;">
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
    <p style="text-align:justify; font-size:10pt;"><?php echo $oferta['DESCRIPCION']; ?></p>
    <div class="row">
        <div class="col-sm-6">
            <b>Requisitos:</b>
            <p style="text-align:justify; font-size:10pt;"><?php echo $oferta['REQUISITOS']; ?></p>
        </div>
        <div class="col-sm-6">
            <b>Beneficios:</b>
            <p style="text-align:justify; font-size:10pt;"><?php echo $oferta['BENEFICIOS']; ?></p><br>
            <b>Nivel de Experiencia:</b>
            <p style="text-align:justify; font-size:10pt;"><?php echo $oferta['NIVEL_EXPERIENCIA']; ?></p>
        </div>
    </div>

    <button class="btn btn-primary" style="width:100%;">Postularme</button><br>
</div>