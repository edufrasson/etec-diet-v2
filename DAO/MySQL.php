<?php

class MySQL extends PDO{
    public $dsn = "mysql:host=localhost;dbname=etec_diet";
    public $user = "root";
    public $pass = "Eduardo@mysql";
    
    private $opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    public function __construct()
    {
        return parent::__construct($this->dsn, $this->user, $this->pass);
    }
   
}