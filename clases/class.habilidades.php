<?php
class habilidades
{
    protected $id;
    protected $id_usuario;
    protected $id_curriculum;
    protected $habilidades;
    protected $categoria;
    protected $experiencia;
    protected $aptitudes;
    protected $certificaciones;
    
    public function __construct($id, $id_usuario, $id_curriculum, $habilidades, $categoria, $experiencia, $aptitudes, $certificaciones) {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->id_curriculum = $id_curriculum;
        $this->habilidades = $habilidades;
        $this->categoria = $categoria;
        $this->experiencia = $experiencia;
        $this->aptitudes = $aptitudes;
        $this->certificaciones = $certificaciones;
    }
    
    public function creartabla(){
        $bd = new Conexion();

        $sql = "INSERT INTO solicitud (
            ID_EMISOR, ID_RECEPTOR, NOMBRE_USUARIO, CORREO_USUARIO, CONTENIDO_MENSAJE, NOMBRE_RECEPTOR, CORREO_RECEPTOR, FECHA, HORA) 
        VALUES ('{$this->id_usuario}','{$this->id_curriculum}','{$this->habilidades}','{$this->categoria}','{$this->experiencia}','{$this->aptitudes}','{$this->certificaciones}')";

        $consulta = "SHOW TABLES LIKE 'habilidades'";
        $dato = $bd->query($consulta);

        if($dato->num_rows < 1)
        {
            $creartabla = "CREATE TABLE habilidades (
                ID INT AUTO_INCREMENT PRIMARY KEY,
                ID_USUARIO INT,
                ID_CURRICULUM INT,
                HABILIDADES VARCHAR(255),
                CATEGORIA VARCHAR(255),
                EXPERIENCIA VARCHAR(255),
                APTITUTES VARCHAR(255)
                CERTIFICACIONES VARCHAR(255))";
            
            $bd->query($creartabla);
        }
        $bd->query($sql);
    }
    public function read(){
        $bd = new Conexion();
        if(isset($this->id) && $this->id != ""){
            $sql = "SELECT * FROM habilidades WHERE ID = '{$this->id}'";
        }else{
            $sql = "SELECT * FROM habilidades ORDER BY ID DESC";
        }

        $ret = $bd->query($sql);
        return $ret;
    }

    public function update(){
        $bd = new Conexion();
        $sql = "UPDATE habilidades SET ID_USUARIO = '{$this->id_usuario}', ID_CURRICULUM = '{$this->id_curriculum}', HABILIDADES = '{$this->habilidades}', CATEGORIA ='{$this->categoria}', EXPRERIENCIA = '{$this->experiencia}', APTITUDES = '{$this->aptitudes}', CERTIFICACIONES = '{$this->certificaciones}'WHERE ID = '{$this->id}'";
        return $bd->query($sql);
    }

    public function delete($id){
        $bd = new Conexion();
        $sql = "DELETE FROM habilidades WHERE ID = {$id}";
        $bd->query($sql);
    }
}
?>