<?php

class RefeicaoModel{
    public $id, $descricao, $horario, $id_dieta;
    public $lista_dietas = array();

    public function save(){
        include 'DAO/RefeicaoDAO.php';

        $dao = new RefeicaoDAO();

        $dao->insert($this);
    }

    public function getAll(){
        include 'DAO/RefeicaoDAO.php';
        $dao = new RefeicaoDAO();
        
        return $dao->getAllRows();
    }

    public function getAllDietas(){
        include 'DAO/DietaDAO.php';
        $dieta_dao = new DietaDAO();
        
        return $dieta_dao->getAllRows();
    }
}