<?php

class CategoriaOferta
{

    protected $id;
    protected $titulo;
    protected $descripcion;
    protected $ubicacion;

    public function __construct($id, $titulo, $descripcion, $ubicacion)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->ubicacion = $ubicacion;
    }

    public function create()
    {
        $bd = new Conexion();
        $consultaExistencia = "SHOW TABLES LIKE 'categorias_ofertas'";
        $resultado = $bd->query($consultaExistencia);
        $sql = "INSERT INTO categorias_ofertas (TITULO, DESCRIPCION, UBICACION) VALUES ('{$this->titulo}','{$this->descripcion}','{$this->ubicacion}')";

        if ($resultado->num_rows < 1) {
            $crearTabla = "CREATE TABLE categorias_ofertas (
                ID INT AUTO_INCREMENT PRIMARY KEY,
                TITULO VARCHAR(255) NOT NULL,
                DESCRIPCION TEXT,
                UBICACION VARCHAR(100)
            )";

            $bd->query($crearTabla);
        }

        return $bd->query($sql);
    }

    public function read(){
        $bd = new Conexion();
        if(isset($this->id) && $this->id != ""){
            $sql = "SELECT * FROM categorias_ofertas ORDER BY TITULO ASC";
        }else{
            $sql = "SELECT * FROM categorias_ofertas WHERE ID = '{$this->id}'";
        }

        return $bd->query($sql);
    }

    public function update(){
        $bd = new Conexion();
        $sql = "UPDATE categorias_ofertas SET TITULO = '{$this->titulo}', DESCRIPCION = '{$this->descripcion}', UBICACION = '{$this->ubicacion}' WHERE ID = '{$this->id}'";
        return $bd->query($sql);
    }
}

?>