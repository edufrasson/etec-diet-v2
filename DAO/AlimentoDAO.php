<?php

// CAMADA DAO // 

// DAO -> Data Access Object (objeto de acesso a dados)

// DSN -> Data Source Name 

/**
 * sgbd -> mysql:localhost
 * nome do banco -> dbname=nome_banco
 */

// PDO -> PHP Data Object (objeto de dados do php)

/**
 * É a classe que realiza conexões e executa códigos sql no php
 */

 // Funções

 /**
  * Realiza conexões
  * Executa códigos sql no php (INSERT, UPDATE, SELECT)
  */


class AlimentoDAO{
    public $conexao;
    // Método construtor
    /**
     * Função que é executada no momento em que o objeto 
     * da classe é criado
     * 
     * // Criando um objeto
     * $objeto = new Classe();
     */
    public function __construct()
    {
        include_once 'MySQL.php';
        $this->conexao = new MySQL();
    }

    public function insert(AlimentoModel $model){
        $sql = 'INSERT INTO alimento(nome, porcao, id_categoria_alimento, caloria) VALUES (?, ?, ?, ?)';

        // Prepara o comando sql
        $stmt = $this->conexao->prepare($sql);

        // Troca os ? pelos valores preenchidos da model
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->porcao);
        $stmt->bindValue(3, $model->id_categoria_alimento);
        $stmt->bindValue(4, $model->caloria);

        // Executa o código
        $stmt->execute();        
    }     

    public function getById($id){
        $sql = "SELECT * FROM alimento WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function delete($id){
        $sql = "DELETE FROM alimento WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public function update(AlimentoModel $model){
        $sql = "UPDATE alimento SET nome = ?, porcao = ?, caloria = ?, id_categoria_alimento = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->porcao);
        $stmt->bindValue(3, $model->caloria);
        $stmt->bindValue(4, $model->id_categoria_alimento);
        $stmt->bindValue(5, $model->id);

        $stmt->execute();
    }

    public function getAllRows(){
        $sql = 'SELECT * FROM view_alimento';

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_CLASS);    
    }
}