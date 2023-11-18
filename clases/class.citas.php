<?php
include 'class.conexion.php';

class Cita {

    protected $id_empresa;
    protected $id_reclutador;
    protected $id_oferta;
    protected $id;
    protected $titulo;
    protected $descripcion;
    protected $ubicacion;
    protected $fechaCita;
    protected $horaCita;
    protected $participantes;

    public function __construct($id_empresa, $id_reclutador, $id_oferta, $id, $titulo, $descripcion, $ubicacion, $fechaCita, $horaCita, $participantes) {
        $this->id_empresa = $id_empresa;
        $this->id_reclutador = $id_reclutador;
        $this->id_oferta = $id_oferta;
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->ubicacion = $ubicacion;
        $this->fechaCita = $fechaCita;
        $this->horaCita = $horaCita;
        $this->participantes = $participantes;
    }

    public static function crearTablaSiNoExiste($conexion) {
        $nombreTabla = 'citas';

        $consultaExistencia = "SHOW TABLES LIKE '$nombreTabla'";
        $resultado = $conexion->query($consultaExistencia);

        if ($resultado->num_rows == 0) {
            $crearTabla = "CREATE TABLE $nombreTabla (
                id INT AUTO_INCREMENT PRIMARY KEY,
                id_empresa INT,
                id_reclutador INT,
                id_oferta INT,
                titulo VARCHAR(255) NOT NULL,
                descripcion TEXT,
                ubicacion VARCHAR(100),
                fecha_cita DATE,
                hora_cita TIME,
                participantes TEXT
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
