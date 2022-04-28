<?php

class NutrienteDAO{
    public $conexao;

    public function __construct()
    {
        include_once 'MySQL.php';
        $this->conexao = new MySQL();
    }

    public function insert(NutrienteModel $model){
        $sql = "INSERT INTO nutriente(carboidrato, proteina, id_alimento, lipideo, fibra) VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->carboidrato);
        $stmt->bindValue(2, $model->proteina);
        $stmt->bindValue(3, $model->id_alimento);
        $stmt->bindValue(4, $model->lipideo);
        $stmt->bindValue(5, $model->fibra);

        $stmt->execute();
    }

    public function getById($id){
        $sql = "SELECT * FROM nutriente WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function getByAlimento($id){
        $sql = "SELECT 
                n.id as id,
                a.nome as alimento,        
                n.carboidrato as carboidrato,
                n.proteina as proteina,
                n.lipideo as lipideo,
                n.fibra as fibra   
            FROM nutriente n
            JOIN alimento a on a.id = n.id_alimento
            WHERE id_alimento = ?
        ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function delete($id){
        $sql = "DELETE FROM nutriente WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public function update(NutrienteModel $model){
        $sql = "UPDATE nutriente SET carboidrato = ?, proteina = ?, id_alimento = ?, lipideo = ?, fibra = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->carboidrato);
        $stmt->bindValue(2, $model->proteina);
        $stmt->bindValue(3, $model->id_alimento);
        $stmt->bindValue(4, $model->lipideo);
        $stmt->bindValue(5, $model->fibra);
        $stmt->bindValue(6, $model->id);
        $stmt->execute();
    }

    public function getAllRows(){
        $sql = "SELECT 
                n.id as id,
                a.nome as alimento,        
                n.carboidrato as carboidrato,
                n.proteina as proteina,
                n.lipideo as lipideo,
                n.fibra as fibra   
            FROM nutriente n
            JOIN alimento a on a.id = n.id_alimento
            WHERE id_alimento = ?
        ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();           
        
        return $stmt->fetchAll(\PDO::FETCH_CLASS);    
    }
  
}