<?php
class seguimiento
{
    protected $id;
    protected $vacante;
    protected $reclutador;
    protected $fecha;
    protected $d1;
    protected $d2;
    public function __construct($id, $vacante, $reclutador, $fecha, $d1, $d2)
    {
        $this->id = $id;
        $this->vacante = $vacante;
        $this->reclutador = $reclutador;
        $this->fecha = $fecha;
        $this->d1 = $d1;
        $this->d2 = $d2;
    }

    public function create()
    {
        $bd = new Conexion();
        $rev = "SHOW TABLES LIKE 'seguimiento'";
        $resultado = $bd->query($rev);
        if ($resultado->num_rows < 1) {
            $sc = "CREATE TABLE seguimiento(
                ID INT AUTO_INCREMENT PRIMARY KEY,
                VACANTE INT(200),
                RECLUTADOR INT(200),
                FECHA DATE DEFAULT NULL,
                D1 TEXT DEFAULT NULL,
                D2 TEXT DEFAULT NULL
                )";
            $bd->query($sc);
        }
        $sql = "INSERT INTO seguimiento (VACANTE, RECLUTADOR, FECHA) VALUES ('{$this->vacante}','{$this->reclutador}','{$this->fecha}')";
        if ($bd->query($sql)) {
            return true;
        }
    }

    public function read()
    {
        $bd = new Conexion();
        $rev = "SHOW TABLES LIKE 'seguimiento'";
        $resultado = $bd->query($rev);
        if ($resultado->num_rows < 1) {
            $sc = "CREATE TABLE seguimiento(
                ID INT AUTO_INCREMENT PRIMARY KEY,
                VACANTE INT(200),
                RECLUTADOR INT(200),
                FECHA DATE DEFAULT NULL,
                D1 TEXT DEFAULT NULL,
                D2 TEXT DEFAULT NULL
                )";
            $bd->query($sc);
        }

        if (isset($this->id) && $this->id != null) {
            $sql = "SELECT * FROM seguimiento WHERE ID = '{$this->id}'";
        } else if (isset($this->vacante) && $this->vacante != null) {
            $sql = "SELECT * FROM seguimiento WHERE VACANTE = '{$this->vacante}'";
        } else if (isset($this->reclutador) && $this->reclutador != null) {
            $sql = "SELECT * FROM seguimiento WHERE RECLUTADOR = '{$this->vacante}'";
        } else if (isset($this->vacante) && isset($this->reclutador) && $this->vacante != null && $this->vacante != null) {
            $sql = "SELECT * FROM seguimiento WHERE RECLUTADOR = '{$this->vacante}' AND VACANTE = '{$this->reclutador}'";
        } else {
            $sql = "SELECT * FROM seguimiento";
        }
        $res = $bd->query($sql);
        return $res;
    }

    public function update()
    {
    }
    public function delete()
    {
    }
}
