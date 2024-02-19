<?php include '../../modals/modalavisos.php'; ?>
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
<link rel="stylesheet" href="../css/registro.css">
<script src="../Postulantes/Registro/main.js"></script>
<link rel="stylesheet" href="../css/registro.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<form action="../php/registrousuario.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="action" value="create">
 
    
 <div class="container" style="vertical-align:center;" id="pimero">
 <div class="card" style="background-color:rgba(255,255,255,0.7); z-index:0;">
 

 <div class="card-body"  style="text-align: center;">
 <img src="img/JobsOn2.png" alt="Mensaje de alerta" style="width: 200px; height: auto; margin: 0 auto;">
 <div class="row">

                    <div class="col-sm-6">
                        Nombre(s):
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        Apellido Paterno:
                        <input type="text" name="paterno" id="paterno" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        Apellido Materno:
                        <input type="text" name="materno" id="materno" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        Fecha de nacimiento
                        <input type="date" name="nacimiento" id="nacimiento" class="form-control">
                        </div>

</div>
</div>
</div>
        <button type="button" onclick="segundo()" id="fi" class="btn btn-success" style="z-index:2; font-size:15pt; margin-left:95%; margin-top:0%; text-align:right; border-radius:50%;">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </button>
    </div>
    <br>

        <div class="container" id="segundo" style="display: none;">
    <div class="card" style="background-color:rgba(255,255,255,0.7); z-index:0;">

    <div class="card-body" style="text-align: center;">
    <img src="img/JobsOn2.png" alt="Mensaje de alerta" style="width: 200px; height: auto; margin: 0 auto;">

                <div class="row">
                    <div class="col-sm-6">
                        Correo electrónico
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        Usuario:
                        <input type="text" name="user" id="username" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        Contraseña:
                        <input type="password" name="psw" id="password" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        Confirma la contraseña:
                        <input type="password" name="confirma" id="confirma" class="form-control">
                     
                        </div>

</div>
</div>
</div>
        <button type="button" id="terc" onclick="tercero()" class="btn btn-success" style="z-index:2; font-size:15pt; margin-left:95%; margin-top:0%; text-align:right; border-radius:50%;">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </button>
    </div>
    <br>
    <div class="container" id="tecero" style="display: none;">
    <div class="card" style="background-color:rgba(255,255,255,0.7); z-index:0;">
    
    <div class="card-body" style="text-align: center;">
    <img src="img/JobsOn2.png" alt="Mensaje de alerta" style="width: 200px; height: auto; margin: 0 auto;">
    <div class="row">
                    <div class="col-sm-6">
                        Teléfono:
                        <input type="number" name="telefono" id="phone" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        Foto:
                        <div id="dropzone2" class="dropzone">
                            <div style="height: 100%;"><br>
                                <img src="img/icon2.png" alt="MDN">
                                <center>
                                    <p id="res2">Arrastra aquí tu Foto</p>
                                </center>
                            <input type="file" id="file2" name="foto">
                            </div>

</div></div></div>
</div>
</div>
        <button id="btnRegistro" type="submit" class="btn btn-primary" style="z-index:2; font-size:20pt; margin-left:95%; margin-top:0%; text-align:right; border-radius:50%;">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </button>
    </div>
</form>
<script>
        document.getElementById('btnRegistro').addEventListener('click', function() {
            // Simulación de registro exitoso
            var registroExitoso = true;

            if (registroExitoso) {
                // Mostrar alerta personalizada con SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: '¡Registro exitoso!',
                    text: 'Nuevo reclutador registrado correctamente.',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Recargar la página después de cerrar la alerta
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            } else {
                // Manejar el caso de registro fallido si es necesario
                alert('Hubo un error al registrar el reclutador. Por favor, inténtalo de nuevo.');
            }
        });
    </script>
    
    <div id="resultado"></div>
    </div>
