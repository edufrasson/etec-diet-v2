<?php

class CategoriaNutrienteModel{
    public $id, $descricao;

    public function save(){
        include 'DAO/CategoriaNutrienteDAO.php';

        $dao = new CategoriaNutrienteDAO;

        $dao->insert($this);
    }

    public function getAll(){
        include 'DAO/CategoriaNutrienteDAO.php';
        $dao = new CategoriaNutrienteDAO();
        
        return $dao->getAllRows();
    }
}