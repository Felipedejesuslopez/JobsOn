<body>

<h1>FORMULARIO PARA LABORATORIOS</h1>
    <form method="post" action="php/registrolaboratorio.php">

        <input type="hidden" name="action" value="create">

        <label for="user">Usuario:</label>
        <input type="text" id="user" name="user" required>
        <br>
    
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
        <br>
    
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
    
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <br>
    
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required>
        <br>
    
        <label for="horario">Horario:</label>
        <input type="text" id="horario" name="horario" required>
        <br>
    
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>
        <br>
    
        <label for="estatus">Estatus:</label>
        <input type="text" id="estatus" name="estatus" required>
        <br>
    
        <label for="op1">Opción 1:</label>
        <input type="text" id="op1" name="op1" required>
        <br>
    
        <label for="op2">Opción 2:</label>
        <input type="text" id="op2" name="op2" required>
        <br>
    
        <label for="op3">Opción 3:</label>
        <input type="text" id="op3" name="op3" required>
        <br>
    
      
        <input type="submit" value="Enviar">
    </form>
    
    </body>