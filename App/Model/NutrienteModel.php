<?php 

namespace App\Model; 

use App\DAO\NutrienteDAO;
use App\DAO\AlimentoDAO;

class NutrienteModel{
    public $id, $carboidrato, $proteina, $lipideo, $fibra, $id_alimento;   
    public $lista_alimentos = array();

    public function save(){
        include 'DAO/NutrienteDAO.php';

        $dao = new NutrienteDAO();

        $dao->insert($this);
    }

    public function getAll(){
        include 'DAO/NutrienteDAO.php';
        $dao = new NutrienteDAO();
        
        return $dao->getAllRows();
    }

    public function getAllAlimentos(){
        include 'DAO/AlimentoDAO.php';

        $alimentos = new AlimentoDAO();
        return $alimentos->getAllRows();
    }
}