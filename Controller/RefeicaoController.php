<?php

class RefeicaoController{
    public static function form(){
        
        $model = new RefeicaoModel();
        $model->lista_dietas = $model->getAllDietas();

        include 'View/modules/Refeicao/CadastrarRefeicao.php';
    }

    public static function index(){
        $arr_refeicoes = self::listar();

        include 'View/modules/Refeicao/ListarRefeicao.php';
    }

    public static function save(){
        
        $model = new RefeicaoModel();

        $model->descricao = $_POST['descricao'];
        $model->horario = $_POST['horario'];
        $model->id_dieta = $_POST['id_dieta'];

        $model->save();

        header("Location: /refeicao");
    }

    public static function listar(){
        
        $model = new RefeicaoModel();

        $arr_refeicoes = $model->getAll();

        return $arr_refeicoes;
    }
}