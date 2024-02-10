<?php
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../recuperacion/PHPMailer/src/PHPMailer';
require '../recuperacion/PHPMailer/src/Exception';
require '../recuperacion/PHPMailer/src/SMTP.php';
*/
class postulacion
{
    protected $id;
    protected $vacante;
    protected $usuario;
    protected $fecha;
    protected $estatus;
    protected $fin;
    protected $tomada;
    protected $idReclutador;

    public function __construct($id, $vacante = '', $usuario = '', $fecha = '', $estatus = '', $fin = '', $tomada = false, $idReclutador = null)
    {
        $this->id = $id;
        $this->vacante = $vacante;
        $this->usuario = $usuario;
        $this->fecha = $fecha;
        $this->estatus = $estatus;
        $this->fin = $fin;
        $this->tomada = $tomada;
        $this->idReclutador = $idReclutador;
    }
    

    public function create()
    {
        $bd = new Conexion();
        $c = "SHOW TABLES LIKE 'postulaciones'";
        $resultado = $bd->query($c);
    
        if ($resultado->num_rows < 1) {
            $creart = "CREATE TABLE postulaciones (
                ID INT PRIMARY KEY AUTO_INCREMENT,
                VACANTE VARCHAR(255) DEFAULT NULL,
                USUARIO VARCHAR(255) DEFAULT NULL,
                FECHA DATE DEFAULT NULL,
                ESTATUS VARCHAR(255) DEFAULT NULL,
                FIN DATE DEFAULT NULL,
                TOMADA BOOLEAN DEFAULT FALSE,
                ID_RECLUTADOR INT DEFAULT NULL
            );";
            $bd->query($creart);
        }
    
        $sql = "INSERT INTO postulaciones (VACANTE, USUARIO, FECHA, ESTATUS) VALUES (?, ?, ?, ?)";
        $stmt = $bd->prepare($sql);
        $stmt->bind_param("ssss", $this->vacante, $this->usuario, $this->fecha, $this->estatus);
        $stmt->execute();
        $stmt->close();
    }
    
    /*
    private function enviarCorreoUsuario()
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = '19040107@alumno.utc.edu.mx';
            $mail->Password   = 'Alertarcp724';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->setFrom('19040107@alumno.utc.edu.mx', 'JobsOn');
            $mail->addAddress($this->usuario, 'Nombre del Usuario');
            $mail->isHTML(true);
            $mail->Subject = 'Postulación Tomada';
            $mail->Body    = 'Tu postulación ha sido tomada por un reclutador.';
            $mail->message = 'se te notificara cuando el reclutador agende la cita para tu entrevista';
            $mail->send();
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    }

    */
    public function readNoTomadas()
    {
        $bd = new Conexion();
        $sql = "SELECT * FROM postulaciones WHERE TOMADA = FALSE";
        $res = $bd->query($sql);
        return $res;
    }

    public function readTomadasByReclutador($reclutador)
    {
        $bd = new Conexion();
        // Se pasa el objeto reclutador
        $sql = "SELECT * FROM postulaciones WHERE TOMADA = TRUE AND ID_RECLUTADOR = {$reclutador->getId()}";
        $res = $bd->query($sql);
        return $res;
    }
    

    public function updateTomadaByReclutador()
    {
        $bd = new Conexion();
        $sql = "UPDATE postulaciones SET TOMADA = TRUE, ID_RECLUTADOR = {$this->idReclutador} WHERE ID = {$this->id}";
        $bd->query($sql);
    }

    public function getTomada()
    {
        return $this->tomada;
    }

    public function setTomada($tomada)
    {
        $this->tomada = $tomada;
    }

    public function getIdReclutador()
    {
        return $this->idReclutador;
    }

    public function setIdReclutador($idReclutador)
    {
        $this->idReclutador = $idReclutador;
    }

    public function read()
    {
        $bd = new Conexion();
        
        if(isset($this->usuario) && $this->usuario != ''){
            $sql = "SELECT * FROM postulaciones WHERE USUARIO = '{$this->usuario}'";
            $res = $bd->query($sql);
            return $res;
        }
        
        return null;
    }
}
