<div class="container">

    <center>
        <h1>FORMULARIO PARA EMPRESAS</h1>
    </center>

    <form method="post" action="php/registroempresa.php">

        <input type="hidden" name="action" value="create">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre">
        <br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion">
        <br>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono">
        <br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"></textarea>
        <br>

        <label for="sector">Sector:</label>
        <input type="text" name="sector">
        <br>

        <label for="contactoNombre">Contacto Nombre:</label>
        <input type="text" name="contactoNombre">
        <br>

        <label for="contactoCorreo">Contacto Correo:</label>
        <input type="email" name="contactoCorreo">
        <br>

        <label for="sitioWeb">Sitio Web:</label>
        <input type="text" name="sitioWeb">
        <br>

        <label for="correo">Correo:</label>
        <input type="email" name="correo">
        <br>

        <label for="psw">Contraseña:</label>
        <input type="password" name="psw">
        <br>

        <input type="submit" value="Enviar">
    </form>
</div>