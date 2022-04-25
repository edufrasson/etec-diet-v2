<?php 
class PacienteController{
    public static function form(){
        include 'View/modules/Paciente/CadastrarPaciente.php';
        
        $arr_pacientes = self::listar();

        return $arr_pacientes;
    }

    public static function index(){
        $arr_pacientes = self::listar();

        include 'View/modules/Paciente/ListarPaciente.php';
    }

    public static function save(){
        
        $model = new PacienteModel();

        $model->nome = $_POST['nome'];
        $model->peso = $_POST['peso'];
        $model->altura = $_POST['altura'];
        $model->sexo = $_POST['sexo'];
        $model->data_nascimento = $_POST['data_nascimento'];

        $model->save();

        header("Location: /paciente");
    }

    public static function listar(){
        
        $model = new PacienteModel();

        $arr_pacientes = $model->getAll();

        return $arr_pacientes;
    }
}
