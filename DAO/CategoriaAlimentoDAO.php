<?php

class CategoriaAlimentoDAO{

    public $conexao;

    public function __construct()
    {
        include_once 'MySQL.php';

        $this->conexao = new MySQL();
    }

    public function insert(CategoriaAlimentoModel $model){
       
        $sql = "INSERT INTO categoria_alimento(descricao) VALUES (?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->descricao);

        $stmt->execute();
    }

    public function getById($id){
        $sql = "SELECT * FROM categoria_alimento WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        
        return $stmt->fetchObject();
    }

    public function delete($id){
        $sql = "DELETE FROM categoria_alimento WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public function update(CategoriaAlimentoModel $model){
        $sql = "UPDATE categoria_alimento SET descricao = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->id);
        $stmt->execute();
    }

    public function getAllRows(){
        $sql = "SELECT * FROM categoria_alimento";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();      

        return $stmt->fetchAll(PDO::FETCH_CLASS);    
    }
}