<script src="js/main.js"></script>

<?php session_start(); ?>
<div class="container">
    <h1>Vacantes por <?php echo $_SESSION['NOMBRE']; ?></h1>
    <div class="alert alert-warning">
        Aqui iran las vacantes registradas por la empresa
    </div>
    <br><br>
    <a href="vacantes/registro/" class="btn btn-success" style="width: 100%;">Agregar Vacante</a>
</div>