<?php
class vacantes
{
    protected $id;
    protected $titulo;
    protected $planta;
    protected $departamento;
    protected $contactos;
    protected $problemas;
    protected $estudios;
    protected $especialidad;
    protected $experiencia;
    protected $alcances;
    protected $idiomas;
    protected $conocimientos;

    public function __construct($id, $titulo, $planta, $departamento, $contactos, $problemas, $estudios, $especialidad, $experiencia, $alcances, $idiomas, $conocimientos)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->planta = $planta;
        $this->departamento = $departamento;
        $this->contactos = $contactos;
        $this->problemas = $problemas;
        $this->estudios = $estudios;
        $this->especialidad = $especialidad;
        $this->experiencia = $experiencia;
        $this->alcances = $alcances;
        $this->idiomas = $idiomas;
        $this->conocimientos = $conocimientos;
    }

    public function create()
    {
        $bd = new Conexion();
        $cev = "SHOW TABLES LIKE 'vacantes'";
        $rev = $bd->query($cev);

        if ($rev->num_rows < 1) {
            $ct = "CREATE TABLE vacantes (
                 
                    ID INT PRIMARY KEY,
                    TITULO VARCHAR(255) DEFAULT NULL,
                    PLANTA VARCHAR(255) DEFAULT NULL,
                    DEPARTAMENTO VARCHAR(255) DEFAULT NULL,
                    CONTACTOS VARCHAR(255) DEFAULT NULL,
                    PROBLEMAS VARCHAR(1255) DEFAULT NULL,
                    ESTUDIOS VARCHAR(255) DEFAULT NULL,
                    ESPECIALIDAD VARCHAR(255) DEFAULT NULL,
                    EXPERIENCIA VARCHAR(1255) DEFAULT NULL,
                    ALCANCES TEXT DEFAULT NULL,
                    IDIOMAS VARCHAR(1255) DEFAULT NULL,
                    CONOCIMIENTOS VARCHAR(1255) DEFAULT NULL
                
            );";
            $bd->query($ct);
        }
        $sql = "INSERT INTO vacantes (ID, TITULO, PLANTA, DEPARTAMENTO, CONTACTOS, PROBLEMAS, ESTUDIOS, ESPECIALIDAD, EXPERIENCIA, ALCANCES, IDIOMAS, CONOCIMIENTOS) VALUES (
            '{$this->id}',
            '{$this->titulo}',
            '{$this->planta}',
            '{$this->departamento}',
            '{$this->contactos}',
            '{$this->problemas}',
            '{$this->estudios}',
            '{$this->especialidad}',
            '{$this->experiencia}',
            '{$this->alcances}',
            '{$this->idiomas}',
            '{$this->conocimientos}'
        )";

        $bd->query($sql);
    }
}
