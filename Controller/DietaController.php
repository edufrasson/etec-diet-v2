<?php 
class DietaController{
    public static function form(){
        
        $model = new DietaModel();
        $model->lista_pacientes = $model->getAllPacientes();    

        include 'View/modules/Dieta/CadastrarDieta.php';    
    }

    public static function index(){
        $arr_dietas = self::listar();

        include 'View/modules/Dieta/ListarDieta.php';
    }

    public static function save(){
        
        $model = new DietaModel();

        $model->descricao = $_POST['descricao'];
        $model->data_inicio = $_POST['data_inicio'];
        $model->data_fim = $_POST['data_fim'];
        $model->id_paciente = $_POST['id_paciente'];        

        $model->save();

        header("Location: /dieta");
    }

    public static function listar(){
        
        $model = new DietaModel();

        $arr_dieta = $model->getAll();

        return $arr_dieta;
    }
}
