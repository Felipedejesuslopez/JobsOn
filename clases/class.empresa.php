<?php

class Empresa {

    protected $id;
    protected $nombre;
    protected $direccion;
    protected $telefono;
    protected $descripcion;
    protected $sector;
    protected $contactoNombre;
    protected $contactoCorreo;
    protected $sitioWeb;
    protected $correo;
    protected $psw;

    public function __construct($id, $nombre, $direccion, $telefono, $descripcion, $sector, $contactoNombre, $contactoCorreo, $sitioWeb, $correo, $psw) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->descripcion = $descripcion;
        $this->sector = $sector;
        $this->contactoNombre = $contactoNombre;
        $this->contactoCorreo = $contactoCorreo;
        $this->sitioWeb = $sitioWeb;
        $this->correo = $correo;
        $this->psw = $psw;

    }

    public static function crearTablaSiNoExiste($conexion) {
        $nombreTabla = 'empresa';

        $consultaExistencia = "SHOW TABLES LIKE '$nombreTabla'";
        $resultado = $conexion->query($consultaExistencia);

        if ($resultado->num_rows == 0) {
            $crearTabla = "CREATE TABLE $nombreTabla (
                ID INT AUTO_INCREMENT PRIMARY KEY,
                NOMBRE VARCHAR(255) NOT NULL,
                DIRECCION VARCHAR(255),
                TELEFONO VARCHAR(20),
                DESCRIPCION TEXT,
                SECTOR VARCHAR(100),
                CONTACTO_NOMBRE VARCHAR(255),
                CONTACTO_CORREO VARCHAR(255),
                SITIO_WEB VARCHAR(255)
                CORREO VARCHAR(50),
                PSW VARCHAR(20)
            )";

            if ($conexion->query($crearTabla)) {
                echo "Tabla creada con éxito.<br>";
            } else {
                echo "Error al crear la tabla: " . $conexion->error . "<br>";
            }
        } else {
            echo "La tabla ya existe.<br>";
        }
    }

   
    public function login() {
        $bd = new Conexion();

        $sql = "SELECT * FROM empresa WHERE NOMBRE = '{$this->nombre}'";

        $result = $bd->query($sql);

        if ($result->num_rows > 0) {
            $empresa = $result->fetch_assoc();
        
            if ($this->direccion == $empresa['DIRECCION'] || $this->telefono == $empresa['TELEFONO']) {
                return $empresa; 
            }
        }

        return null; 
    }

}


?>
