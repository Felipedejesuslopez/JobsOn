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

    public function __construct($id_usuario,$usuario,$email,$password, $nombre, $apellidos, $nacimiento, $direccion, $telefono, $correo, $nss, $foto, $op1, $op2, $op3)
    {
        $this->id = $id_usuario;
        $this->user = $usuario;
        $this->email = $email;
        $this->password = $password;
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
        VALUES ('{$this->user}', '{$this->email}','{$this->password}','{$this->nombre}', '{$this->apellidos}',{$this->nacimiento}', '{$this->direccion}', '{$this->telefono}', '{$this->correo}', '{$this->nss}', '{$this->foto}')";

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
                NACIMIENTO DATE,
                DIRECCION VARCHAR(255),
                TELEFONO VARCHAR(255),
                CORREO VARCHAR(255),
                NSS VARCHAR(255),
                FOTO VARCHAR(255))";

                $bd->query($creartabla);
        }
        $bd -> query($sql);
    }

    public function read(){
        $bd = new Conexion();
        if(isset($this->id) && $this->id != ""){
            $sql = "SELECT * FROM usuarios WHERE ID = '{$this->id}'";
        }else{
            $sql = "SELECT * FROM usuarios ORDER BY ID DESC";
        }

        $ret = $bd->query($sql);
        return $ret;
    }

    public function update(){

    }

    public function delete(){

    }

    public function login(){
        $bd = new Conexion();
        $sql = "SELECT * FROM usuarios WHERE USUARIO = '{$this->user}' OR EMAIL = '{$this->email}' AND PASSWORD = '{$this->password}'";
        $ret = $bd->query($sql);
        if( $ret->num_rows > 0) {
            session_start();
            $_SESSION[] = $ret->fetch_array();
            return true;
        }else{
            return false;
        }
    }
}
