<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

class Conexion extends mysqli
{
    private $host = 'localhost';
    private $user = 'root';
    private $psw = '';
    private $database = 'Jobson';

    public function __construct()
    {
        parent::__construct($this->host, $this->user, $this->psw, $this->database);
        $this->connect_errno ? die() : $m = "conetado";
    }
}
?>