<?php 

class PacienteModel{
    public $id, $nome, $peso, $altura, $data_nascimento, $sexo;

    public function save(){
        include 'DAO/PacienteDAO.php';

        $dao = new PacienteDAO();

        $dao->insert($this);
    }

    public function getAll(){
        include 'DAO/PacienteDAO.php';
        $paciente_dao = new PacienteDAO();

        return $paciente_dao->getAllRows();        
    }
}