<?php

class Entrevista
{


    protected $id;
    protected $postulacion;
    protected $rolagenda; //Se refiere a si agenda reclutador, empresa o alguien
    protected $idagenda; //Id de quien agenda, reclutador o empresa
    protected $usuario;
    protected $fecha;
    protected $hora;
    protected $ubicacion;
    protected $estado;
    protected $observaciones;

    public function __construct($id, $postulacion, $rolagenda, $idagenda, $usuario, $fecha, $hora, $ubicacion, $estado, $observaciones)
    {
        $this->id = $id;
        $this->postulacion = $postulacion;
        $this->rolagenda = $rolagenda;
        $this->idagenda = $idagenda;
        $this->usuario = $usuario;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->ubicacion = $ubicacion;
        $this->estado = $estado;
        $this->observaciones = $observaciones;
    }


    public function create()
    {
        $bd = new Conexion();
        $consultaExistencia = "SHOW TABLES LIKE 'entrevistas'";
        $resultado = $bd->query($consultaExistencia);
        $sql = "INSERT INTO ENTREVISTA 
        (POSTULACION, ROLAGENDA, IDAGENDA, USUARIO, FECHA, HORA, UBICACION, ESTADO, OBSERVACIONES) 
        VALUES 
        ('{$this->postulacion}', '{$this->rolagenda}', '{$this->idagenda}', '{$this->usuario}', '{$this->fecha}', '{$this->hora}', '{$this->ubicacion}', '{$this->estado}', '{$this->observaciones}')";


        if ($resultado->num_rows < 1) {
            $crearTabla = "CREATE TABLE entrevista (
                ID INT AUTO_INCREMENT PRIMARY KEY,
                POSTULACION INT NOT NULL,
                ROLAGENDA VARCHAR(255) NOT NULL,
                IDAGENDA INT NOT NULL,
                USUARIO INT NOT NULL,
                FECHA DATE NOT NULL,
                HORA TIME NOT NULL,
                UBICACION VARCHAR(255),
                ESTADO VARCHAR(255),
                OBSERVACIONES TEXT
            );";

            $bd->query($crearTabla);
        }

        return $bd->query($sql);
    }

    public function read()
    {
        $bd = new Conexion();
        if (isset($this->id) && $this->id != "") {
            $sql = "SELECT * FROM entrevistas ORDER BY ID ASC";
        } else {
            $sql = "SELECT * FROM entrevistas WHERE ID = '{$this->id}'";
        }

        return $bd->query($sql);
    }

    public function update()
    {
        $bd = new Conexion();
        $sql = "UPDATE ENTREVISTA
            SET POSTULACION = '{$this->postulacion}', 
                ROLAGENDA = '{$this->rolagenda}', 
                IDAGENDA = '{$this->idagenda}', 
                USUARIO = '{$this->usuario}', 
                FECHA = '{$this->fecha}', 
                HORA = '{$this->hora}', 
                UBICACION = '{$this->ubicacion}', 
                ESTADO = '{$this->estado}', 
                OBSERVACIONES = '{$this->observaciones}'
            WHERE ID = '{$this->id}'";
        return $bd->query($sql);
    }
}
