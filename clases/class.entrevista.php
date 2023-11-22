<?php

class Entrevista
{

    protected $id_empresa;
    protected $id_oferta;
    protected $id;
    protected $id_reclutador;
    protected $id_usuario;
    protected $fecha;
    protected $hora;
    protected $ubicacion;
    protected $estado_resultado;

    public function __construct($id_empresa, $id_oferta, $id, $id_reclutador, $id_usuario, $fecha, $hora, $ubicacion, $estado_resultado)
    {
        $this->id_empresa = $id_empresa;
        $this->id_oferta = $id_oferta;
        $this->id = $id;
        $this->id_reclutador = $id_reclutador;
        $this->id_usuario = $id_usuario;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->ubicacion = $ubicacion;
        $this->estado_resultado = $estado_resultado;
    }

    public function create()
    {
        $bd = new Conexion();
        $consultaExistencia = "SHOW TABLES LIKE 'entrevistas'";
        $resultado = $bd->query($consultaExistencia);
        $sql = "INSERT INTO entrevistas (ID_EMPRESA, ID_OFERTA, ID_RECLUTADOR, ID_USUARIO, FECHA, HORA, UBICACION, ESTADO_RESULTADO) VALUES ('{$this->id_empresa}', '{$this->id_oferta}', '{$this->id_reclutador}', '{$this->id_usuario}', '{$this->fecha}', '{$this->hora}', '{$this->ubicacion}', '{$this->estado_resultado}')";

        if ($resultado->num_rows < 1) {
            $crearTabla = "CREATE TABLE entrevistas (
                ID_EMPRESA INT,
                ID_OFERTA INT,
                ID INT AUTO_INCREMENT PRIMARY KEY,
                ID_RECLUTADOR INT,
                ID_USUARIO INT,
                FECHA DATE,
                HORA TIME,
                UBICACION VARCHAR(100),
                ESTADO_RESULTADO VARCHAR(255)
            )";

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
        $sql = "UPDATE entrevistas SET ID_EMPRESA = '{$this->id_empresa}', ID_OFERTA = '{$this->id_oferta}', ID_RECLUTADOR = '{$this->id_reclutador}', ID_USUARIO = '{$this->id_usuario}', FECHA = '{$this->fecha}', HORA = '{$this->hora}', UBICACION = '{$this->ubicacion}', ESTADO_RESULTADO = '{$this->estado_resultado}' WHERE ID = '{$this->id}'";
        return $bd->query($sql);
    }
}
?>