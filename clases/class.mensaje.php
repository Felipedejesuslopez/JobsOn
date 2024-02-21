<?php
class mensaje
{
    protected $id;
    protected $id_emisor;
    protected $id_receptor;
    protected $rol_emisor;
    protected $rol_receptor;
    protected $mensaje;
    protected $fecha;
    protected $hora;

    public function __construct($id, $id_emisor, $id_receptor, $rol_emisor, $rol_receptor, $mensaje, $fecha, $hora)
    {
        $this->id = $id;
        $this->id_emisor = $id_emisor;
        $this->id_receptor = $id_receptor;
        $this->rol_emisor = $rol_emisor;
        $this->rol_receptor = $rol_receptor;
        $this->mensaje = $mensaje;
        $this->fecha = $fecha;
        $this->hora = $hora;
    }

    
    public function create()
    {
        $bd = new Conexion();

        $sql = "INSERT INTO mensaje (
            ID_EMISOR, ID_RECEPTOR, ROL_EMISOR, ROL_RECEPTOR,MENSAJE, FECHA, HORA) 
        VALUES ('{$this->id_emisor}', '{$this->id_receptor}','{$this->rol_emisor}','{$this->rol_receptor}','{$this->mensaje}','{$this->fecha}','{$this->hora}')";

        $consulta = "SHOW TABLES LIKE 'mensaje'";
        $dato = $bd->query($consulta);

        if ($dato->num_rows < 1) {
            $creartabla = "CREATE TABLE mensaje (
                ID INT AUTO_INCREMENT PRIMARY KEY,
                ID_EMISOR INT,
                ID_RECEPTOR INT,
                ROL_EMISOR VARCHAR(255),
                ROL_RECEPTOR VARCHAR(255),
                MENSAJE VARCHAR(2255),
                FECHA VARCHAR(255),
                HORA TIME)";

            $bd->query($creartabla);
        }
        $bd->query($sql);
    }


    public function read()
    {
        $bd = new Conexion();
        if (isset($this->id) && $this->id != "") {
            $sql = "SELECT * FROM mensaje WHERE ID = '{$this->id}'";
        } else if (isset($this->id_emisor) && isset($this->id_receptor) && $this->id_receptor != null && $this->id_emisor != null) {
            $sql = "SELECT * FROM mensaje WHERE ID_EMISOR = '{$this->id_emisor}' AND ID_RECEPTOR = '{$this->id_receptor}' AND ROL_EMISOR = '{$this->rol_emisor} AND ROL_RECEPTOR = '{$this->rol_receptor}''";
        } else {
            $sql = "SELECT * FROM mensaje ORDER BY ID DESC";
        }

        $ret = $bd->query($sql);
        return $ret;
    }


    public function update()
    {
    }


    public function delete($id)
    {
        $bd = new Conexion();
        $sql = "DELETE FROM mensaje WHERE ID = {$id}";
        $bd->query($sql);
    }


    public function chats()
    {
        $bd = new Conexion();
        $sql = "SELECT DISTINCT m1.ID_RECEPTOR, m1.ROL_RECEPTOR, m1.ID_EMISOR, m1.ROL_EMISOR
                FROM mensaje m1
                LEFT JOIN mensaje m2 
                ON (m1.ID_EMISOR = m2.ID_RECEPTOR AND m1.ROL_EMISOR = m2.ROL_RECEPTOR 
                    AND m1.ID_RECEPTOR = m2.ID_EMISOR AND m1.ROL_RECEPTOR = m2.ROL_EMISOR)
                WHERE (m1.ID_EMISOR = '{$this->id_emisor}' AND m1.ROL_EMISOR = '{$this->rol_emisor}')
                OR (m1.ID_RECEPTOR = '{$this->id_emisor}' AND m1.ROL_RECEPTOR = '{$this->rol_emisor}')
                AND m2.ID IS NULL";
        $res = $bd->query($sql);
        return $res;
    }


    public function chat()
    {
        $bd = new Conexion();

        $sql = "SELECT *, 'enviado' AS tipo FROM mensaje WHERE ID_EMISOR = '{$this->id_emisor}' AND ROL_EMISOR = '{$this->rol_emisor}' AND ID_RECEPTOR = '{$this->id_receptor}' AND ROL_RECEPTOR = '{$this->rol_receptor}' 
    UNION 
    SELECT *, 'recibido' AS tipo FROM mensaje WHERE ID_RECEPTOR = '{$this->id_emisor}' AND ROL_RECEPTOR = '{$this->rol_emisor}' AND ID_EMISOR = '{$this->id_receptor}' AND ROL_EMISOR = '{$this->rol_receptor}' ORDER BY ID";

        $ret = $bd->query($sql);
        return $ret;
    }
}
