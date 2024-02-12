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

<form action="php/registrolaboratorio.php" method="post">
    <div class="container" style="vertical-align:center;" id="pimero">
        <div class="card" style="background-color:rgba(255,255,255,0.7); z-index:0;">

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="user">Usuario:</label>
                        <input type="text" id="user" name="user">
                    </div>

                    <div class="col-sm-6">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" name="email">
                    </div>

                    <div class="col-sm-6">
                        <label for="password">Contraseña:</label><br>
                        <input type="password" id="password" name="password">
                    </div>

                    <div class="col-sm-6">
                        <label for="name">Nombre:</label><br>
                        <input type="text" id="name" name="name">
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
                        <label for="direccion">Dirección:</label><br>
                        <input type="text" id="direccion" name="direccion">
                    </div>

                    <div class="col-sm-6">
                        <label for="horario">Horario:</label><br>
                        <input type="text" id="horario" name="horario">
                    </div>

                    <div class="col-sm-6">
                        <label for="telefono">Teléfono:</label><br>
                        <input type="text" id="telefono" name="telefono">
                    </div>

                    <div class="col-sm-6">
                        <label for="estatus">Estatus:</label><br>
                        <input type="text" id="estatus" name="estatus">
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
                        <label for="op1">Opción 1:</label><br>
                        <input type="text" id="op1" name="op1">
                    </div>
                    <div class="col-sm-6">
                        <label for="op2">Opción 2:</label><br>
                        <input type="text" id="op2" name="op2">
                    </div>

                    <div class="col-sm-6">
                        <label for="op3">Opción 3:</label><br>
                        <input type="text" id="op3" name="op3">
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