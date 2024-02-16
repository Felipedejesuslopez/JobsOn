<?php
class cita
{
    protected $id;
    protected $idPostulacion;
    protected $fechaHora;
    protected $lugar;
    protected $estado;

    public function __construct($id, $idPostulacion, $fechaHora, $lugar, $estado = 'Pendiente')
    {
        $this->id = $id;
        $this->idPostulacion = $idPostulacion;
        $this->fechaHora = $fechaHora;
        $this->lugar = $lugar;
        $this->estado = $estado;
    }

    public function create()
    {
        $bd = new Conexion();
        $c = "SHOW TABLES LIKE 'citas'";
        $resultado = $bd->query($c);

        if ($resultado->num_rows < 1) {
            $creart = "CREATE TABLE citas (
                ID INT PRIMARY KEY AUTO_INCREMENT,
                ID_POSTULACION INT,
                FECHA_HORA DATETIME,
                LUGAR VARCHAR(255),
                ESTADO VARCHAR(50) NOT NULL DEFAULT 'Pendiente'
            );";
            $bd->query($creart);
        }

        $sql = "INSERT INTO citas (ID_POSTULACION, FECHA_HORA, LUGAR, ESTADO) VALUES ({$this->idPostulacion}, '{$this->fechaHora}', '{$this->lugar}', '{$this->estado}')";
        $bd->query($sql);
    }

    public function read()
    {
        $bd = new Conexion();
        $sql = "SELECT * FROM citas WHERE ID_POSTULACION = {$this->idPostulacion}";
        $res = $bd->query($sql);
        return $res;
    }

    public static function getCitasPendientes($reclutadorId)
    {
        $bd = new Conexion();
        $sql = "SELECT * FROM citas WHERE ID_POSTULACION IN (SELECT ID FROM postulaciones WHERE ID_RECLUTADOR = {$reclutadorId})";
        $res = $bd->query($sql);
        return $res;
    }

    public function eliminar()
    {
        $bd = new Conexion();
        $sql = "DELETE FROM citas WHERE ID = '{$this->id}'";
        return $bd->query($sql);
    }

    public function aceptarPostulacion()
    {
        $bd = new Conexion();
        $sql = "UPDATE postulaciones SET estado = 'Aceptado' WHERE ID = '{$this->idPostulacion}'";
        return $bd->query($sql);
    }

    public function rechazarPostulacion()
    {
        $bd = new Conexion();
        $sql = "UPDATE postulaciones SET estado = 'Rechazado' WHERE ID = '{$this->idPostulacion}'";
        return $bd->query($sql);
    }

    /*
    private function enviarCorreoCita()
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
            $mail->Subject = 'cita agendada';
            $mail->Body    = 'tu cita ha sido agendada por un reclutador.';
            $mail->message = 'Revisa JobsOn para ver la cita programada';
            $mail->send();
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    }

    */
}
