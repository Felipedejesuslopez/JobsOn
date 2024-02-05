<?php
session_start();
 ?>
<link rel="stylesheet" href="css/vacanteregistro.css">

<center>
    <h1>
        Agregar Vacante
    </h1>
</center>
<div class="container" id="formulario">
    <p>Por favor rellena la información de la forma más completa posible</p>
    <div id="progress" class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <form action="php/registrovacantes.php" method="post" enctype="multipart/form-data">

        <div class="form-part active">
            <h4>Información Básica</h4>
            <div class="form-group">
                <label for="titulo">Título: *</label>
                <input type="text" id="titulo" name="titulo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="titulores">Titulo al que responde el cargo:</label>
                <input type="text" name="tresponde" id="titulores" class="form-control">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción: *</label>
                <textarea id="descripcion" name="descripcion" rows="4" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="planta">Planta:</label>
                <input type="text" name="planta" id="planta" class="form-control">
            </div>
        </div>
        <div class="form-part">
            <div class="form-group">
                <label for="ubicacion">Ubicación: *</label>
                <input type="text" id="ubicacion" name="ubicacion" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="departamento">Departamento:</label>
                <input type="text" name="departamento" id="departamento" class="form-control">
            </div>

            <div class="form-group">
                <label for="salario">Salario: *</label>
                <input type="text" id="salario" name="salario" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="contactos">Contactos con quien tendrá relación interna:</label>
                <input type="text" name="contactos" id="contactos" class="form-control">
            </div>

            <div class="form-group">
                <label for="problemas">Problemas y decisiones a los que se enfrentará en el cargo:</label>
                <input type="text" name="problemas" id="problemas" class="form-control">
            </div>
        </div>

        <div class="form-part">
            <h4>Requisitos y Experiencia</h4>
            <div class="form-group">
                <label for="estudios">Nivel de estudios requeridos</label><br>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="estudios" id="preparatoria" value="Preparatoria">
                    <label class="form-check-label" for="preparatoria" style="width: 100px;">Preparatoria</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="estudios" id="profTrunca" value="Profesional trunca">
                    <label class="form-check-label" for="profTrunca" style="width: 150px;">Profesional trunca</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="estudios" id="profesional" value="Profesional">
                    <label class="form-check-label" for="profesional" style="width: 100px;">Profesional</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="estudios" id="maestria" value="Maestría">
                    <label class="form-check-label" for="maestria" style="width: 100px;">Maestría</label>
                </div>
            </div>
            <div class="form-group">
                <label for="especialidad">Especialidad:</label>
                <input type="text" name="especialidad" id="especialidad" class="form-control">
            </div>
            <div class="form-group">
                <label for="requisitos">Requisitos: *</label>
                <textarea id="requisitos" name="requisitos" rows="4" class="form-control" required></textarea>
            </div>

            <!-- Elimine el campo de fechaPublicacion para obtenerla del servidor -->

            <div class="form-group">
                <label for="fechaExpiracion">Fecha de Expiración (opcional):</label>
                <input type="date" id="fechaExpiracion" name="fechaExpiracion" class="form-control">
            </div>

            <input type="text" id="empresa" name="empresa" value="<?php 
                                                                    echo $_SESSION['ID']; ?>" style="display: none;">


            <div class="form-group">
                <label for="experiencia">Experiencia necesaria</label>
                <input type="text" name="experiencia" id="experiencia" class="form-control">
            </div>

            <div class="form-group">
                <label for="nivelExperiencia">Nivel de Experiencia: *</label>
                <input type="text" id="nivelExperiencia" name="nivelExperiencia" class="form-control" required>
            </div>
        </div>
        <div class="form-part">
            <div class="form-group">
                <label for="alcance">Alcances del puesto</label>
                <textarea type="text" name="alcance" id="alcance" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="idiomas">Idiomas necesarios y su % (ej. Inglés 70%)</label>
                <input type="text" name="idiomas" id="idiomas" class="form-control">
            </div>

            <div class="form-group">
                <label for="habilidades">Conocimientos/Habilidades necesarios para el puesto</label>
                <input type="text" name="habilidades" id="habilidades" class="form-control">
            </div>

            <div class="form-group">
                <label for="tipoContrato">Tipo de Contrato: *</label>
                <input type="text" id="tipoContrato" name="tipoContrato" class="form-control" required>
            </div>
        </div>
        <div class="form-part">
            <h4>Beneficios e Imágenes</h4>
            <div class="form-group">
                <label for="beneficios">Beneficios: *</label>
                <textarea id="beneficios" name="beneficios" rows="4" class="form-control" required></textarea>
            </div>

            <div class="form-group dropzone" id="dropzone1">
                <label for="imagen1">Imagen 1: *</label>
                <input type="file" id="imagen1" name="imagen1" accept="image/*" class="form-control-file" required>
            </div>

            <div class="form-group dropzone" id="dropzone2">
                <label for="imagen2">Imagen 2:</label>
                <input type="file" id="imagen2" name="imagen2" accept="image/*" class="form-control-file">
            </div>

            <div class="form-group dropzone" id="dropzone3">
                <label for="imagen3">Imagen 3:</label>
                <input type="file" id="imagen3" name="imagen3" accept="image/*" class="form-control-file">
            </div>

        </div>

        <button type="button" id="prevBtn" class="btn btn-secondary" onclick="changeFormPart(-1)">Anterior</button>
        <button type="button" id="nextBtn" class="btn btn-primary" onclick="changeFormPart(1)">Siguiente</button>
        <button type="submit" id="submitBtn" class="btn btn-success" style="display: none;">Registrar Oferta Laboral</button>
    </form>
    <br>
    <div class="container">
        <center>
            <button class="btn btn-success" onclick="mosexcel()">
                Usar registro masivo
            </button>
        </center>
    </div>
