<?php
error_reporting(0);
session_start();
include '../../clases/class.conexion.php';
include '../../clases/class.curriculum.php';
$cur = new curriculum('', $_SESSION['ID'], '', '', '', '', '', '', '', '', '', '', '');
$curriculum = $cur->read()->fetch_array();

?>
<div class="container">
    <center>
        <h1>Datos Personales</h1>
    </center>
    <form action="php/informacionpers.php" method="post">
        <br>
        <div class="row">
            <br><br>
            <input type="text" name="iduser" value="<?php echo $_SESSION['ID']; ?>" style="display: none;">
            <div class="col-sm-3 col-6">
                Nombre:
                <input type="text" class="form-control" value="<?php echo $_SESSION['NOMBRE']; ?>" name="nombre" disabled>
            </div>
            <br><br>
            <div class="col-sm-3 col-6">
                Apellidos:
                <input type="text" class="form-control" value="<?php echo $_SESSION['APELLIDOS'] ?>" name="apellidos" disabled>
            </div>
            <br><br>
            <div class="col-sm-3 col-6">
                Fecha de Nacimiento
                <input type="date" class="form-control" value="<?php echo $_SESSION['NACIMIENTO']; ?>" name="nacimiento" disabled>
            </div>
            <br><br>
            <div class="col-sm-3 col-6">
                Teléfono:
                <input type="text" class="form-control" value="<?php echo $_SESSION['TELEFONO']; ?>" name="telefono" disabled>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4 col-6">
                Usuario:
                <input type="text" class="form-control" value="<?php echo $_SESSION['USUARIO']; ?>" name="user" disabled>
            </div>
            <div class="col-sm-4 col-6">
                Email:
                <input type="email" class="form-control" value="<?php echo $_SESSION['EMAIL']; ?>" name="email" disabled>
            </div>
            <div class="col-sm-4 col-6">
                NSS:
                <input type="text" class="form-control" value="<?php echo $_SESSION['NSS']; ?>" name="email" disabled>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-12">
                Direccion:
                <textarea name="direccion" id="direccion" cols="30" rows="2" class="form-control" disabled><?php echo $_SESSION['DIRECCION']; ?></textarea>
            </div>
            <div class="col-sm-4 col-2"><br>
            Foto:
        </div>
        <div class="col-sm-4 col-8">
            <img src="img/profile/<?php echo $_SESSION['ID']; ?>.png" style="width:100%;">
        </div>
        </div>

    
    <br>
    <center>
        <h1>INFORMACIÓN LABORAL</h1>
    </center>
    <p>Estos datos permitirán establecer una mejor localizacion de tu puesto ideal, permitirán al reclutador establecer una mejor seleccion y complementarán tus datos de curriculum, por lo que es important seas claro y completes la información</p>
    
        <br>
        <div class="row">
            <div class="col-12">
                <label for="experiencia">Experiencia Laboral:</label>
                <textarea name="experiencia" id="experiencia" cols="30" rows="5" class="form-control"><?php echo $curriculum['EXPERIENCIA']; ?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <label for="estadocivil">Estado Civil:</label>
                <input type="text" class="form-control" name="estadocivil" value="<?php echo $curriculum['ESTADOCIVIL']; ?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <label for="estudios">Estudios:</label>
                <input type="text" class="form-control" name="estudios" value="<?php echo $curriculum['ESTUDIOS']; ?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <label for="certificaciones">Certificaciones:</label>
                <input type="text" class="form-control" name="certificaciones" value="<?php echo $curriculum['CERTIFICACIONES']; ?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" name="telefono" value="<?php echo $curriculum['TELEFONO']; ?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" class="form-control" name="correo" value="<?php echo $curriculum['CORREO']; ?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <label for="referencias">Referencias:</label>
                <textarea name="referencias" id="referencias" cols="30" rows="5" class="form-control"><?php echo $curriculum['REFERENCIAS']; ?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <label for="trabajoprevio">Trabajo Previo (Incluye Resumen y Fechas):</label>
                <textarea name="trabajoprevio" id="trabajoprevio" cols="30" rows="5" class="form-control"><?php echo $curriculum['TRABAJOPREVIO']; ?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <label for="idiomas">¿Hablas otros idiomas?¿Cuáles?</label>
                <input type="text" class="form-control" name="idiomas" value="<?php echo $curriculum['IDIOMAS']; ?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <label for="aptitudes">Cuéntanos qué aptitudes te caracterizan:</label>
                <textarea name="aptitudes" id="aptitudes" cols="30" rows="5" class="form-control"><?php echo $curriculum['APTITUDES']; ?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <label for="descripcion">Ahora haz una breve descripción de tu persona:</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control"><?php echo $curriculum['DESCRIPCION'] ?></textarea>
            </div>
        </div>
        <br>
        <!-- Agrega un botón de envío -->
        <button type="submit" class="btn btn-primary" style="width:100%;">Guardar Cambios</button>
    </form>

</div>