<?php
class reclutador
{
    protected $id;
    protected $user;
    protected $email;
    protected $password;
    protected $cedula;
    protected $name;
    protected $telefono;
    protected $foto;
    protected $nacimiento;
    protected $ingreso;
    protected $estatus;

    public function __construct($id, $user, $email, $password, $cedula, $name, $telefono, $foto, $nacimiento, $ingreso, $estatus)
    {
        $this->id = $id;
        $this->user = $user;
        $this->email = $email;
        $this->password = md5($password);
        $this->cedula = $cedula;
        $this->name = $name;
        $this->telefono = $telefono;
        $this->foto = $foto;
        $this->nacimiento = $nacimiento;
        $this->ingreso = $ingreso;
        $this->estatus = $estatus;
    }


    public function create()
    {
        $bd = new Conexion();
        $ct = "SHOW TABLES LIKE 'reclutadores'";
        $h = $bd->query($ct);

        $sql = "INSERT INTO reclutadores (USER, EMAIL, PASSWORD, CEDULA, NAME, TELEFONO, FOTO, NACIMIENTO, INGRESO, ESTATUS) 
                VALUES ('{$this->user}', '{$this->email}', '{$this->password}', '{$this->cedula}', '{$this->name}', '{$this->telefono}', '{$this->foto}', '{$this->nacimiento}', '{$this->ingreso}', '{$this->estatus}')";

        if ($h->num_rows < 1) {
            // La tabla 'reclutadores' no existe, crea la tabla y luego realiza la inserción
            $sqlCreateTable = "CREATE TABLE reclutadores (
                                ID INT AUTO_INCREMENT PRIMARY KEY,
                                USER VARCHAR(255),
                                EMAIL VARCHAR(255),
                                PASSWORD VARCHAR(255),
                                CEDULA VARCHAR(255),
                                NAME VARCHAR(255),
                                TELEFONO VARCHAR(20),
                                FOTO VARCHAR(255),
                                NACIMIENTO DATE,
                                INGRESO DATE,
                                ESTATUS VARCHAR(50)
                            )";

            $bd->query($sqlCreateTable);
        }

        $bd->query($sql);
        return $bd->insert_id;
    }

    public function read($id = null)
    {
        $bd = new Conexion();

        if ($id !== null) {
            // Si se proporciona un ID, obtén ese registro específico
            $sql = "SELECT * FROM reclutadores WHERE ID = {$id}";
        } else {
            // Si no se proporciona un ID, obtén todos los registros ordenados por ID de mayor a menor
            $sql = "SELECT * FROM reclutadores ORDER BY ID DESC";
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

        $sql = "UPDATE reclutadores SET {$setClause} WHERE ID = {$id}";

        $bd->query($sql);

        // Manejo del resultado si es necesario
    }

    public function delete($id)
    {
        $bd = new Conexion();
        $sql = "DELETE FROM reclutadores WHERE ID = {$id}";

        $bd->query($sql);

        // Manejo del resultado si es necesario
    }

    public function login()
    {

        $bd = new Conexion();
        $sql = "SELECT * FROM reclutadores WHERE (USER = ? OR EMAIL = ? OR TELEFONO = ?) AND PASSWORD = ?";

        // Utilizar una consulta preparada
        $stmt = $bd->prepare($sql);
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
