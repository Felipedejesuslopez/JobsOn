<body> 
<form method="post" action="../../php/registroadmin.php" id="formulario">
        <label for="username">USERNAME:</label>
        <input type="text" id="nombre" name="username" required>

        <label for="password">PASSWORD:</label>
        <input type="password" id="password" name="password" required>

        <label for="email">EMAIL:</label>
        <input type="email" id="email" name="email" required>

        <label for="name">NAME:</label>
        <input type="text" id="name" name="name" required>

        <label for="nacimiento">NACIMIENTO:</label>
        <input type="date" id="nacimiento" name="nacimiento" required>

        <label for="ciudad">CIUDAD:</label>
        <input type="text" id="ciudad" name="ciudad" required>

        <label for="telefono">TELEFONO:</label>
        <input type="text" id="telefono" name="telefono" required>

        <label for="respaldo">RESPALDO:</label>
        <input type="text" id="respaldo" name="respaldo" required>
        <input type="text" name="action" value="create" style="display:none;">

        <input type="submit" value="Enviar">
    </form>

    <div id="resultado"></div>
</body>