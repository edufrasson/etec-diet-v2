<?php

namespace App\Controller;

class CategoriaAlimentoController{
    public static function form(){
        include 'View/modules/Categoria_Alimento/CadastrarCategoriaAlimento.php';
    }   

    public static function index(){
        $arr_categoria_alimentos = self::listar();

        include 'View/modules/Categoria_Alimento/ListarCategoriaAlimento.php';
    }

    public static function save(){
        
        $model = new CategoriaAlimentoModel;

        $model->descricao = $_POST['descricao'];        

        $model->save();

        header("Location: /categoria_alimento/form");
    }

    public static function listar(){
        
        $model = new CategoriaAlimentoModel();

        $arr_categoria_alimentos = $model->getAll();

        return $arr_categoria_alimentos;
    }
}