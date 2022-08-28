<?php

namespace App\Model; 

use App\DAO\{
    RefeicaoDAO, DietaDAO
};

class RefeicaoModel{
    public $id, $descricao, $horario, $id_dieta;
    public $lista_dietas = array();
    public $lista_alimentos = array();

    public function save(){       
        $dao = new RefeicaoDAO();

        $dao->insert($this);
    }

    public function getAll(){        
        $dao = new RefeicaoDAO();
        
        return $dao->getAllRows();
    }

    public function getById($id){       
        $dao = new RefeicaoDAO();
        
        return $dao->getById($id);
    }

    public function updateCaloriaById($id, $calorias){        
        $dao = new RefeicaoDAO();
        
        $dao->updateCaloriaById($id, $calorias);
    }

    public function getAllDietas(){
        $dieta_dao = new DietaDAO();
        
        return $dieta_dao->getAllRows();
    }
}