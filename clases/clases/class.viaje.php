<?php
class viaje{
    protected $id;
    protected $usuario;
    protected $conductor;
    protected $fecha;
    protected $hora;
    protected $tarifa;
    protected $distancia;
    protected $inicio;
    protected $destino;
    protected $estatus;
    protected $o1;
    protected $o2;
    protected $o3;

    public function __construct($id, $usuario, $conductor, $fecha, $hora, $tarifa, $distancia, $inicio, $destino, $estatus, $o1, $o2, $o3){
        $this->id = $id;
        $this->usuario = $usuario;
        $this->conductor = $conductor;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->tarifa = $tarifa;
        $this->distancia = $distancia;
        $this->inicio = $inicio;
        $this->destino = $destino;
        $this->estatus = $estatus;
        $this->o1 = $o1;
        $this->o2 = $o2;
        $this->o3 = $o3;
    }

    public function create()
    {
        $bd = new Conexion();
        $ct = "SHOW TABLES LIKE 'viajes'";
        $h = $bd->query($ct);

        $sql = "INSERT INTO viajes (USUARIO, CONDUCTOR, FECHA, HORA, TARIFA, DISTANCIA, INICIO, DESTINO, ESTATUS, O1, O2, O3) 
                VALUES ('{$this->usuario}', '{$this->conductor}', '{$this->fecha}', '{$this->hora}', '{$this->tarifa}', '{$this->distancia}', '{$this->inicio}', '{$this->destino}', '{$this->estatus}', '{$this->o1}', '{$this->o2}', '{$this->o3}')";

        if ($h->num_rows < 1) {
            // La tabla 'viajes' no existe, crea la tabla y luego realiza la inserción
            $sqlCreateTable = "CREATE TABLE viajes (
                                ID INT AUTO_INCREMENT PRIMARY KEY,
                                USUARIO VARCHAR(255),
                                CONDUCTOR VARCHAR(255),
                                FECHA DATE,
                                HORA TIME,
                                TARIFA DECIMAL(10, 2),
                                DISTANCIA DECIMAL(10, 2),
                                INICIO VARCHAR(255),
                                DESTINO VARCHAR(255),
                                ESTATUS VARCHAR(50),
                                O1 VARCHAR(255),
                                O2 VARCHAR(255),
                                O3 VARCHAR(255)
                            )";

            $bd->query($sqlCreateTable);
        }

        $bd->query($sql);
    }

    public function read($id = null)
    {
        $bd = new Conexion();

        if ($id !== null) {
            // Si se proporciona un ID, obtén ese registro específico
            $sql = "SELECT * FROM viajes WHERE ID = {$id}";
        } else {
            // Si no se proporciona un ID, obtén todos los registros ordenados por ID de mayor a menor
            $sql = "SELECT * FROM viajes ORDER BY ID DESC";
        }

        $result = $bd->query($sql);

        // Manejo del resultado (podrías devolverlo, imprimirlo, etc.)
        return $result;
    }

    public function update($id, $data)
    {
        $bd = new Conexion();
        $setClause = '';

        foreach ($data as $key => $value) {
            $setClause .= "{$key} = '{$value}', ";
        }

        $setClause = rtrim($setClause, ', ');

        $sql = "UPDATE viajes SET {$setClause} WHERE ID = {$id}";

        $bd->query($sql);

        // Manejo del resultado si es necesario
    }

    public function delete($id)
    {
        $bd = new Conexion();
        $sql = "DELETE FROM viajes WHERE ID = {$id}";

        $bd->query($sql);

        // Manejo del resultado si es necesario
    }
}
?>