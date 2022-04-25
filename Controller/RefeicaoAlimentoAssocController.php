<?php

class RefeicaoAlimentoAssocController{
    public static function form(){
                $model = new RefeicaoAlimentoAssocModel();
        $model->lista_refeicoes = $model->getAllRefeicoes();
        $model->lista_alimentos = $model->getAllAlimentos();

        include 'View/modules/Refeicao_Alimento_Assoc/CadastrarRefeicaoAlimentoAssoc.php';
    }

    public static function index(){
        $lista_alimentos_por_refeicoes = self::listar();

        include 'View/modules/Refeicao_Alimento_Assoc/ListarRefeicaoAlimentoAssoc.php';
    }

    public static function save(){
        
        $model = new RefeicaoAlimentoAssocModel();

        $model->id_refeicao = $_POST['id_refeicao'];
        $model->id_alimento = $_POST['id_alimento'];
        $model->quantidade = $_POST['quantidade'];

        $model->save();
    }

    public static function listar(){
        
        $refeicao_model = new RefeicaoModel();
        $assoc_model = new RefeicaoAlimentoAssocModel();

        $refeicoes = $refeicao_model->getAll();
       

        foreach($refeicoes as $refeicoes){
            $lista_ids_refeicoes[] = $refeicoes->id;
        }

        foreach($lista_ids_refeicoes as $ids){
            $lista_alimentos_por_refeicoes[] = $assoc_model->getAlimentosByRefeicao($ids);
        }

        //var_dump($lista_alimentos_por_refeicoes);
        echo $lista_alimentos_por_refeicoes[1][1]['id_alimento'];
    }
}