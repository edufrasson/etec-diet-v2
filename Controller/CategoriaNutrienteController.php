<?php

class CategoriaNutrienteController{
    public static function form(){
        include 'View/modules/Categoria_Nutriente/CadastrarCategoriaNutriente.php';
    }

    public static function index(){
        $arr_categoria_nutrientes = self::listar();

        include 'View/modules/Categoria_Nutriente/ListarCategoriaNutriente.php';
    }

    public static function save(){        

        $model = new CategoriaNutrienteModel;

        $model->descricao = $_POST['descricao'];        

        $model->save();

        header("Location: /categoria_nutriente");
    }

    public static function listar(){
        

        $model = new CategoriaNutrienteModel();

        $arr_categoria_nutrientes = $model->getAll();

        return $arr_categoria_nutrientes;
    }
}