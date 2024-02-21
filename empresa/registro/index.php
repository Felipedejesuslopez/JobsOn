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

<form action="php/registroempresa.php" method="post">
    <div class="container" style="vertical-align:center;" id="pimero">
        <div class="card" style="background-color:rgba(255,255,255,0.7); z-index:0;">
            <img src="img/JobsOn2.png" alt="Mensaje de alerta" style="width: 200px; height: auto; margin: 0 auto;">
            <div class="card-body" style="text-align: center;">
                <div class="row">

                    <div class="col-sm-6">
                        <label for="nombre"><i class="fas fa-user"></i> Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="direccion"><i class="fas fa-map-marker-alt"></i> Dirección:</label>
                        <input type="text" id="direccion" class="form-control" name="direccion">
                    </div>

                    <div class="col-sm-6">
                        <label for="telefono"><i class="fas fa-phone"></i> Teléfono:</label>
                        <input type="number" id="telefono" class="form-control" name="telefono">
                    </div>

                    <div class="col-sm-6">
                        <label for="descripcion"><i class="fas fa-info-circle"></i> Descripción:</label>
                        <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
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
                        <label for="sector"><i class="fas fa-industry"></i> Sector:</label>
                        <input type="text" id="sector" name="sector" class="form-control">
                    </div>

                    <div class="col-sm-6">
                        <label for="contactoNombre"><i class="fas fa-user"></i> Nombre de Contacto:</label>
                        <input type="text" id="contactoNombre" name="contactoNombre" class="form-control">
                    </div>

                    <div class="col-sm-6">
                        <label for="contactoCorreo"><i class="fas fa-envelope"></i> Correo de Contacto:</label>
                        <input type="email" id="contactoCorreo" name="contactoCorreo" class="form-control">
                    </div>

                    <div class="col-sm-6">
                        <label for="sitioWeb"><i class="fas fa-globe"></i> Sitio Web:</label>
                        <input type="text" id="sitioWeb" name="sitioWeb" class="form-control">
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
                        <label for="correo"><i class="fas fa-at"></i> Correo Electrónico:</label><br>
                        <input type="email" id="correo" name="correo" class="form-control">
                    </div>

                    <div class="col-sm-6">
                        <label for="psw"><i class="fas fa-lock"></i> Contraseña:</label><br>
                        <input type="password" id="psw" name="psw" class="form-control">
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
                text: 'Nueva empresa registrado correctamente.',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                // Recargar la página después de cerrar la alerta
                if (result.isConfirmed) {
                    location.reload();
                }
            });
        } else {
            // Manejar el caso de registro fallido si es necesario
            alert('Hubo un error al registrar la empresa. Por favor, inténtalo de nuevo.');
        }
    });
</script>

<div id="resultado"></div>
</div>