</div>
<div id="excel" style="display: none;">
    <center>
        Para el registro masivo es necesario llenar la:
        <button class="btn btn-primary" onclick="descargarPlantillap1()">Plantilla</button><br>
        <form action="php/vacantesmasiv.php" method="post" enctype="multipart/form-data" id="plantilla">
            <div id="dropzone">
                <div><br>
                    <i class="far fa-file-excel" style="font-size:50pt; color:green;"></i>
                    <center>
                        <p id="res"> Arrastra aquí el formato</p>
                    </center>
                </div>
                <input type="file" id="file" name="archivo" onchange="enviare()">
            </div>
        </form>

        <button class="btn btn-success" onclick="mosform()">Registro por formulario</button>
    </center>
</div>

<script>
    function mosexcel() {
        $('#excel').show();
        $('#formulario').hide();
    }

    function mosform() {
        $('#excel').hide();
        $('#formulario').show();
    }

    function descargarPlantillap1() {
        $('#aviso').html('<center><h1>Información importante</h1></center><center><p style="text-align:justify;">Al rellenar esta plantilla es importante que considere los siguientes puntos:<br>-<b>Los campos amarillos son campos necesarios para el registro</b>, si no rellena uno de estos campos marcados su vacante NO será registrada y se saltará a la siguiente<br>-<b>No elimine ningun campo</b> Ya que sus registros serán leídos de manera automatizada, conservar todos los campos es importante para una correcta lectura, si no completará un campo opcional, simplemente déjelo vacío.<br>-<b>Máximo 100 registros por vez</b>. Para evitar sobrecarga en el registro de las vacantes por favor ingrese no más de 100 vacanes por cada vez que suba el formato, según la cantidad el tiempo de espera podrá aumentar.</p><button class="btn btn-primary" onclick="descargarPlantilla()">Aceptar y Descargar</button></center>');
        $("#modalavisos").modal("show");
    }

    function descargarPlantilla() {
        // Crear un elemento <a> temporal
        var link = document.createElement('a');

        // Configurar el enlace con el archivo xlsx y nombre de descarga
        link.href = 'docs/Plantilla_vacante_JobsOn.xlsx';
        link.download = 'Plantilla_vacante_JobsOn.xlsx';

        // Simular un clic en el enlace para iniciar la descarga
        link.click();
    }

    function enviare() {
        $.ajax({
            url: 'php/vacantesmasiv.php ',
            method: 'post',
            data: new FormData($('#plantilla')[0]), // Usar FormData para enviar datos de formulario con archivos
            contentType: false,
            processData: false,
            cache: false,
        }).done(function(msg) {
            $('#aviso').html(msg);
            $("#modalavisos").modal("show");
        }).fail(function(e) {

        });
    }

    var currentStep = 0;
    const formParts = document.querySelectorAll('.form-part');
    const progressBar = document.querySelector('.progress-bar');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');

    function changeFormPart(n) {
        if (currentStep >= 0 && currentStep < formParts.length) {
            formParts[currentStep].classList.remove('active');
            currentStep += n;
            if (currentStep < 0) {
                currentStep = 0;
            } else if (currentStep >= formParts.length) {
                currentStep = formParts.length - 1;
            }
            formParts[currentStep].classList.add('active');

            progressBar.style.width = (currentStep / (formParts.length - 1)) * 100 + '%';

            prevBtn.disabled = currentStep === 0;
            nextBtn.disabled = currentStep === formParts.length - 1;

            if (currentStep === formParts.length - 1) {
                nextBtn.style.display = 'none';
                submitBtn.style.display = 'inline-block';
            } else {
                nextBtn.style.display = 'inline-block';
                submitBtn.style.display = 'none';
            }
        }
    }

</script>