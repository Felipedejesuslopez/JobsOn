<style>


h2 {
    text-align: center;
    color: #333;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="password"],
textarea,
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
</style>
    <div class="container">
        <h2>Registro de Oferta Laboral</h2>
        <form action="php/registrovacantes.php" method="post" enctype="multipart/form-data">
            <div form-group>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" required>
            </div>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required></textarea>

            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion" required>

            <label for="salario">Salario:</label>
            <input type="text" id="salario" name="salario" required>

            <label for="requisitos">Requisitos:</label>
            <textarea id="requisitos" name="requisitos" rows="4" required></textarea>

            <!-- Elimine el campo de fechaPublicacion para obtenerla del servidor -->

            <label for="fechaExpiracion">Fecha de Expiración (opcional):</label>
            <input type="date" id="fechaExpiracion" name="fechaExpiracion">

            <label for="empresa">Empresa:</label>
            <input type="text" id="empresa" name="empresa" style="display: none;" value="<?php session_start();
                                                                                            echo $_SESSION['ID'] ?>">

            <label for="tipoContrato">Tipo de Contrato:</label>
            <input type="text" id="tipoContrato" name="tipoContrato" required>

            <label for="nivelExperiencia">Nivel de Experiencia:</label>
            <input type="text" id="nivelExperiencia" name="nivelExperiencia" required>

            <label for="beneficios">Beneficios:</label>
            <textarea id="beneficios" name="beneficios" rows="4" required></textarea>

            <label for="imagen1">Imagen 1:</label>
            <input type="file" id="imagen1" name="imagen1" accept="image/*" required><br>

            <label for="imagen2">Imagen 2:</label>
            <input type="file" id="imagen2" name="imagen2" accept="image/*" required><br>

            <label for="imagen3">Imagen 3:</label>
            <input type="file" id="imagen3" name="imagen3" accept="image/*" required><br>
<br>
            <button type="submit"class="btn btn-success">Registrar Oferta Laboral</button>
        </form>
    </div>
