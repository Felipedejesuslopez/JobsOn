<?php
class comentario
{
    protected $id_comentario;
    protected $id_usuario;
    protected $id_publicacion;
    protected $comentario;
    protected $fecha;
    protected $hora;


    public function __construct() {
        $this->id_comentario = $id_comentario;
        $this->id_usuario = $id_usuario;
        $this->id_publicacion = $id_publicacion;
        $this->comentario = $comentario;
        $this->fecha = $fecha;
        $this->hora = $hora;
    }

    public function creartabla(){
        $bd = new Conexion();
        $consulta = "SHOW TABLES LIKE 'comentario'";
        $dato = $bd->query($consulta);

        if($dato->num_rows ==  0)
        {
            $creartabla = "CREATE TABLE comentario (
                ID_COMENTARIO INT AUTO_INCREMENT PRIMARY KEY,
                ID_USUARIO INT,
                ID_PUBLICACION INT,
                COMENTARIO VARCHAR(255),
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