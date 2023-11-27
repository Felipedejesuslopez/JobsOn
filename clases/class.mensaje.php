<?php
class mensaje
{
    protected $id;
    protected $id_emisor;
    protected $id_receptor;
    protected $nombre_usuario;
    protected $correo_usuario;
    protected $contenido_mensaje;
    protected $nombre_receptor;
    protected $correo_receptor;
    protected $fecha;
    protected $hora;

    public function __construct($id, $id_emisor, $id_receptor, $nombre_usuario, $correo_emisor, $contenido_mensaje, $nombre_receptor, $correo_receptor, $fecha, $hora) 
    {
        $this->id = $id;
        $this->id_emisor = $id_emisor;
        $this->id_receptor = $id_receptor;
        $this->nombre_usuario = $nombre_usuario;
        $this->correo_usuario = $correo_emisor;
        $this->contenido_mensaje = $contenido_mensaje;
        $this->nombre_receptor = $nombre_receptor;
        $this->correo_receptor = $correo_receptor;
        $this->fecha = $fecha;
        $this->hora = $hora;
    }

    public function creartabla(){
        $bd = new Conexion();
        
        $sql = "INSERT INTO solicitud (
            ID_EMISOR, ID_RECEPTOR, NOMBRE_USUARIO, CORREO_USUARIO, CONTENIDO_MENSAJE, NOMBRE_RECEPTOR, CORREO_RECEPTOR, FECHA, HORA) 
        VALUES ('{$this->id_emisor}','{$this->id_receptor}','{$this->nombre_usuario}','{$this->contenido_mensaje}','{$this->nombre_receptor}','{$this->correo_receptor}','{$this->fecha}','{$this->hora}')";
        
        $consulta = "SHOW TABLES LIKE 'mensaje'";
        $dato = $bd->query($consulta);
        
        if($dato->num_rows < 1)
        {
            $creartabla = "CREATE TABLE mensaje (
                ID INT AUTO_INCREMENT PRIMARY KEY,
                ID_EMISOR INT,
                ID_RECEPTOR INT,
                NOMBRE_USUARIO VARCHAR(255),
                CORREO_USUARIO VARCHAR(255),
                CONTENIDO_MENSAJE VARCHAR(255),
                NOMBRE_RECEPTOR VARCHAR(255),
                CORREO_RECEPTOR VARCHAR(255)
                FECHA VARCHAR(255),
                HORA TIME)";
                
            $bd->query($creartabla);
        }
        $bd->query($sql);
    }



    public function read(){
        $bd = new Conexion();
        if(isset($this->id) && $this->id != ""){
            $sql = "SELECT * FROM mensaje WHERE ID = '{$this->id}'";
        }else{
            $sql = "SELECT * FROM mensaje ORDER BY ID DESC";
        }

        $ret = $bd->query($sql);
        return $ret;
    }

    public function update(){
        $bd = new Conexion();
        $sql = "UPDATE mensaje SET ID_EMISOR = '{$this->id_emisor}', ID_RECEPTOR = '{$this->id_receptor}', NOMBRE_USUARIO = '{$this->nombre_usuario}', CORREO_USUARIO ='{$this->correo_usuario}', CONTENIDO_MENSAJE = '{$this->contenido_mensaje}', NOMBRE_RECEPTOR = '{$this->nombre_receptor}', CORREO_RECEPTOR = '{$this->correo_receptor}', FECHA = '{$this->fecha}', HORA = '{$this->hora}' WHERE ID = '{$this->id}'";
        return $bd->query($sql);
    }

    public function delete($id){
        $bd = new Conexion();
        $sql = "DELETE FROM mensaje WHERE ID = {$id}";
        $bd->query($sql);
    }

}
?>