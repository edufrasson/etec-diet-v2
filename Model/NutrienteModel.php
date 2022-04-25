<?php 

class NutrienteModel{
    public $id, $descricao, $quantidade, $id_alimento, $id_categoria_nutriente;

    public $lista_categoria = array();
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

    public function getAllCategoriaNutriente(){
        include 'DAO/CategoriaNutrienteDAO.php';

        $categoria_nutriente = new CategoriaNutrienteDAO();
        return $categoria_nutriente->getAllRows();
    }

    public function getAllAlimentos(){
        include 'DAO/AlimentoDAO.php';

        $alimentos = new AlimentoDAO();
        return $alimentos->getAllRows();
    }
}