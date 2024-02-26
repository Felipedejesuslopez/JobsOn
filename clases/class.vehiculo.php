<?php
class Vehiculo
{
    protected $id_conductor;
    protected $marca;
    protected $modelo;
    protected $foto;
    protected $placa_delantera;
    protected $placa_trasera;

    public function __construct($id_conductor, $marca, $modelo, $foto, $placa_delantera, $placa_trasera)
    {
        $this->id_conductor = $id_conductor;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->foto = $foto;
        $this->placa_delantera = $placa_delantera;
        $this->placa_trasera = $placa_trasera;
    }

    public function create()
    {
        $bd = new Conexion();
        $ct = "SHOW TABLES LIKE 'vehiculos'";
        $h = $bd->query($ct);
        if ($h->num_rows > 0) {
            $sql = "INSERT INTO vehiculos (ID_CONDUCTOR, MARCA, MODELO, FOTO, PLACA_DELANTERA, PLACA_TRASERA) 
            VALUES ('{$this->id_conductor}', '{$this->marca}', '{$this->modelo}', '{$this->foto}', '{$this->placa_delantera}', '{$this->placa_trasera}')";
        } else {
            // La tabla 'vehiculos' no existe, crea la tabla y luego realiza la inserción
            $sqlCreateTable = "CREATE TABLE vehiculos (
                        ID INT AUTO_INCREMENT PRIMARY KEY,
                        ID_CONDUCTOR INT,
                        MARCA VARCHAR(255),
                        MODELO VARCHAR(255),
                        FOTO VARCHAR(255),
                        PLACA_DELANTERA VARCHAR(255),
                        PLACA_TRASERA VARCHAR(255)
                      )";

            $bd->query($sqlCreateTable);
        }
        $bd->query($sql);
        return $bd->insert_id; // Retorna el ID del vehículo insertado
    }
}
?>
