<?php
class usuariopostulante
{
    Protected $id_usuario;
    Protected $nombre;
    protected $apellidos;
    protected $nacimiento;
    protected $direccion;
    protected $nacionalidad;
    protected $ciudad;
    protected $telefono;
    protected $correo;
    protected $nss;
    protected $referencias;
    protected $foto;

    public function __construct($id_usuario, $nombre, $apellidos, $nacimiento, $direccion, $telefono, $correo, $nss, $referencias, $foto)
    {
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->nacimiento = $nacimiento;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->nss = $nss;
        $this->referencias = $referencias;
        $this->foto = $foto;
    }

    public function creartabla(){
        $bd = new Conexion();
        $consulta = "SHOW TABLES LIKE 'usuariopostulante'";
        $dato = $bd->query($consulta);

        if($dato->num_rows ==  0)
        {
            $creartabla = "CREATE TABLE usuariopostulante (
                ID_USUARIO INT AUTO_INCREMENT PRIMARY KEY,
                NOMBRE VARCHAR(255),
                APELLIDOS VARCHAR(255),
                NACIMIENTO DATE,
                DIRECCION VARCHAR(255),
                TELEFONO VARCHAR(255),
                CORREO VARCHAR(255),
                NSS VARCHAR(255),
                REFERENCIAS VARCHAR(255),
                FOTO VARCHAR(255))";
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