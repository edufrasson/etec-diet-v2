<?php

class NutrienteController{
    public static function form(){        
        $model = new NutrienteModel();
        $model->lista_categoria = $model->getAllCategoriaNutriente();
        $model->lista_alimentos = $model->getAllAlimentos();

        include 'View/modules/Nutriente/CadastrarNutriente.php';
    }

    public static function index(){
        $arr_nutrientes = self::listar();

        include 'View/modules/Nutriente/ListarNutriente.php';
    }

    public static function save(){
       
        $model = new NutrienteModel();

        $model->descricao = $_POST['descricao'];
        $model->quantidade = $_POST['quantidade'] * 1000;
        $model->id_alimento = $_POST['id_alimento'];
        $model->id_categoria_nutriente = $_POST['id_categoria_nutriente'];

        $model->save();

        header("Location: /nutriente");
    }

    public static function listar(){
       
        $model = new NutrienteModel();

        $arr_nutrientes = $model->getAll();

        return $arr_nutrientes;
    }
}