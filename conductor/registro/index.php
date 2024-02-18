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
    
<form method="post" action="php/registroconductor.php" enctype="multipart/form-data"> 

        <input type="hidden" name="action" value="create">
        

        <div class="container" style="vertical-align:center;" id="pimero">
    <div class="card" style="background-color:rgba(255,255,255,0.7); z-index:0;">
    <img src="img/JobsOn2.png" alt="Mensaje de alerta" style="width: 200px; height: auto; margin: 0 auto;">
    <div class="card-body" style="text-align: center;">
    <div class="row">

    <div class="col-sm-6">
    <label for="user"><i class="fas fa-user"></i> USER:</label>
    <input type="text" id="user" name="user" required>
</div>

<div class="col-sm-6">
    <label for="email"><i class="fas fa-envelope"></i> EMAIL:</label>
    <input type="email" id="email" name="email" required>
</div>

<div class="col-sm-6">
    <label for="password"><i class="fas fa-lock"></i> PASSWORD:</label>
    <input type="password" id="password" name="password" required>
</div>

<div class="col-sm-6">
    <label for="name"><i class="fas fa-user"></i> NAME:</label>
    <input type="text" id="name" name="name" required>
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
    <img src="img/JobsOn2.png" alt="Mensaje de alerta" style="width: 200px; height: auto; margin: 0 auto;">
    <div class="card-body" style="text-align: center;">
    <div class="row">


    <div class="col-sm-6">
    <label for="licencia"><i class="fas fa-id-card"></i> Licencia:</label>
    <input type="text" id="licencia" name="licencia" required>
</div>

<div class="col-sm-6">
    <label for="ine"><i class="fas fa-address-card"></i> INE:</label>
    <input type="text" id="ine" name="ine" required>
</div>

<div class="col-sm-6">
    <label for="foto"><i class="fas fa-image"></i> FOTO:</label>
    <input type="file" id="foto" name="foto" required>
</div>

<div class="col-sm-6">
    <label for="nacimiento"><i class="fas fa-calendar-alt"></i> NACIMIENTO:</label>
    <input type="date" id="nacimiento" name="nacimiento" required>
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
    <img src="img/JobsOn2.png" alt="Mensaje de alerta" style="width: 200px; height: auto; margin: 0 auto;">
    <div class="card-body" style="text-align: center;">
    <div class="row">

    <div class="col-sm-6">
    <label for="ingreso"><i class="fas fa-calendar-alt"></i> INGRESO:</label>
    <input type="date" id="ingreso" name="ingreso" required>
</div>

<div class="col-sm-6">
    <label for="completados"><i class="fas fa-check"></i> COMPLETADOS:</label>
    <input type="text" id="completados" name="completados" required>
</div>

<div class="col-sm-6">
    <label for="cancelados"><i class="fas fa-times"></i> CANCELADOS:</label>
    <input type="text" id="cancelados" name="cancelados" required>
</div>

<div class="col-sm-6">
    <label for="estatus"><i class="fas fa-heartbeat"></i> ESTATUS:</label>
    <input type="text" id="estatus" name="estatus" required>
</div>

<div class="col-sm-6">
    <label for="T1"><i class="fas fa-info-circle"></i> T1:</label>
    <input type="text" id="T1" name="T1" required>
</div>

<div class="col-sm-6">
    <label for="T2"><i class="fas fa-info-circle"></i> T2:</label>
    <input type="text" id="T2" name="T2" required>
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
                    text: 'Nuevo conductor registrado correctamente.',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Recargar la página después de cerrar la alerta
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            } else {
                // Manejar el caso de registro fallido si es necesario
                alert('Hubo un error al registrar el conductor. Por favor, inténtalo de nuevo.');
            }
        });
    </script>
    
    </div>






