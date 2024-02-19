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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <form method="post"  action="php/registroreclutador.php" enctype="multipart/form-data">
    <input type="hidden" name="action" value="create">
 
    
    <div class="container" style="vertical-align:center;" id="pimero">
    <div class="card" style="background-color:rgba(255,255,255,0.7); z-index:0;">
    

    <div class="card-body"  style="text-align: center;">
    <img src="img/JobsOn2.png" alt="Mensaje de alerta" style="width: 200px; height: auto; margin: 0 auto;">
    <div class="row">
   
    <div class="col-sm-6">
            <label for="user"><i class="fas fa-user"></i> USUARIO:</label>
            <input type="text" id="user" name="user"class="form-control" required>
        </div>

        <div class="col-sm-6">
            <label for="email"><i class="fas fa-envelope"></i> CORREO:</label>
            <input type="email" id="email" name="email"class="form-control">
        </div>

        <div class="col-sm-6">
            <label for="password"><i class="fas fa-lock"></i> CONTRASEÑA:</label>
            <input type="password" id="password" name="password"class="form-control">
        </div>

        <div class="col-sm-6">
            <label for="cedula"><i class="fas fa-id-card"></i> CEDULA:</label>
            <input type="text" id="cedula" name="cedula"class="form-control">
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
            <label for="name"><i class="fas fa-user"></i>NOMBRE:</label>
            <input type="text" id="name" name="name"class="form-control">
        </div>

        <div class="col-sm-6">
            <label for="telefono"><i class="fas fa-phone"></i>TELEFONO:</label>
            <input type="number" id="telefono" name="telefono"class="form-control">
        </div>

        <div class="col-sm-6">
            <label for="foto"><i class="fas fa-camera"></i>FOTO:</label>
            <input type="file" id="foto" name="foto" accept="image/*"class="form-control">
        </div>

        <div class="col-sm-6">
            <label for="nacimiento"><i class="fas fa-birthday-cake"></i>FECHA DE NACIMIENTO:</label>
            <input type="date" id="nacimiento" name="nacimiento"class="form-control">
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
            <label for="ingreso"><i class="fas fa-calendar-alt"></i>INGRESO:</label>
            <input type="date" id="ingreso" name="ingreso"class="form-control">
        </div>

        <div class="col-sm-6">
            <label for="estatus"><i class="fas fa-info-circle"></i>ESTATUS:</label>
            <input type="text" id="estatus" name="estatus"class="form-control">
        </div>

   </div>
</div>
</div>

<button id="btnRegistro" type="submit" class="btn btn-primary" style="z-index:2; font-size:20pt; margin-left:95%; margin-top:0%; text-align:right; border-radius:50%;">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </button>
    </div>
    <br>
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


