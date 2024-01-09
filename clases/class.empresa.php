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
    protected $email;
    protected $password;

    public function __construct($id, $nombre, $direccion, $telefono, $descripcion, $sector, $contactoNombre, $contactoCorreo, $sitioWeb, $email, $password)
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
        $this->email = $email;
        $this->password = md5($password);
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
                EMAIL VARCHAR(50),
                PASSWORD VARCHAR(255)
            )";
            $bd->query($crearTabla);
        }
        $sql = "INSERT INTO $nombreTabla 
        (NOMBRE, DIRECCION, TELEFONO, DESCRIPCION, SECTOR, CONTACTO_NOMBRE, CONTACTO_CORREO, SITIO_WEB, EMAIL, PASSWORD) 
        VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Utilizar una consulta preparada
        $stmt = $bd->prepare($sql);

        // Vincular parámetros
        $stmt->bind_param("ssssssssss", $this->nombre, $this->direccion, $this->telefono, $this->descripcion, $this->sector, $this->contactoNombre, $this->contactoCorreo, $this->sitioWeb, $this->email, $this->password);

        // Ejecutar la consulta
        $stmt->execute();
    }


    public function login()
    {

        $bd = new Conexion();
        $sql = "SELECT * FROM empresa WHERE (TELEFONO = ? OR SITIO_WEB = ? OR CONTACTO_CORREO = ? OR EMAIL = ?) AND PASSWORD = ?";

        // Utilizar una consulta preparada
        $stmt = $bd->prepare($sql);
        $stmt->bind_param("sssss", $this->sitioWeb, $this->contactoCorreo, $this->telefono,$this->email, $this->password);

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

    public function read(){
        $bd = new Conexion();
        if(isset($this->id) && $this->id != ''){
            $query = "SELECT * FROM empresa WHERE ID = '{$this->id}'";
        }else{
            $query = "SELECT * FROM empresa ORDER BY ID DESC";
        }
        $res = $bd->query($query);
        return $res;
    }
}
