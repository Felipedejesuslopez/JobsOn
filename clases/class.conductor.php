<?php
class conductor
{
    protected $id;
    protected $user;
    protected $email;
    protected $password;
    protected $name;
    protected $licencia;
    protected $ine;
    protected $foto;
    protected $nacimiento;
    protected $ingreso;
    protected $completados;
    protected $cancelados;
    protected $estatus;
    protected $telefono;
    protected $opt2;

    public function __construct($id, $user, $email, $password, $name, $licencia, $ine, $foto, $nacimiento, $ingreso, $completados, $cancelados, $estatus, $telefono, $opt2)
    {
        $this->id = $id;
        $this->user = $user;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->licencia = $licencia;
        $this->ine = $ine;
        $this->foto = $foto;
        $this->nacimiento = $nacimiento;
        $this->ingreso = $ingreso;
        $this->completados = $completados;
        $this->cancelados = $cancelados;
        $this->estatus = $estatus;
        $this->telefono = $telefono;
        $this->opt2 = $opt2;
    }

    public function create()
    {
        $bd = new Conexion();
        $ct = "SHOW TABLES LIKE 'conductores'";
        $h = $bd->query($ct);
        if ($h->num_rows > 0) {
            $sql = "INSERT INTO conductores (USER, EMAIL, PASSWORD, NAME, LICENCIA, INE, FOTO, NACIMIENTO, INGRESO, COMPLETADOS, CANCELADOS, ESTATUS, T1, T2) 
            VALUES ('{$this->user}', '{$this->email}', '{$this->password}', '{$this->name}', '{$this->licencia}', '{$this->ine}', '{$this->foto}', '{$this->nacimiento}', '{$this->ingreso}', '{$this->completados}', '{$this->cancelados}', '{$this->estatus}', '{$this->telefono}', '{$this->opt2}')";
        } else {
            // La tabla 'conductores' no existe, crea la tabla y luego realiza la inserción
            $sqlCreateTable = "CREATE TABLE conductores (
                        ID INT AUTO_INCREMENT PRIMARY KEY,
                        USER VARCHAR(255),
                        EMAIL VARCHAR(255),
                        PASSWORD VARCHAR(255),
                        NAME VARCHAR(255),
                        LICENCIA VARCHAR(255),
                        INE VARCHAR(255),
                        FOTO VARCHAR(255),
                        NACIMIENTO DATE,
                        INGRESO DATE,
                        COMPLETADOS INT,
                        CANCELADOS INT,
                        ESTATUS VARCHAR(50),
                        T1 VARCHAR(255),
                        T2 VARCHAR(255)
                      )";

            $bd->query($sqlCreateTable);

            // Ahora, realiza la inserción
            $sql = "INSERT INTO conductores (USER, EMAIL, PASSWORD, NAME, LICENCIA, INE, FOTO, NACIMIENTO, INGRESO, COMPLETADOS, CANCELADOS, ESTATUS, T1, T2) 
            VALUES ('{$this->user}', '{$this->email}', '{$this->password}', '{$this->name}', '{$this->licencia}', '{$this->ine}', '{$this->foto}', '{$this->nacimiento}', '{$this->ingreso}', '{$this->completados}', '{$this->cancelados}', '{$this->estatus}', '{$this->telefono}', '{$this->opt2}')";
        }
        $bd->query($sql);
    }

    public function read($id = null)
    {
        $bd = new Conexion();

        if ($id !== null) {
            // Si se proporciona un ID, obtén ese registro específico
            $sql = "SELECT * FROM conductores WHERE ID = {$id}";
        } else {
            // Si no se proporciona un ID, obtén todos los registros ordenados por ID de mayor a menor
            $sql = "SELECT * FROM conductores ORDER BY ID DESC";
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

        $sql = "UPDATE conductores SET {$setClause} WHERE ID = {$id}";

        $bd->query($sql);

        // Manejo del resultado si es necesario
    }

    public function delete($id)
    {
        $bd = new Conexion();
        $sql = "DELETE FROM conductores WHERE ID = {$id}";

        $bd->query($sql);

        // Manejo del resultado si es necesario
    }

    public function login()
{
    $bd = new Conexion();
    $sql = "SELECT * FROM conductores WHERE (USER = ? OR EMAIL = ? OR T1 = ?) AND PASSWORD = ?";
    
    // Utilizar una consulta preparada
    $stmt = $bd->prepare($sql);

    // Verificar si la preparación fue exitosa
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $bd->error);
    }

    // Vincular los parámetros
    $stmt->bind_param("ssss", $this->user, $this->email, $this->telefono, $this->password);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();

    // Verificar si hay al menos una fila en el resultado
    if ($result->num_rows > 0) {
        // Iniciar sesión y almacenar los datos del usuario en la sesión
        session_start();
        $_SESSION = $result->fetch_assoc();  
        return 1;
    } else {
        return 0;
    }
}

}
