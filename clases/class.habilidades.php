<?php
class habilidades
{
    protected $id_habilidades;
    protected $id_usuario;
    protected $id_curriculum;
    protected $habilidades;
    protected $categoria;
    protected $experiencia;
    protected $aptitudes;
    protected $certificaciones;
    
    public function __construct() {
        $this->id_habilidades = $id_habilidades;
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
        $consulta = "SHOW TABLES LIKE 'habilidades'";
        $dato = $bd->query($consulta);

        if($dato->num_rows ==  0)
        {
            $creartabla = "CREATE TABLE habilidades (
                ID_HABILIDADES INT AUTO_INCREMENT PRIMARY KEY,
                ID_USUARIO INT,
                ID_CURRICULUM INT,
                HABILIDADES VARCHAR(255),
                CATEGORIA VARCHAR(255),
                EXPERIENCIA VARCHAR(255),
                APTITUTES VARCHAR(255)
                CERTIFICACIONES VARCHAR(255))"
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