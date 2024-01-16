<?php
class usuariopostulante
{
    protected $id;
    protected $user;
    protected $email;
    protected $password;
    protected $nombre;
    protected $apellidos;
    protected $nacimiento;
    protected $direccion;
    protected $nacionalidad;
    protected $ciudad;
    protected $telefono;
    protected $correo;
    protected $nss;
    protected $foto;
    protected $op1;
    protected $op2;
    protected $op3;

    public function __construct($id_usuario, $usuario, $email, $password, $nombre, $apellidos, $nacimiento, $direccion, $telefono, $correo, $nss, $foto, $op1, $op2, $op3)
    {
        $this->id = $id_usuario;
        $this->user = $usuario;
        $this->email = $email;
        $this->password = md5($password);
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->nacimiento = $nacimiento;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->nss = $nss;
        $this->foto = $foto;
        $this->op1 = $op1;
        $this->op2 = $op2;
        $this->op3 = $op3;
    }

    public function create()
    {
        $bd = new Conexion();

        $sql = "INSERT INTO usuarios 
        (USUARIO, EMAIL, PASSWORD, NOMBRE, APELLIDOS, NACIMIENTO, DIRECCION, TELEFONO, CORREO, NSS, FOTO) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


        $consulta = "SHOW TABLES LIKE 'usuarios'";
        $dato = $bd->query($consulta);

        if ($dato->num_rows < 1) {
            $creartabla = "CREATE TABLE usuarios (
                ID INT AUTO_INCREMENT PRIMARY KEY,
                USUARIO VARCHAR(255),
                EMAIL VARCHAR (255),
                PASSWORD VARCHAR(255),
                NOMBRE VARCHAR(255),
                APELLIDOS VARCHAR(255),
                NACIMIENTO VARCHAR(255),
                DIRECCION VARCHAR(255),
                TELEFONO VARCHAR(255),
                CORREO VARCHAR(255),
                NSS VARCHAR(255),
                FOTO VARCHAR(255))";

            $bd->query($creartabla);
        }
        
        $stmt = $bd->prepare($sql);
        $stmt->bind_param("sssssssssss", $this->user, $this->email, $this->password, $this->nombre, $this->apellidos, $this->nacimiento, $this->direccion, $this->telefono, $this->correo, $this->nss, $this->foto);

        $stmt->execute();
    }

    public function read()
    {
        $bd = new Conexion();
        if (isset($this->id) && $this->id != "") {
            $sql = "SELECT * FROM usuarios WHERE ID = '{$this->id}'";
        } else {
            $sql = "SELECT * FROM usuarios ORDER BY ID DESC";
        }

        $ret = $bd->query($sql);
        return $ret;
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    public function login()
    {
        $bd = new Conexion();
        $sql = "SELECT * FROM usuarios WHERE (USUARIO = ? OR EMAIL = ? OR TELEFONO = ?) AND PASSWORD = ?";
        
        // Utilizar una consulta preparada
        $stmt = $bd->prepare($sql);
    
        // Verificar si la preparación fue exitosa
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $bd->error);
        }
    
        // Vincular los parámetros
        $stmt->bind_param("ssss", $this->user, $this->email, $this->telefono, $this->password);
    
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

    public function checkuser(){
        $bd = new Conexion();
        $query = "SELECT * FROM usuarios WHERE USUARIO = '{$this->user}' OR EMAIL = '{$this->email}'";
        $res = $bd->query($query);
        if($res->fetch_array()){
            return 1;
        }else{
            return 0;
        }
    }

    public function ultimo(){
        $bd = new Conexion();
        $query = "SELECT * FROM usuarios ORDER BY ID DESC LIMIT 1";
        $r = $bd->query($query)->fetch_array();
        $res = intval($r['ID']);
        return $res;
    }
    
}
