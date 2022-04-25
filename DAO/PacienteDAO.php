<?php 

class PacienteDAO{

    public $conexao;

    public function __construct()
    {
        include_once 'MySQL.php';

        $this->conexao = new MySQL();
    }

    public function insert(PacienteModel $model){
       
        $sql = "INSERT INTO paciente(nome, peso, altura, sexo, data_nascimento) VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->peso);
        $stmt->bindValue(3, $model->altura);
        $stmt->bindValue(4, $model->sexo);
        $stmt->bindValue(5, $model->data_nascimento);

        $stmt->execute();

        echo 'Adicionado.';
    }

    public function getById($id){
        $sql = "SELECT * FROM paciente WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        return $stmt->fetchObject();
    }

    public function delete($id){
        $sql = "DELETE FROM paciente WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public function update(PacienteModel $model){
        $sql = "UPDATE paciente SET nome = ?, data_nascimento = ?, peso = ?, altura = ?, sexo = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->data_nascimento);
        $stmt->bindValue(3, $model->peso);
        $stmt->bindValue(4, $model->altura);
        $stmt->bindValue(5, $model->sexo);
        $stmt->bindValue(6, $model->id);
        $stmt->execute();

    }

    public function getAllRows(){
        $sql = "SELECT * FROM select_paciente";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();           
        
        return $stmt->fetchAll(\PDO::FETCH_CLASS);    
    }
  
}