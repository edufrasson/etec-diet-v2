<?php

class RefeicaoAlimentoAssocModel{
    public $id_refeicao, $id_alimento, $quantidade;
    public $lista_refeicoes = array();
    public $lista_alimentos = array();   
    

    public function save(){
        include 'DAO/RefeicaoAlimentoAssocDAO.php';

        $dao = new RefeicaoAlimentoAssocDAO;
        $dao->insert($this);
        
        header("Location: /refeicao_alimento");
    }

    public function getAll(){
        include 'DAO/RefeicaoAlimentoAssocDAO.php';
        $dao = new RefeicaoAlimentoAssocDAO();
        
        return $dao->getAllRows();
    }

    public function getAllRefeicoes(){
        include 'DAO/RefeicaoDAO.php';
        $refeicoes = new RefeicaoDAO();

        return $refeicoes->getAllRows();
    }

    public function getAllAlimentos(){
        include 'DAO/AlimentoDAO.php';

        $alimentos = new AlimentoDAO();
        return $alimentos->getAllRows();
    }

    public function getAlimentosByRefeicao($id_refeicao){
        $dao = new RefeicaoAlimentoAssocDAO();

        return $dao->getByRefeicao($id_refeicao);
    }
}