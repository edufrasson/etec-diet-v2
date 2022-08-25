<?php

namespace App\Controller;

class NutrienteController{   

    public static function save(){
       
        $model = new NutrienteModel();

        $model->carboidrato = $_POST['carboidrato'];
        $model->proteina = $_POST['proteina'];
        $model->lipideo = $_POST['lipideo'];
        $model->fibra = $_POST['fibra'];
        $model->id_alimento = $_POST['id_alimento'];

        $model->save();

        header("Location: /nutriente");
    }

    public static function listar(){
       
        $model = new NutrienteModel();

        $arr_nutrientes = $model->getAll();

        return $arr_nutrientes;
    }
}