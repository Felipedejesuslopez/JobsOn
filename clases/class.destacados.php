<?php
class destacados
{
    protected $idoferta;
    protected $d1;
    protected $d2;
    protected $d3;
    protected $d4;

    public function __construct($id, $d1, $d2,$d3,$d4){
        $this->idoferta = $id;
        $this->d1 = $d1;
        $this->d2 = $d2;
        $this->d3 = $d3;
        $this->d4 = $d4;
    }

    public function create(){
        $bd = new Conexion();
        $c = "SHOW TABLES LIKE 'destacados'";
        $rev = $bd->query($c);
        if($rev->num_rows < 1){
            
        }
    }
}
?>