<?php
class solicitud
{
    protected $id;
    protected $nombre;
    protected $apellidos;
    protected $nacimiento;
    protected $nacionalidad;
    protected $ciudad;
    protected $estadocivil;
    protected $domicilio;
    protected $trabajoprevio;
    protected $trabajoactual;
    protected $estudios;
    protected $telefono;
    protected $correo;
    protected $idiomas;
    protected $puesto;
    protected $sueldo;

    public function __construct($id, $nombre, $apellidos, $nacimiento, $nacionalidad, $ciudad, $estadocivil, $domicilio, $trabajoprevio, $trabajoactual, $estudios, $telefono, $correo, $idiomas, $puesto, $sueldo) 
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->nacimiento = $nacimiento;
        $this->nacionalidad = $nacionalidad;
        $this->ciudad = $ciudad;
        $this->estadocivil = $estadocivil;
        $this->domicilio = $domicilio;
        $this->trabajoprevio = $trabajoprevio;
        $this->trabajoactual = $trabajoactual;
        $this->estudios = $estudios;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->idiomas = $idiomas;
        $this->puesto = $puesto;
        $this->sueldo = $sueldo;
    }

    public function create(){
        $bd = new Conexion();
        
        $sql = "INSERT INTO solicitud (
            NOMBRE, APELLIDOS, NACIMIENTO, NACIONALIDAD, CIUDAD, ESTADOCIVIL, DOMICILIO, TRABAJOPREVIO, TRABAJOACTUAL, ESTUDIOS, TELEFONO, CORREO, IDIOMAS, PUESTO, SUELDO) 
        VALUES ('{$this->nombre}','{$this->apellidos}','{$this->nacimiento}','{$this->nacionalidad}','{$this->ciudad}','{$this->domicilio}','{$this->trabajoprevio}','{$this->trabajoactual}','{$this->estudios}','{$this->telefono}','{$this->correo}','{$this->idiomas}','{$this->puesto}','{$this->sueldo}')";
        
        $consulta = "SHOW TABLES LIKE 'solicitud'";
        $dato = $bd->query($consulta);

        if($dato->num_rows < 1)
        {
            $creartabla = "CREATE TABLE solicitud (
                ID INT AUTO_INCREMENT PRIMARY KEY,
                NOMBRE VARCHAR(255),
                APELLIDOS VARCHAR(255),
                NACIMIENTO VARCHAR(255),
                NACIONALIDAD VARCHAR(255),
                CIUDAD VARCHAR(255),
                ESTADOCIVIL VARCHAR(255),
                DOMICILIO VARCHAR(255),
                TRABAJOPREVIO VARCHAR(255),
                TRABAJOACTUAL VARCHAR(255),
                ESTUDIOS VARCHAR(255),
                TELEFONO VARCHAR(255),
                CORREO VARCHAR(255),
                IDIOMAS VARCHAR(255),
                PUESTO VARCHAR(255),
                SUELDO VARCHAR(255))";
            
            $bd->query($creartabla);
        }
        $bd->query($sql);
    }

    public function read(){
        $bd = new Conexion();
        if(isset($this->id) && $this->id != ""){
            $sql = "SELECT * FROM solicitud WHERE ID = '{$this->id}'";
        }else{
            $sql = "SELECT * FROM solicitud ORDER BY ID DESC";
        }

        $ret = $bd->query($sql);
        return $ret;
    }

    public function update(){
        $bd = new Conexion();
        $sql = "UPDATE solicitud SET NOMBRE = '{$this->nombre}', APELLIDOS = '{$this->apellidos}', NACIMIENTO = '{$this->nacimiento}', NACIONALIDAD ='{$this->nacionalidad}', CIUDAD = '{$this->ciudad}', ESTADOCIVIL = '{$this->estadocivil}', DOMICILIO = '{$this->domicilio}', TRABAJOPREVIO = '{$this->trabajoprevio}', TRABAJOACTUAL = '{$this->trabajoactual}', ESTUDIOS = '{$this->estudios}', TELEFONO = '{$this->telefono}' , CORREO = '$this->correo', IDIOMAS = '{$this->idiomas}', PUESTO = '{$this->puesto}', SUELDO = '{$this->sueldo}' WHERE ID = '{$this->id}'";
        return $bd->query($sql);
    }

    public function delete($id){
        $bd = new Conexion();
        $sql = "DELETE FROM solicitud WHERE ID = {$id}";
        $bd->query($sql);
    }

}
?>