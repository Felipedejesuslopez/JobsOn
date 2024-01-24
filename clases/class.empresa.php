<?php

class Empresa
{

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

    public function __construct($id, $nombre, $direccion, $telefono, $descripcion, $sector, $contactoNombre, $contactoCorreo, $sitioWeb, $correo, $psw)
    {
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
        $this->psw = md5($psw);
    }

    public function create()
    {
        $bd = new Conexion();
        $nombreTabla = 'empresa';
        $query = "INSERT INTO ";
        $consultaExistencia = "SHOW TABLES LIKE '$nombreTabla'";
        $resultado = $bd->query($consultaExistencia);

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
                SITIO_WEB VARCHAR(255),
                CORREO VARCHAR(50),
                PSW VARCHAR(255)
            )";
            $bd->query($crearTabla);
        }
        $sql = "INSERT INTO $nombreTabla 
        (NOMBRE, DIRECCION, TELEFONO, DESCRIPCION, SECTOR, CONTACTO_NOMBRE, CONTACTO_CORREO, SITIO_WEB, CORREO, PSW) 
        VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Utilizar una consulta preparada
        $stmt = $bd->prepare($sql);

        // Vincular parámetros
        $stmt->bind_param("ssssssssss", $this->nombre, $this->direccion, $this->telefono, $this->descripcion, $this->sector, $this->contactoNombre, $this->contactoCorreo, $this->sitioWeb, $this->correo, $this->psw);

        // Ejecutar la consulta
        $stmt->execute();
    }


    public function login()
    {

        $bd = new Conexion();
        $sql = "SELECT * FROM empresa WHERE (NOMBRE = ? OR TELEFONO = ? OR SITIO_WEB = ? OR CONTACTO_CORREO = ? OR CORREO = ?) AND PSW = ?";

        // Utilizar una consulta preparada
        $stmt = $bd->prepare($sql);
        $stmt->bind_param("ssssss", $this->nombre, $this->sitioWeb, $this->correo, $this->telefono, $this->correo, $this->psw);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $result = $stmt->get_result();

        // Verificar si hay al menos una fila en el resultado
        if ($result->num_rows > 0) {
            // Iniciar sesión y almacenar los datos del usuario en la sesión
            session_start();
            $_SESSION = $result->fetch_assoc();
            return 1;
        } else {
            return 0;
        }
    }

    public function read()
    {
        $bd = new Conexion();
        if (isset($this->id) && $this->id != '') {
            $query = "SELECT * FROM empresa WHERE ID = '{$this->id}'";
        } else {
            $query = "SELECT * FROM empresa ORDER BY ID DESC";
        }
        $res = $bd->query($query);
        return $res;
    }

    public function checkemail()
    {
        $bd = new Conexion();
        $query = "SELECT * FROM empresa WHERE NOMBRE = '{$this->nombre}' OR CORREO = '{$this->correo}'";
        $res = $bd->query($query);
        if ($res->fetch_array()) {
            return 1;
        } else {
            return 0;
        }
    }
}
