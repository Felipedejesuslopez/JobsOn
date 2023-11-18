<?php
include 'class.conexion.php';

class Entrevista {

    protected $id_empresa;
    protected $id_oferta;
    protected $id;
    protected $id_reclutador;
    protected $id_usuario;
    protected $fecha;
    protected $hora;
    protected $ubicacion;
    protected $estado_resultado;

    public function __construct($id_empresa, $id_oferta, $id, $id_reclutador, $id_usuario, $fecha, $hora, $ubicacion, $estado_resultado) {
        $this->id_empresa = $id_empresa;
        $this->id_oferta = $id_oferta;
        $this->id = $id;
        $this->id_reclutador = $id_reclutador;
        $this->id_usuario = $id_usuario;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->ubicacion = $ubicacion;
        $this->estado_resultado = $estado_resultado;
    }

    public static function crearTablaSiNoExiste($conexion) {
        $nombreTabla = 'entrevistas';

        $consultaExistencia = "SHOW TABLES LIKE '$nombreTabla'";
        $resultado = $conexion->query($consultaExistencia);

        if ($resultado->num_rows == 0) {
            $crearTabla = "CREATE TABLE $nombreTabla (
                id_empresa INT,
                id_oferta INT,
                id INT AUTO_INCREMENT PRIMARY KEY,
                id_reclutador INT,
                id_usuario INT,
                fecha DATE,
                hora TIME,
                ubicacion VARCHAR(100),
                estado_resultado VARCHAR(255)
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
}
?>