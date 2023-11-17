<?php
class Laboratorio
{
    protected $id;
    protected $user;
    protected $email;
    protected $password;
    protected $name;
    protected $direccion;
    protected $horario;
    protected $telefono;
    protected $estatus;
    protected $op1;
    protected $op2;
    protected $op3;

    public function __construct($id, $user, $email, $password, $name, $direccion, $horario, $telefono, $estatus, $op1, $op2, $op3)
    {
        $this->id = $id;
        $this->user = $user;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->direccion = $direccion;
        $this->horario = $horario;
        $this->telefono = $telefono;
        $this->estatus = $estatus;
        $this->op1 = $op1;
        $this->op2 = $op2;
        $this->op3 = $op3;
    }

    public function create()
    {
        $bd = new Conexion();
        $ct = "SHOW TABLES LIKE 'laboratorios'";
        $h = $bd->query($ct);

        $sql = "INSERT INTO laboratorios (USER, EMAIL, PASSWORD, NAME, DIRECCION, HORARIO, TELEFONO, ESTATUS, OP1, OP2, OP3) 
                VALUES ('{$this->user}', '{$this->email}', '{$this->password}', '{$this->name}', '{$this->direccion}', '{$this->horario}', '{$this->telefono}', '{$this->estatus}', '{$this->op1}', '{$this->op2}', '{$this->op3}')";

        if ($h->num_rows < 1) {
            // La tabla 'laboratorios' no existe, crea la tabla y luego realiza la inserción
            $sqlCreateTable = "CREATE TABLE laboratorios (
                                ID INT AUTO_INCREMENT PRIMARY KEY,
                                USER VARCHAR(255),
                                EMAIL VARCHAR(255),
                                PASSWORD VARCHAR(255),
                                NAME VARCHAR(255),
                                DIRECCION VARCHAR(255),
                                HORARIO VARCHAR(255),
                                TELEFONO VARCHAR(20),
                                ESTATUS VARCHAR(50),
                                OP1 VARCHAR(255),
                                OP2 VARCHAR(255),
                                OP3 VARCHAR(255)
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
            $sql = "SELECT * FROM laboratorios WHERE ID = {$id}";
        } else {
            // Si no se proporciona un ID, obtén todos los registros ordenados por ID de mayor a menor
            $sql = "SELECT * FROM laboratorios ORDER BY ID DESC";
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

        $sql = "UPDATE laboratorios SET {$setClause} WHERE ID = {$id}";

        $bd->query($sql);

        // Manejo del resultado si es necesario
    }

    public function delete($id)
    {
        $bd = new Conexion();
        $sql = "DELETE FROM laboratorios WHERE ID = {$id}";

        $bd->query($sql);

        // Manejo del resultado si es necesario
    }
}
?>