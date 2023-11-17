<?php
class ExamenMedico
{
    protected $id;
    protected $fecha;
    protected $hora;
    protected $id_lugar;
    protected $id_usuario;
    protected $id_oferta_laboral;
    protected $id_conductor;
    protected $descripcion;
    protected $o1;
    protected $o2;

    public function __construct($id, $fecha, $hora, $id_lugar, $id_usuario, $id_oferta_laboral, $id_conductor, $descripcion, $o1, $o2)
    {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->id_lugar = $id_lugar;
        $this->id_usuario = $id_usuario;
        $this->id_oferta_laboral = $id_oferta_laboral;
        $this->id_conductor = $id_conductor;
        $this->descripcion = $descripcion;
        $this->o1 = $o1;
        $this->o2 = $o2;
    }

    public function create()
    {
        $bd = new Conexion();
        $ct = "SHOW TABLES LIKE 'examenes_medicos'";
        $h = $bd->query($ct);

        $sql = "INSERT INTO examenes_medicos (FECHA, HORA, ID_LUGAR, ID_USUARIO, ID_OFERTA_LABORAL, ID_CONDUCTOR, DESCRIPCION, O1, O2) 
                VALUES ('{$this->fecha}', '{$this->hora}', '{$this->id_lugar}', '{$this->id_usuario}', '{$this->id_oferta_laboral}', '{$this->id_conductor}', '{$this->descripcion}', '{$this->o1}', '{$this->o2}')";

        if ($h->num_rows < 1) {
            // La tabla 'examenes_medicos' no existe, crea la tabla y luego realiza la inserción
            $sqlCreateTable = "CREATE TABLE examenes_medicos (
                                ID INT AUTO_INCREMENT PRIMARY KEY,
                                FECHA DATE,
                                HORA TIME,
                                ID_LUGAR INT,
                                ID_USUARIO INT,
                                ID_OFERTA_LABORAL INT,
                                ID_CONDUCTOR INT,
                                DESCRIPCION TEXT,
                                O1 VARCHAR(255),
                                O2 VARCHAR(255),
                                FOREIGN KEY (ID_LUGAR) REFERENCES laboratorios(ID),
                                FOREIGN KEY (ID_USUARIO) REFERENCES usuarios(ID),
                                FOREIGN KEY (ID_OFERTA_LABORAL) REFERENCES ofertas_laborales(ID),
                                FOREIGN KEY (ID_CONDUCTOR) REFERENCES conductores(ID)
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
            $sql = "SELECT * FROM examenes_medicos WHERE ID = {$id}";
        } else {
            // Si no se proporciona un ID, obtén todos los registros ordenados por ID de mayor a menor
            $sql = "SELECT * FROM examenes_medicos ORDER BY ID DESC";
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

        $sql = "UPDATE examenes_medicos SET {$setClause} WHERE ID = {$id}";

        $bd->query($sql);

        // Manejo del resultado si es necesario
    }

    public function delete($id)
    {
        $bd = new Conexion();
        $sql = "DELETE FROM examenes_medicos WHERE ID = {$id}";

        $bd->query($sql);

        // Manejo del resultado si es necesario
    }
}
