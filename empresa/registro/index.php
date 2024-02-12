<script>
function segundo() {
    $('#pimero').hide();
    $('#segundo').show();
}

function tercero() {
    $('#segundo').hide();
    $('#tecero').show();
}

function cuato() {
    $('#tecero').hide();
    $('#cuato').show();
}
</script>

<?php include '../../modals/modalavisos.php'; ?>
<link rel="stylesheet" href="../css/registro.css">

    <form action="php/registroempresa.php" method="post">
    <div class="container" style="vertical-align:center;" id="pimero">
    <div class="card" style="background-color:rgba(255,255,255,0.7); z-index:0;">

    <div class="card-body">
    <div class="row">
        
        <div class="col-sm-6">  
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required>
        </div>

        <div class="col-sm-6">
        <label for="direccion">Dirección:</label><br>
        <input type="text" id="direccion" name="direccion">
        </div>

        <div class="col-sm-6">
        <label for="telefono">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono">
        </div>

        <div class="col-sm-6">
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion"></textarea>
        </div>

        </div>
</div>
</div>


        <button type="button" onclick="segundo()" id="fi" class="btn btn-success" style="z-index:2; font-size:15pt; margin-left:95%; margin-top:0%; text-align:right; border-radius:50%;">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </button>
        </div>


    <div class="container" id="segundo" style="display: none;">
    <div class="card" style="background-color:rgba(255,255,255,0.7); z-index:0;">

    <div class="card-body">
    <div class="row">


        <div class="col-sm-6">
        <label for="sector">Sector:</label><br>
        <input type="text" id="sector" name="sector">
        </div>

        <div class="col-sm-6">
        <label for="contactoNombre">Nombre de Contacto:</label><br>
        <input type="text" id="contactoNombre" name="contactoNombre">
        </div>

        <div class="col-sm-6">
        <label for="contactoCorreo">Correo de Contacto:</label><br>
        <input type="email" id="contactoCorreo" name="contactoCorreo">
        </div>

        <div class="col-sm-6">
        <label for="sitioWeb">Sitio Web:</label><br>
        <input type="text" id="sitioWeb" name="sitioWeb">
        </div>


        </div>
</div>
</div>


    <button type="button" id="terc" onclick="tercero()" class="btn btn-success" style="z-index:2; font-size:15pt; margin-left:95%; margin-top:0%; text-align:right; border-radius:50%;">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </button>
    </div>

    <div class="container" id="tecero" style="display: none;">
    <div class="card" style="background-color:rgba(255,255,255,0.7); z-index:0;">
    
    <div class="card-body">
    <div class="row">

        <div class="col-sm-6">
        <label for="correo">Correo Electrónico:</label><br>
        <input type="email" id="correo" name="correo">
        </div>

        <div class="col-sm-6">
        <label for="psw">Contraseña:</label><br>
        <input type="password" id="psw" name="psw">
        </div>

        </div>
</div>
</div>

<button type="submit" class="btn btn-primary" style="z-index:2; font-size:20pt; margin-left:95%; margin-top:0%; text-align:right; border-radius:50%;">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </button>
    </div>

    </form>
    
    </div>



