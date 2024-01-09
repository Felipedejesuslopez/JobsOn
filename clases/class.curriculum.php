<?php
class curriculum
{
    protected $id;
    protected $nombre;
    protected $apellidos;
    protected $nacimiento;
    protected $nacionalidad;
    protected $ciudad;
    protected $domicilio;
    protected $experiencia;
    protected $estadocivil;
    protected $estudios;
    protected $certificaciones;
    protected $telefono;
    protected $correo;
    protected $referencias;
    protected $trabajoprevio;
    protected $idiomas;
    protected $aptitudes;
    protected $descripcion;

    public function __construct($id, $nombre, $apellidos, $nacimiento, $nacionalidad, $ciudad, $domicilio, $experiencia, $estadocivil, $estudios, $certificaciones, $telefono, $correo, $referencias, $trabajoprevio, $idiomas, $aptitudes, $descripcion)
    {
        $this->id = $id;
        $this->nombre =  $nombre;
        $this->apellidos = $apellidos;
        $this->nacimiento = $nacimiento;
        $this->nacionalidad = $nacionalidad;
        $this->ciudad = $ciudad;
        $this->domicilio = $domicilio;
        $this->experiencia = $experiencia;
        $this->estadocivil = $estadocivil;
        $this->estudios = $estudios;
        $this->certificaciones = $certificaciones;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->referencias = $referencias;
        $this->trabajoprevio = $trabajoprevio;
        $this->idiomas = $idiomas;
        $this->aptitudes = $aptitudes;
        $this->descripcion = $descripcion;
    }

    public function create(){
        $bd = new Conexion();
        
        $sql = "INSERT INTO curriculum (NOMBRE, APELLIDOS, NACIMIENTO, NACIONALIDAD, CIUDAD, DOMICILIO, EXPERIENCIA, ESTADOCIVIL, ESTUDIOS, CERTIFICACIONES, TELEFONO, CORREO, REFERENCIAS, TRABAJOPREVIO, IDIOMAS, APTITUDES, DESCRIPCION) 
                VALUES ('{$this->nombre}','{$this->apellidos}','{$this->nacimiento}','{$this->nacionalidad}','{$this->ciudad}','{$this->domicilio}','{$this->experiencia}','{$this->estadocivil}','{$this->estudios}','{$this->certificaciones}','{$this->telefono}','{$this->correo}','{$this->referencias}','{$this->trabajoprevio}','{$this->idiomas}','{$this->aptitudes}','{$this->descripcion}')";

        $consulta = "SHOW TABLES LIKE 'curriculum'";
        $dato = $bd->query($consulta);
        if($dato->num_rows < 1)
        {
            $creartabla = "CREATE TABLE curriculum (
                ID INT AUTO_INCREMENT PRIMARY KEY,
                NOMBRE VARCHAR(255),
                APELLIDOS VARCHAR(255),
                NACIMIENTO VARCHAR(255),
                NACIONALIDAD VARCHAR(255),
                CIUDAD VARCHAR(255),
                DOMICILIO VARCHAR(255),
                EXPERIENCIA VARCHAR(255),
                ESTADOCIVIL VARCHAR(255),
                ESTUDIOS VARCHAR(255),
                CERTIFICACIONES VARCHAR(255),
                TELEFONO VARCHAR(255),
                CORREO VARCHAR(255),
                REFERENCIAS VARCHAR(255),
                TRABAJOPREVIO VARCHAR(255),
                IDIOMAS VARCHAR(255),
                APTITUDES VARCHAR(255),
                DESCRIPCION VARCHAR(255))";
            
            $bd->query($creartabla);
        }
            $bd->query($sql);
    }
    public function read(){
        $bd = new Conexion();
        if(isset($this->id) && $this->id != ""){
            $sql = "SELECT * FROM curriculum ORDER BY NOMBRE ASC";
        }else{
            $sql = "SELECT * FROM curriculum WHERE ID = '{$this->id}'";
        }

        return $bd->query($sql);
    }

    public function update(){
        $bd = new Conexion();
        $sql = "UPDATE curriculum SET NOMBRE = '{$this->nombre}', APELLIDOS = '{$this->apellidos}', NACIMIENTO = '{$this->nacimiento}', NACIONALIDAD ='{$this->nacionalidad}', CIUDAD = '{$this->ciudad}', DOMICILIO = '{$this->domicilio}', EXPERIENCIA = '{$this->experiencia}', ESTADOCIVIL = '{$this->estadocivil}', ESTUDIOS = '{$this->estudios}', CERTIFICACIONES = '{$this->certificaciones}', TELEFONO = '{$this->certificaciones}' , CORREO = '$this->correo', REFERENCIAS = '{$this->referencias}', TRABAJOPREVIO = '{$this->trabajoprevio}', IDIOMAS = '{$this->idiomas}', APTITUDES = '{$this->aptitudes}', DESCRIPCION = '{$this->descripcion}' WHERE ID = '{$this->id}'";
        return $bd->query($sql);
    }

    public function delete($id){
        $bd = new Conexion();
        $sql = "DELETE FROM curriculum WHERE ID = {$id}";
        $bd->query($sql);
    }
}

?>