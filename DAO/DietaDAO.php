<?php

class DietaDAO{

    public $conexao;

    public function __construct()
    {
        include_once 'MySQL.php';

        $this->conexao = new MySQL();
    }

    public function insert(DietaModel $model){
       
        $sql = "INSERT INTO dieta(descricao, data_inicio, data_fim, id_paciente) VALUES (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->data_inicio);
        $stmt->bindValue(3, $model->data_fim);
        $stmt->bindValue(4, $model->id_paciente);
        

        $stmt->execute();
    }

    public function getById($id){
        $sql = "SELECT * FROM dieta WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function delete($id){
        $sql = "DELETE FROM dieta WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public function update(DietaModel $model){
        $sql = "UPDATE dieta SET descricao = ?, data_inicio = ?, data_fim = ?, id_paciente = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->data_inicio);
        $stmt->bindValue(3, $model->data_fim);
        $stmt->bindValue(4, $model->id_paciente);
        $stmt->bindValue(5, $model->id);
        $stmt->execute();
    }

    public function getAllRows(){
        $sql = 'SELECT d.id,
                       d.descricao,
                       DATE_FORMAT(data_inicio, "%d/%m/%Y") as data_inicio,
                       DATE_FORMAT(data_fim, "%d/%m/%Y") as data_fim,
                       p.nome as nome_paciente        
                 FROM dieta d
                 JOIN paciente p on p.id = d.id_paciente 
                 ';

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_CLASS);   
    }
}