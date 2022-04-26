<?php

class MySQL extends PDO{
    public $dsn = "mysql:host=localhost:3307;dbname=etec_diet";
    public $user = "root";
    public $pass = "etecjau";
    
    private $opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    public function __construct()
    {
        return parent::__construct($this->dsn, $this->user, $this->pass);
    }
   
}