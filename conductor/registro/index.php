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
    
<form method="post" action="php/registroconductor.php">

        <input type="hidden" name="action" value="create">
        

        <div class="container" style="vertical-align:center;" id="pimero">
    <div class="card" style="background-color:rgba(255,255,255,0.7); z-index:0;">

    <div class="card-body">
    <div class="row">

        <div class="col-sm-6">
        <label for="user">USER:</label>
        <input type="text" id="user" name="user" required>
        </div>

        <div class="col-sm-6">
        <label for="email">EMAIL:</label>
        <input type="email" id="email" name="email" required>
        </div>

        <div class="col-sm-6">
        <label for="password">PASSWORD:</label>
        <input type="password" id="password" name="password" required>
        </div>

        <div class="col-sm-6">
        <label for="name">NAME:</label>
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

    <div class="card-body">
    <div class="row">


        <div class="col-sm-6">
        <label for="licencia">Licencia:</label>
        <input type="text" id="licencia" name="licencia" required>
        </div>

        <div class="col-sm-6">
        <label for="ine">INE:</label>
        <input type="text" id="ine" name="ine" required>
        </div>

        <div class="col-sm-6">
        <label for="foto">FOTO:</label>
        <input type="file" id="foto" name="foto" required>
        </div>

        <div class="col-sm-6">
        <label for="nacimiento">NACIMIENTO:</label>
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
    
    <div class="card-body">
    <div class="row">

        <div class="col-sm-6">
        <label for="ingreso">INGRESO:</label>
        <input type="text" id="ingreso" name="ingreso" required>
        </div>

        <div class="col-sm-6">
        <label for="completados">COMPLETADOS:</label>
        <input type="text" id="completados" name="completados" required>
        </div>

        <div class="col-sm-6">
        <label for="cancelados">CANCELADOS:</label>
        <input type="text" id="cancelados" name="completados" required>
        </div>

        <div class="col-sm-6">
        <label for="estatus">ESTATUS:</label>
        <input type="text" id="estatus" name="estatus" required>
        </div>

        

        <div class="col-sm-6">
        <label for="T1">T1:</label>
        <input type="text" id="T1" name="T1" required>
        </div>

        <div class="col-sm-6">
        <label for="T2">T2:</label>
        <input type="text" id="T2" name="T2" required>
        </div>
</div>
</div>
</div>

<button type="submit" class="btn btn-primary" style="z-index:2; font-size:20pt; margin-left:95%; margin-top:0%; text-align:right; border-radius:50%;">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </button>
    </div>

    </form>
    
    <div id="resultado"></div>
    </div>


</body>





