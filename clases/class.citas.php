<?php

class Cita
{

    protected $id_empresa;
    protected $id_reclutador;
    protected $id_oferta;
    protected $id;
    protected $titulo;
    protected $descripcion;
    protected $ubicacion;
    protected $fechaCita;
    protected $horaCita;
    protected $participantes;

    public function __construct($id_empresa, $id_reclutador, $id_oferta, $id, $titulo, $descripcion, $ubicacion, $fechaCita, $horaCita, $participantes)
    {
        $this->id_empresa = $id_empresa;
        $this->id_reclutador = $id_reclutador;
        $this->id_oferta = $id_oferta;
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->ubicacion = $ubicacion;
        $this->fechaCita = $fechaCita;
        $this->horaCita = $horaCita;
        $this->participantes = $participantes;
    }

    public function create()
    {
        $bd = new Conexion();
        $consultaExistencia = "SHOW TABLES LIKE 'citas'";
        $resultado = $bd->query($consultaExistencia);
        $sql = "INSERT INTO citas (ID_EMPRESA, ID_RECLUTADOR, ID_OFERTA, TITULO, DESCRIPCION, UBICACION, FECHA_CITA, HORA_CITA, PARTICIPANTES) VALUES ('{$this->id_empresa}','{$this->id_reclutador}','{$this->id_oferta}','{$this->titulo}','{$this->descripcion}','{$this->ubicacion}','{$this->fechaCita}','{$this->horaCita}','{$this->participantes}')";

        if ($resultado->num_rows < 1) {
            $crearTabla = "CREATE TABLE citas (
                ID INT AUTO_INCREMENT PRIMARY KEY,
                ID_EMPRESA INT,
                ID_RECLUTADOR INT,
                ID_OFERTA INT,
                TITULO VARCHAR(255) NOT NULL,
                DESCRIPCION TEXT,
                UBICACION VARCHAR(100),
                FECHA_CITA DATE,
                HORA_CITA TIME,
                PARTICIPANTES TEXT
            )";

            $bd->query($crearTabla);
        }

        return $bd->query($sql);
    }

    public function read()
    {
        $bd = new Conexion();
        if (isset($this->id) && $this->id != "") {
            $sql = "SELECT * FROM citas ORDER BY TITULO ASC";
        } else {
            $sql = "SELECT * FROM citas WHERE ID = '{$this->id}'";
        }

        return $bd->query($sql);
    }

    public function update()
    {
        $bd = new Conexion();
        $sql = "UPDATE citas SET ID_EMPRESA = '{$this->id_empresa}', ID_RECLUTADOR = '{$this->id_reclutador}', ID_OFERTA = '{$this->id_oferta}', TITULO = '{$this->titulo}', DESCRIPCION = '{$this->descripcion}', UBICACION = '{$this->ubicacion}', FECHA_CITA = '{$this->fechaCita}', HORA_CITA = '{$this->horaCita}', PARTICIPANTES = '{$this->participantes}' WHERE ID = '{$this->id}'";
        return $bd->query($sql);
    }
}
?>