<?php

// CAMADA MODEL // 

// Funções

/**
 * 1 - Transporte de dados através de uma função 
 * que acessa a camada DAO
 * 
 * 2 - Validação 
 */
 

class AlimentoModel{    
    public $id, $nome, $id_categoria_alimento, $porcao, $caloria;
    public $lista_categorias = array();
    
    public function save(){
        include 'DAO/AlimentoDAO.php';

        $dao = new AlimentoDAO();

        $dao->insert($this);
    }

    public function getAll(){
        include 'DAO/AlimentoDAO.php';
        $dao = new AlimentoDAO();
        
        return $dao->getAllRows();
    }
    
    public function getAllCategoriaAlimento(){
        include 'DAO/CategoriaAlimentoDAO.php';
        $categoria_alimento_dao = new CategoriaAlimentoDAO();
        
        return $categoria_alimento_dao->getAllRows();
    }   
}