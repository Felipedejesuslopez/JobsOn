<link rel="stylesheet" href="css/vacanteregistro.css">
<script src="vacantes/registro/main.js"></script>

<div class="container">
    <center>
        <h1>
            Agregar Vacante
        </h1>
    </center>
    <p>Por favor rellena la información de la forma más completa posible</p>
    <div id="progress" class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <form action="php/registrovacantes.php" method="post" enctype="multipart/form-data">

        <div class="form-part active">
            <h4>Información Básica</h4>
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="ubicacion">Ubicación:</label>
                <input type="text" id="ubicacion" name="ubicacion" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="salario">Salario:</label>
                <input type="text" id="salario" name="salario" class="form-control" required>
            </div>
        </div>

        <div class="form-part">
            <h4>Requisitos y Experiencia</h4>
            <div class="form-group">
                <label for="requisitos">Requisitos:</label>
                <textarea id="requisitos" name="requisitos" rows="4" class="form-control" required></textarea>
            </div>

            <!-- Elimine el campo de fechaPublicacion para obtenerla del servidor -->

            <div class="form-group">
                <label for="fechaExpiracion">Fecha de Expiración (opcional):</label>
                <input type="date" id="fechaExpiracion" name="fechaExpiracion" class="form-control">
            </div>

            <input type="hidden" id="empresa" name="empresa" value="<?php session_start();
                                                                    echo $_SESSION['ID'] ?>">

            <div class="form-group">
                <label for="tipoContrato">Tipo de Contrato:</label>
                <input type="text" id="tipoContrato" name="tipoContrato" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nivelExperiencia">Nivel de Experiencia:</label>
                <input type="text" id="nivelExperiencia" name="nivelExperiencia" class="form-control" required>
            </div>
        </div>

        <div class="form-part">
            <h4>Beneficios e Imágenes</h4>
            <div class="form-group">
                <label for="beneficios">Beneficios:</label>
                <textarea id="beneficios" name="beneficios" rows="4" class="form-control" required></textarea>
            </div>

            <div class="form-group dropzone" id="dropzone1">
                <label for="imagen1">Imagen 1:</label>
                <input type="file" id="imagen1" name="imagen1" accept="image/*" class="form-control-file" required>
            </div>

            <div class="form-group dropzone" id="dropzone2">
                <label for="imagen2">Imagen 2:</label>
                <input type="file" id="imagen2" name="imagen2" accept="image/*" class="form-control-file" required>
            </div>

            <div class="form-group dropzone" id="dropzone3">
                <label for="imagen3">Imagen 3:</label>
                <input type="file" id="imagen3" name="imagen3" accept="image/*" class="form-control-file" required>
            </div>

        </div>

        <button type="button" id="prevBtn" class="btn btn-secondary" onclick="changeFormPart(-1)">Anterior</button>
        <button type="button" id="nextBtn" class="btn btn-primary" onclick="changeFormPart(1)">Siguiente</button>
        <button type="submit" id="submitBtn" class="btn btn-success" style="display: none;">Registrar Oferta Laboral</button>
    </form>
</div>