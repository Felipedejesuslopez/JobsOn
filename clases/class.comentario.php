<?php
class comentario
{
    protected $id;
    protected $id_usuario;
    protected $id_publicacion;
    protected $comentario;
    protected $fecha;
    protected $hora;


    public function __construct($id, $id_usuario, $id_publicacion, $comentario, $fecha, $hora) {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->id_publicacion = $id_publicacion;
        $this->comentario = $comentario;
        $this->fecha = $fecha;
        $this->hora = $hora;
    }

    public function creartabla()
    {
        $bd = new Conexion();

        $sql = "INSERT INTO comentario (
            ID_USUARIO, ID_PUBLICACION, COMENTARIO, FECHA, HORA) 
        VALUES ('{$this->id_usuario}','{$this->id_publicacion}','{$this->comentario}','{$this->fecha}','{$this->hora}')";
        
        $consulta = "SHOW TABLES LIKE 'comentario'";
        $dato = $bd->query($consulta);

        if($dato->num_rows < 1)
        {
            $creartabla = "CREATE TABLE comentario (
                ID INT AUTO_INCREMENT PRIMARY KEY,
                ID_USUARIO INT,
                ID_PUBLICACION INT,
                COMENTARIO VARCHAR(255),
                FECHA varchar(255),
                HORA TIME)";
        
            $bd->query($creartabla);
        }
            $bd->query($sql);
    }
    
    public function read(){
        $bd = new Conexion();
        if(isset($this->id) && $this->id != ""){
            $sql = "SELECT * FROM comentario WHERE ID = '{$this->id}'";
        }else{
            $sql = "SELECT * FROM comentario ORDER BY ID DESC";
        }

        $ret = $bd->query($sql);
        return $ret;
    }

    public function update(){
        $bd = new Conexion();
        $sql = "UPDATE comentario SET ID_USUARIO = '{$this->id_usuario}', ID_PUBLICACION = '{$this->id_publicacion}', COMENTARIO = '{$this->comentario}', FECHA ='{$this->fecha}', HORA = '{$this->hora}' WHERE ID = '{$this->id}'";
        return $bd->query($sql);
    }

    public function delete($id){
        $bd = new Conexion();
        $sql = "DELETE FROM comentario WHERE ID = {$id}";
        $bd->query($sql);
    }
}
?>