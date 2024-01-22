<?php
session_start();
include '../clases/class.conexion.php';
include '../clases/class.curriculum.php';
$cur = new curriculum('', $_SESSION['ID'], '', '', '', '', '', '', '', '', '', '', '');
$curriculum = $cur->read()->fetch_array();
?>
<style>
    #cv {
        background-color: white;
        color: black;
        padding: 5%;
    }

    img {
        width: 75%;
    }

    .nombre {
        font-size: 40pt;
        font-family: Georgia, Cambria, Times, "Times New Roman";
    }

    .encabezados {
        font-family: "Georgia", "Times New Roman", serif;
    }

    p {
        font-size: 10pt;
    }
</style>
<center>
    <h1>Tu Curriculum</h1>
</center>
<div class="container" id="cv">
    <div class="row" id="sup">
        <div class="col-3">
            <center>

                <!-- Div para la imagen -->
                <img src="img/profile/<?php echo $_SESSION['ID'] . '.png'; ?>" alt="Tu Imagen">
            </center>
        </div>

        <div class="col-9">
            <!-- Div para el texto -->
            <center><br>
                <h2> <?php echo $_SESSION['NOMBRE'] . ' ' . $_SESSION['APELLIDOS']; ?></h2>
                <p>
                    <img src="curriculum/pdf/telefono.png" style="width:12px;"> <?php echo $curriculum['TELEFONO']; ?>&nbsp;&nbsp;
                    <img src="curriculum/pdf/email.png" style="width:12px;"> <?php echo $curriculum['CORREO']; ?>&nbsp;&nbsp;
                    <img src="curriculum/pdf/calendar.png" style="width:12px;"><?php echo $_SESSION['NACIMIENTO']; ?>
                </p>
            </center>
        </div>
    </div>
    <br><br>
    <div class="row" id="inf">
        <div class="col-3">
            <h5 class="encabezado">Descripćión</h5>
            <p><?php echo $curriculum['DESCRIPCION']; ?></p>
            <h5 class="encabezado">Aptitudes</h5>
            <p><?php echo $curriculum['APTITUDES']; ?></p>
        </div>

        <div class="col-4">
            <h5 class="encabezado">Formacion:</h5>
            <p><?php echo $curriculum['ESTUDIOS'] ?></p>

            <h5 class="encabezado">Idiomas:</h5>
            <p><?php echo $curriculum['IDIOMAS']; ?></p>

            <h5 class="encabezado">Referencias:</h5>
            <p><?php echo $curriculum['REFERENCIAS']; ?></p>
        </div>

        <div class="col-5">
            <h5 class="encabezado">Experiencia</h5>
            <p><?php echo $curriculum['EXPERIENCIA']; ?></p>

            <h5 class="encabezado">Certificaciones:</h5>
            <p><?php echo $curriculum['CERTIFICACIONES']; ?></p>

            <h5 class="encabezado">Estado Civil:</h5>
            <p><?php echo $curriculum['ESTADOCIVIL']; ?></p>

            <h5 class="encabezado">Trabajo Previo:</h5>
            <p><?php echo $curriculum['TRABAJOPREVIO']; ?></p>

        </div>
    </div>
</div>
<button onclick="window.open('curriculum/pdf/','_blank')" class="btn btn-outline-danger" style="width:100%;">Ver CV pdf <i class="far fa-file-pdf"></i></button>
<br><br>