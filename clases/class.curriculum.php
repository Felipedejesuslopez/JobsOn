<?php
class curriculum
{
    protected $id_curriculum;
    protected $nombre;
    protected $apellido;
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

    public function __construct($id_curriculum, $nombre, $apellido, $nacimiento, $nacionalidad, $ciudad, $domicilio, $experiencia, $estadocivil, $estudios, $certificaciones, $telefono, $correo, $referencias, $trabajoprevio, $idiomas, $aptitudes, $descripcion)
    {
        $this->id_curriculum = $id_curriculum;
        $this->nombre =  $nombre;
        $this->apellido = $apellido;
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

    public function creartabla(){
        $bd = new Conexion();
        $consulta = "SHOW TABLES LIKE 'curriculum'";
        $dato = $bd->query($consulta);

        if($dato->num_rows ==  0)
        {
            $creartabla = "CREATE TABLE curriculum (
                ID_CURRICULUM INT AUTO_INCREMENT PRIMARY KEY,
                NOMBRE VARCHAR(255),
                APELLIDOS VARCHAR(255),
                NACIMIENTO DATE,
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
                DESCRIPCION VARCHAR(255))"
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