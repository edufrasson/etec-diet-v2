<?php

class CategoriaAlimentoModel{
    public $id, $descricao;

    public function save(){
        include 'DAO/CategoriaAlimentoDAO.php';

        $dao = new CategoriaAlimentoDAO;

        $dao->insert($this);
    }

    public function getAll(){
        include 'DAO/CategoriaAlimentoDAO.php';
        $dao = new CategoriaAlimentoDAO();
        
        return $dao->getAllRows();
    }
}