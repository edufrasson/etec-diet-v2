<?php

class DietaModel{
    public $id, $descricao, $data_inicio, $data_fim, $id_paciente;

    public $lista_pacientes = array();

    public function save(){
        include 'DAO/DietaDAO.php';

        $dao = new DietaDAO();

        $dao->insert($this);
    }

    public function getAll(){
        include 'DAO/DietaDAO.php';
        $dao = new DietaDAO();
        
        return $dao->getAllRows();
    }

    public function getAllPacientes(){
        include 'DAO/PacienteDAO.php';
        $paciente_dao = new PacienteDAO();
        
        return $paciente_dao->getAllRows();
    }
}