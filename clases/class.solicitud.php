<?php
class solicitud
{
    protected $id_solicitud;
    protected $nombre;
    protected $apellido;
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

    public function __construct() 
    {
        $this->id_solicitud = $id_solicitud;
        $this->nombre = $nombre;
        $this->apellido = $apellido0;
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

    public function creartabla(){
        $bd = new Conexion();
        $consulta = "SHOW TABLES LIKE 'solicitud'";
        $dato = $bd->query($consulta);

        if($dato->num_rows ==  0)
        {
            $creartabla = "CREATE TABLE solicitud (
                ID_SOLICITUD INT AUTO_INCREMENT PRIMARY KEY,
                NOMBRE VARCHAR(255),
                APELLIDOS VARCHAR(255),
                NACIMIENTO DATE,
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
        }

        if($bd->query($creartabla))
        {
            echo '<script language="javascript">alert("Registro creado exitosamente");</script>';
        }
        else{
            echo '<script language="javascript">alert("Error al crear el registro");</script>';
        }
    }



}
?>