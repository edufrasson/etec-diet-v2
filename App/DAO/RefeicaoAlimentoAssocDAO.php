<?php

namespace App\DAO; 

use App\Model\RefeicaoAlimentoAssocModel;
use App\Model\RefeicaoModel;
use App\Model\AlimentoModel;
use \PDO;
use \FFI\Exception;

class RefeicaoAlimentoAssocDAO{
    public $conexao;

    public function __construct()
    {
        include_once 'MySQL.php';
        $this->conexao = new MySQL();
    }

    public function insert(RefeicaoAlimentoAssocModel $model){
        try{            
            $sql = 'INSERT INTO refeicao_alimento_assoc(id_refeicao, id_alimento, quantidade) VALUES (?, ?, ?)';

            $stmt = $this->conexao->prepare($sql);

            $stmt->bindValue(1, $model->id_refeicao);
            $stmt->bindValue(2, $model->id_alimento);
            $stmt->bindValue(3, $model->quantidade);

            $stmt->execute();
            
            $model_refeicao = new RefeicaoModel;
            $dao_refeicao = new RefeicaoDAO;
            $model_alimento = new AlimentoModel;

            $model_refeicao = $model_refeicao->getById($model->id_refeicao);
            $model_alimento = $model_alimento->getById($model->id_alimento);
                    
            $caloria_nova = (($model->quantidade * $model_alimento->caloria) / $model_alimento->porcao) + $model_refeicao->calorias_totais;

            $dao_refeicao->updateCaloriaById($model->id_refeicao, $caloria_nova);
            
        }catch(Exception $ex){            
            echo $ex->getMessage();
        }
    }

    public function getById($id_alimento, $id_refeicao){
        $sql = "SELECT * FROM refeicao_alimento_assoc WHERE id_alimento = ? AND id_refeicao = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_alimento);
        $stmt->bindValue(2, $id_refeicao);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function getByRefeicao($id_refeicao){
        $sql = "SELECT assoc.id_refeicao as id_refeicao,
                     r.descricao as refeicao,
                     a.nome as alimento,
                     assoc.quantidade as quantidade
                FROM refeicao_alimento_assoc assoc
                JOIN refeicao r on r.id = assoc.id_refeicao
                JOIN alimento a on a.id = assoc.id_alimento
                WHERE id_refeicao = ?
        ";
        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(1, $id_refeicao);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function delete($id_alimento, $id_refeicao){
        $sql = "DELETE FROM refeicao_alimento_assoc WHERE id_alimento = ? AND id_refeicao = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_alimento);
        $stmt->bindValue(2, $id_refeicao);
        $stmt->execute();
    }

    public function update(RefeicaoAlimentoAssocModel $model, $id_alimento, $id_refeicao){
        $sql = "UPDATE refeicao_alimento_assoc SET id_alimento = ?, id_refeicao = ?, quantidade = ? WHERE id_alimento = ? AND id_refeicao = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->id_alimento);
        $stmt->bindValue(2, $model->id_refeicao);
        $stmt->bindValue(3, $model->quantidade);
        $stmt->bindValue(4, $id_alimento);
        $stmt->bindValue(5, $id_refeicao);
        $stmt->execute();
    }

    public function getAllRows(){
        $sql = "SELECT r.descricao as refeicao,
                    a.nome as alimento,
                     assoc.quantidade as quantidade
                FROM etec_diet.refeicao_alimento_assoc assoc
                JOIN refeicao r on r.id = assoc.id_refeicao
                JOIN alimento a on a.id = assoc.id_alimento"
        ;

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();           
        
        return $stmt->fetchAll(\PDO::FETCH_CLASS);    
    }
  
}