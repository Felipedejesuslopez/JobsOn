<?php
class admin
{
    protected $id;
    protected $username;
    protected $password;
    protected $email;
    protected $name;
    protected $nacimiento;
    protected $ciudad;
    protected $telefono;
    protected $respaldo;

    public function __construct($id, $username, $password, $email, $name, $nacimiento, $ciudad, $telefono, $respaldo)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->name = $name;
        $this->nacimiento = $nacimiento;
        $this->ciudad = $ciudad;
        $this->telefono = $telefono;
        $this->respaldo = $respaldo;
    }

    public function create()
    {
        $bd = new Conexion();
        $ct = "SHOW TABLES LIKE 'admins'";
        $h = $bd->query($ct);

        $sql = "INSERT INTO admins (USERNAME, PASSWORD, EMAIL, NAME, NACIMIENTO, CIUDAD, TELEFONO, RESPALDO) 
                VALUES ('{$this->username}', '{$this->password}', '{$this->email}', '{$this->name}', '{$this->nacimiento}', '{$this->ciudad}', '{$this->telefono}', '{$this->respaldo}')";

        if ($h->num_rows < 1) {
            // La tabla 'admins' no existe, crea la tabla y luego realiza la inserción
            $sqlCreateTable = "CREATE TABLE admins (
                                ID INT AUTO_INCREMENT PRIMARY KEY,
                                USERNAME VARCHAR(255),
                                PASSWORD VARCHAR(255),
                                EMAIL VARCHAR(255),
                                NAME VARCHAR(255),
                                NACIMIENTO DATE,
                                CIUDAD VARCHAR(255),
                                TELEFONO VARCHAR(20),
                                RESPALDO TEXT
                            )";

            $bd->query($sqlCreateTable);
        }

        $bd->query($sql);
    }

    public function read($id = null)
    {
        $bd = new Conexion();

        if ($id !== null) {
            // Si se proporciona un ID, obtén ese registro específico
            $sql = "SELECT * FROM admins WHERE ID = {$id}";
        } else {
            // Si no se proporciona un ID, obtén todos los registros ordenados por ID de mayor a menor
            $sql = "SELECT * FROM admins ORDER BY ID DESC";
        }

        $result = $bd->query($sql);

        // Manejo del resultado (podrías devolverlo, imprimirlo, etc.)
        return $result;
    }

    public function update($id, $data)
    {
        $bd = new Conexion();
        $setClause = '';

        foreach ($data as $key => $value) {
            $setClause .= "{$key} = '{$value}', ";
        }

        $setClause = rtrim($setClause, ', ');

        $sql = "UPDATE admins SET {$setClause} WHERE ID = {$id}";

        $bd->query($sql);

        // Manejo del resultado si es necesario
    }

    public function delete($id)
    {
        $bd = new Conexion();
        $sql = "DELETE FROM admins WHERE ID = {$id}";

        $bd->query($sql);

        // Manejo del resultado si es necesario
    }

    public function login()
    {
        $bd = new Conexion();

        $credential = $this->email; // Asume que el correo es la credencial por defecto
        if ($this->username !== null) {
            $credential = $this->username;
        } elseif ($this->telefono !== null) {
            $credential = $this->telefono;
        }

        $sql = "SELECT * FROM admins WHERE EMAIL = '{$credential}'";

        $result = $bd->query($sql);

        if ($result->num_rows > 0) {
            $admin = $result->fetch_assoc();
            // Verifica si la contraseña proporcionada coincide
            if (password_verify($this->password, $admin['PASSWORD'])) {
                return $admin; // Devuelve el usuario si las credenciales son correctas
            }
        }

        return null; // Devuelve null si las credenciales son incorrectas
    }
}
