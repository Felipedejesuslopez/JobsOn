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

    
    <form action="php/registrolaboratorio.php" method="post">
    <div class="container" style="vertical-align:center;" id="pimero">
    <div class="card" style="background-color:rgba(255,255,255,0.7); z-index:0;">

    <div class="card-body"style="text-align: center;">
    <img src="img/JobsOn2.png" alt="Mensaje de alerta" style="width: 200px; height: auto; margin: 0 auto;">
    <div class="row">
    <div class="col-sm-6">
    <label for="user"><i class="fas fa-user"></i> Usuario:</label>
    <input type="text" id="user" name="user"class="form-control">
</div>

<div class="col-sm-6">
    <label for="email"><i class="fas fa-at"></i> Correo Electrónico:</label>
    <input type="email" id="email" name="email"class="form-control">
</div>

<div class="col-sm-6">
    <label for="password"><i class="fas fa-lock"></i> Contraseña:</label>
    <input type="password" id="password" name="password"class="form-control">
</div>

<div class="col-sm-6">
    <label for="name"><i class="fas fa-user"></i> Nombre:</label>
    <input type="text" id="name" name="name"class="form-control">
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

    <div class="card-body"style="text-align: center;">
    <img src="img/JobsOn2.png" alt="Mensaje de alerta" style="width: 200px; height: auto; margin: 0 auto;">
    <div class="row">

    <div class="col-sm-6">
    <label for="direccion"><i class="fas fa-map-marker-alt"></i> Dirección:</label>
    <input type="text" id="direccion" name="direccion"class="form-control">
</div>

<div class="col-sm-6">
    <label for="horario"><i class="fas fa-clock"></i> Horario:</label>
    <input type="text" id="horario" name="horario"class="form-control">
</div>

<div class="col-sm-6">
    <label for="telefono"><i class="fas fa-phone"></i> Teléfono:</label>
    <input type="number" id="telefono" name="telefono"class="form-control">
</div>

<div class="col-sm-6">
    <label for="estatus"><i class="fas fa-heartbeat"></i> Estatus:</label>
    <input type="text" id="estatus" name="estatus"class="form-control">
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
    
    <div class="card-body" style="text-align: center;">
    <img src="img/JobsOn2.png" alt="Mensaje de alerta" style="width: 200px; height: auto; margin: 0 auto;">
    <div class="row">



    <div class="col-sm-6">
    <label for="op1"><i class="fas fa-info-circle"></i> Opción 1:</label>
    <input type="text" id="op1" name="op1"class="form-control">
</div>

<div class="col-sm-6">
    <label for="op2"><i class="fas fa-info-circle"></i> Opción 2:</label>
    <input type="text" id="op2" name="op2"class="form-control">
</div>

<div class="col-sm-6">
    <label for="op3"><i class="fas fa-info-circle"></i> Opción 3:</label>
    <input type="text" id="op3" name="op3"class="form-control">
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
                    text: 'Nuevo laboratorio registrado correctamente.',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Recargar la página después de cerrar la alerta
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            } else {
                // Manejar el caso de registro fallido si es necesario
                alert('Hubo un error al registrar el laboratorio. Por favor, inténtalo de nuevo.');
            }
        });
    </script>
    
    </div>