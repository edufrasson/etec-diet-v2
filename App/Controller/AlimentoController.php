<?php

// CAMADA CONTROLLER // 

// Funções

/**
 *  1- Recebe requisições do usuário e devolve uma view;
 *  2- Preenche a camada model com os dados que o usuário inseriu;
 */
namespace App\Controller;



class AlimentoController{

    // 1
    public static function form(){
        $model = new AlimentoModel();
        $model->lista_categorias = $model->getAllCategoriaAlimento();
        include 'View/modules/Alimento/CadastrarAlimento.php';
    }

    public static function index(){
        $arr_alimentos = self::listar();

   

        include 'View/modules/Alimento/ListarAlimento.php';
    }

    // 2
    public static function save(){
             
        
        // Criando um objeto model
        $model = new AlimentoModel();

        // Preenchendo os dados da model
        $model->nome = $_POST['nome'];
        $model->porcao = $_POST['porcao'];
        $model->caloria = $_POST['caloria'];
        $model->id_categoria_alimento = $_POST['id_categoria_alimento'];

        // Salvando os dados
        $id_alimento = $model->save();

        $nutriente = new NutrienteModel();

        $nutriente->carboidrato = $_POST['qnt_carboidrato'];
        $nutriente->proteina = $_POST['qnt_proteina'];
        $nutriente->lipideo = $_POST['qnt_lipideo'];
        $nutriente->fibra = $_POST['qnt_fibra'];
        $nutriente->id_alimento = $id_alimento;         

        $nutriente->save();

        //header("Location: /alimento");
    }

    public static function listar(){
        
        $model = new AlimentoModel();

        $arr_alimentos = $model->getAll();

        return $arr_alimentos;
    }
}