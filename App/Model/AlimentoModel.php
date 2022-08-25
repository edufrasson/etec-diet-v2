<?php

// CAMADA MODEL // 

// Funções

/**
 * 1 - Transporte de dados através de uma função 
 * que acessa a camada DAO
 * 
 * 2 - Validação 
 */

namespace App\Model; 
use App\DAO\{
    AlimentoDAO, CategoriaAlimentoDAO
};
 

class AlimentoModel{    
    public $id, $nome, $id_categoria_alimento, $porcao, $caloria;
    public $lista_categorias = array();
    public $lista_nutrientes = array();
    
    public function save(){
        include 'DAO/AlimentoDAO.php';

        $dao = new AlimentoDAO();

        return $dao->insert($this);
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