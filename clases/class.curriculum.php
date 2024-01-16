<?php
class curriculum
{
    protected $id;
    protected $id_usuario;
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

    public function __construct($id, $id_usuario, $experiencia, $estadocivil, $estudios, $certificaciones, $telefono, $correo, $referencias, $trabajoprevio, $idiomas, $aptitudes, $descripcion)
    {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
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


    public function create()
    {
        $bd = new Conexion();

        $sql = "INSERT INTO curriculum (ID_USUARIO, EXPERIENCIA, ESTADOCIVIL, ESTUDIOS, CERTIFICACIONES, TELEFONO, CORREO, REFERENCIAS, TRABAJOPREVIO, IDIOMAS, APTITUDES, DESCRIPCION) 
        VALUES ('{$this->id_usuario}','{$this->experiencia}','{$this->estadocivil}','{$this->estudios}','{$this->certificaciones}','{$this->telefono}','{$this->correo}','{$this->referencias}','{$this->trabajoprevio}','{$this->idiomas}','{$this->aptitudes}','{$this->descripcion}');
        ";

        $consulta = "SHOW TABLES LIKE 'curriculum'";
        $dato = $bd->query($consulta);
        if ($dato->num_rows < 1) {
            $creartabla = "CREATE TABLE curriculum (
                ID INT AUTO_INCREMENT PRIMARY KEY,
                ID_USUARIO VARCHAR(255),
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
                DESCRIPCION VARCHAR(255))";

            $bd->query($creartabla);
        }
        $bd->query($sql);
    }
    public function read()
    {
        $bd = new Conexion();
        $consulta = "SHOW TABLES LIKE 'curriculum'";
        $dato = $bd->query($consulta);
        if ($dato->num_rows < 1) {
            $creartabla = "CREATE TABLE curriculum (
                ID INT AUTO_INCREMENT PRIMARY KEY,
                ID_USUARIO VARCHAR(1255),
                EXPERIENCIA VARCHAR(1255),
                ESTADOCIVIL VARCHAR(1255),
                ESTUDIOS VARCHAR(1255),
                CERTIFICACIONES VARCHAR(1255),
                TELEFONO VARCHAR(1255),
                CORREO VARCHAR(1255),
                REFERENCIAS VARCHAR(1255),
                TRABAJOPREVIO VARCHAR(1255),
                IDIOMAS VARCHAR(1255),
                APTITUDES VARCHAR(1255),
                DESCRIPCION VARCHAR(1255))";

            $bd->query($creartabla);
        }

        if (isset($this->id) && $this->id != "") {
            $sql = "SELECT * FROM curriculum WHERE ID = '{$this->id}'";
        } else if (isset($this->id_usuario) && $this->id_usuario != "") {
            $sql = "SELECT * FROM curriculum WHERE ID_USUARIO = '{$this->id_usuario}'";
        } else {
            $sql = "SELECT * FROM curriculum ORDER BY NOMBRE ASC";
        }

        return $bd->query($sql);
    }

    public function update()
    {
        $bd = new Conexion();
        $sql = "UPDATE curriculum 
        SET 
            ID_USUARIO = '{$this->id_usuario}',
            EXPERIENCIA = '{$this->experiencia}',
            ESTADOCIVIL = '{$this->estadocivil}',
            ESTUDIOS = '{$this->estudios}',
            CERTIFICACIONES = '{$this->certificaciones}',
            TELEFONO = '{$this->telefono}',
            CORREO = '{$this->correo}',
            REFERENCIAS = '{$this->referencias}',
            TRABAJOPREVIO = '{$this->trabajoprevio}',
            IDIOMAS = '{$this->idiomas}',
            APTITUDES = '{$this->aptitudes}',
            DESCRIPCION = '{$this->descripcion}' 
        WHERE ID = '{$this->id}';
        ";
        return $bd->query($sql);
    }

    public function delete($id)
    {
        $bd = new Conexion();
        $sql = "DELETE FROM curriculum WHERE ID = {$id}";
        $bd->query($sql);
    }
}
