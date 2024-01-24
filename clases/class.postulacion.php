<?php
class postulacion
{
    protected $id;
    protected $vacante;
    protected $usuario;
    protected $fecha;
    protected $estatus;
    protected $fin;
    public function __construct($id, $vacante, $usuario, $fecha, $estatus, $fin)
    {
        $this->id = $id;
        $this->vacante = $vacante;
        $this->usuario = $usuario;
        $this->fecha = $fecha;
        $this->estatus = $estatus;
        $this->fin = $fin;
    }

    public function create()
    {
        $bd = new Conexion();
        $c = "SHOW TABLES LIKE 'postulaciones'";
        $resultado = $bd->query($c);

        if ($resultado->num_rows < 1) {
            $creart = "CREATE TABLE postulaciones (
                ID INT PRIMARY KEY AUTO_INCREMENT,
                VACANTE VARCHAR(255) DEFAULT NULL,
                USUARIO VARCHAR(255) DEFAULT NULL,
                FECHA DATE DEFAULT NULL,
                ESTATUS VARCHAR(255) DEFAULT NULL,
                FIN DATE DEFAULT NULL
            );";
            $bd->query($creart);
        }

        $sql = "INSERT INTO postulaciones (VACANTE, USUARIO, FECHA, ESTATUS) VALUES ('{$this->vacante}', '{$this->usuario}', '{$this->fecha}', '{$this->estatus}')";
        $bd->query($sql);
    }

    public function read(){
        $bd = new Conexion();
        
        if(isset($this->usuario) && $this->usuario != ''){
            $sql = "SELECT * FROM postulaciones WHERE USUARIO = '{$this->usuario}'";
        }

        $res = $bd->query($sql);
        return $res;
    }
}
