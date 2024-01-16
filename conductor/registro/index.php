<body> 
    <H1>FORMULARIO PARA CONDUCTORES</H1>
<form method="post" action="php/registroconductor.php">

        <input type="hidden" name="action" value="create">
        
        <label for="user">USER:</label>
        <input type="text" id="user" name="user" required>
    <br>
        <label for="email">EMAIL:</label>
        <input type="email" id="email" name="email" required>
    <br>
        <label for="password">PASSWORD:</label>
        <input type="password" id="password" name="password" required>
    <br>  
        <label for="name">NAME:</label>
        <input type="text" id="name" name="name" required>
    <br>
        <label for="licencia">Licencia:</label>
        <input type="text" id="licencia" name="licencia" required>
    <br>
        <label for="ine">INE:</label>
        <input type="text" id="ine" name="ine" required>
    <br>
        <label for="foto">FOTO:</label>
        <input type="file" id="foto" name="foto" required>
    <br>
        <label for="nacimiento">NACIMIENTO:</label>
        <input type="date" id="nacimiento" name="nacimiento" required>
    <br>
        <label for="ingreso">INGRESO:</label>
        <input type="text" id="ingreso" name="ingreso" required>
    <br>
        <label for="completados">COMPLETADOS:</label>
        <input type="text" id="completados" name="completados" required>
    <br>
        <label for="cancelados">CANCELADOS:</label>
        <input type="text" id="cancelados" name="completados" required>
    <br>
        <label for="estatus">ESTATUS:</label>
        <input type="text" id="estatus" name="estatus" required>
    <br>
        <label for="T1">T1:</label>
        <input type="text" id="T1" name="T1" required>
    <br>
        <label for="T2">T2:</label>
        <input type="text" id="T2" name="T2" required>
    <br>
        <input type="submit" value="Enviar">
    </form>

    <div id="resultado"></div>
</body>