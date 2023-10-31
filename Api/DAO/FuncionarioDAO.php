<?php

namespace Api\DAO;

use Api\Model\FuncionarioModel;

class FuncionarioDAO extends DAO
{
    
    public function __construct()
    {

        parent::__construct();
        
    }

    public function Insert(FuncionarioModel $model) : ?FuncionarioModel
    {

        $sql = "INSERT INTO Funcionario(nome, sexo, estado_civil, cpf, " .
               "cep, email, telefone, senha, observacoes, administrador) " .
               "VALUES(?,?,?,?,?,?,?,MD5(?),?,?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);

        $stmt->bindValue(2, $model->sexo);

        $stmt->bindValue(3, $model->estado_civil);

        $stmt->bindValue(4, $model->cpf);

        $stmt->bindValue(5, $model->cep);

        $stmt->bindValue(6, $model->email);

        $stmt->bindValue(7, $model->telefone);

        $stmt->bindValue(8, $model->senha);

        $stmt->bindValue(9, $model->observacoes);

        $stmt->bindValue(10, $model->administrador);

        return (!$stmt->execute()) ? null : $model;

    }

    public function Update(FuncionarioModel $model) : ?FuncionarioModel
    {

        $sql = "UPDATE Funcionario SET nome = ?, sexo = ?, estado_civil = ?, cpf = ?, " .
               "cep = ?, email = ?, telefone = ?, senha = MD5(?), observacoes = ?, " .
               "data_modificacao = ?, administrador = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);

        $stmt->bindValue(2, $model->sexo);

        $stmt->bindValue(3, $model->estado_civil);

        $stmt->bindValue(4, $model->cpf);

        $stmt->bindValue(5, $model->cep);

        $stmt->bindValue(6, $model->email);

        $stmt->bindValue(7, $model->telefone);

        $stmt->bindValue(8, $model->senha);

        $stmt->bindValue(9, $model->observacoes);

        $stmt->bindValue(10, $model->data_modificacao);

        $stmt->bindValue(11, $model->administrador);

        $stmt->bindValue(12, $model->id);

        return (!$stmt->execute()) ? null : $model;

    }

    public function Deactivate(int $id) : bool
    {

        $sql = "UPDATE Funcionario SET ativo = 0 WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        return $stmt->execute();

    }

    public function Reactivate(int $id) : bool
    {

        $sql = "UPDATE Funcionario SET ativo = 1 WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        return $stmt->execute();

    }

    public function Ascend(int $id) : bool
    {

        $sql = "UPDATE Funcionario SET administrador = 1 WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        return $stmt->execute();

    }

    public function Descend(int $id) : bool
    {

        $sql = "UPDATE Funcionario SET administrador = 0 WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        return $stmt->execute();

    }

    public function Select() : array
    {

        $sql = "SELECT * FROM Funcionario ORDER BY nome ASC";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\FuncionarioModel");

    }

    public function Search(string $value) : array
    {

        $parametro = [":filtro" => "%" . $value . "%"];

        $sql = "SELECT * FROM Funcionario WHERE nome LIKE :filtro ORDER BY nome ASC";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->execute($parametro);

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\FuncionarioModel");

    }

    public function Login(string $cpf, string $senha) : array
    {

        $sql = "SELECT * FROM Funcionario WHERE cpf = ? AND senha = MD5(?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $cpf);

        $stmt->bindValue(2, $senha);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);

    }
    
}

?>