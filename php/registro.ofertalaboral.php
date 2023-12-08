<?php
require_once 'clases/class.ofertalaboral.php';
require_once 'clases/class.conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Oferta Laboral</title>
</head>
<body>

<h2>Crear Oferta Laboral</h2>

<form action="procesarFormulario" method="post" enctype="multipart/form-data">
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" required><br>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" required></textarea><br>

    <label for="ubicacion">Ubicación:</label>
    <input type="text" id="ubicacion" name="ubicacion" required><br>

    <label for="salario">Salario:</label>
    <input type="text" id="salario" name="salario" required><br>

    <label for="requisitos">Requisitos:</label>
    <textarea id="requisitos" name="requisitos" required></textarea><br>

    <label for="fechaPublicacion">Fecha de Publicación:</label>
    <input type="date" id="fechaPublicacion" name="fechaPublicacion" required><br>

    <label for="fechaExpiracion">Fecha de Expiración:</label>
    <input type="date" id="fechaExpiracion" name="fechaExpiracion" required><br>

    <label for="empresa">Empresa:</label>
    <input type="text" id="empresa" name="empresa" required><br>

    <label for="tipoContrato">Tipo de Contrato:</label>
    <input type="text" id="tipoContrato" name="tipoContrato" required><br>

    <label for="nivelExperiencia">Nivel de Experiencia:</label>
    <input type="text" id="nivelExperiencia" name="nivelExperiencia" required><br>

    <label for="beneficios">Beneficios:</label>
    <textarea id="beneficios" name="beneficios" required></textarea><br>

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="imagen" accept="image/*" required><br>

    <input type="submit" value="Crear Oferta">
</form>

</body>
</html>
