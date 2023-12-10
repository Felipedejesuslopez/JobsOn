<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Oferta Laboral</title>
   
</head>
<body>

<div class="container">
    <h2>Registro de Oferta Laboral</h2>
    <form action="../../php/registrovacantes.php" method="post">
        
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="4" required></textarea>

        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion" required>

        <label for="salario">Salario:</label>
        <input type="text" id="salario" name="salario" required>

        <label for="requisitos">Requisitos:</label>
        <textarea id="requisitos" name="requisitos" rows="4" required></textarea>

        <label for="fechaPublicacion">Fecha de Publicación:</label>
        <input type="date" id="fechaPublicacion" name="fechaPublicacion" required>

        <label for="fechaExpiracion">Fecha de Expiración:</label>
        <input type="date" id="fechaExpiracion" name="fechaExpiracion" required>

        <label for="empresa">Empresa:</label>
        <input type="text" id="empresa" name="empresa" required>

        <label for="tipoContrato">Tipo de Contrato:</label>
        <input type="text" id="tipoContrato" name="tipoContrato" required>

        <label for="nivelExperiencia">Nivel de Experiencia:</label>
        <input type="text" id="nivelExperiencia" name="nivelExperiencia" required>

        <label for="beneficios">Beneficios:</label>
        <textarea id="beneficios" name="beneficios" rows="4" required></textarea>

        <button type="submit">Registrar Oferta Laboral</button>
    </form>
</div>

</body>
</html>