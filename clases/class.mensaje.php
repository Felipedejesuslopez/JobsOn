<?php
class mensaje
{
    protected $id_mensaje;
    protected $id_emisor;
    protected $id_receptor
    protected $nombre_usuario;
    protected $correo_usuario;
    protected $contenido_mensaje;
    protected $nombre_receptor;
    protected $correo_receptor;
    protected $fecha;
    protected $hora;

    public function __construct() 
    {
        $this->id_mensaje = $id_mensaje;
        $this->id_emisor = $id_emisor;
        $this->id_receptor = $id_receptor;
        $this->nombre_usuario = $nombre_emisor;
        $this->correo_usuario = $correo_emisor;
        $this->contenido_mensaje = $contenido_mensaje;
        $this->nombre_receptor = $nombre_receptor;
        $this->correo_receptor = $correo_receptor;
        $this->fecha = $fecha;
        $this->hora = $hora;
    }

    public function creartabla(){
        $bd = new Conexion();
        $consulta = "SHOW TABLES LIKE 'mensaje'";
        $dato = $bd->query($consulta);

        if($dato->num_rows ==  0)
        {
            $creartabla = "CREATE TABLE mensaje (
                ID_MENSAJE INT AUTO_INCREMENT PRIMARY KEY,
                ID_EMISOR INT,
                ID_RECEPTOR INT,
                NOMBRE_USUARIO VARCHAR(255),
                CORREO_USUARIO VARCHAR(255),
                CONTENIDO_MENSAJE VARCHAR(255),
                NOMBRE_RECEPTOR VARCHAR(255),
                CORREO_RECEPTOR VARCHAR(255)
                FECHA DATE,
                HORA TIME)"
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