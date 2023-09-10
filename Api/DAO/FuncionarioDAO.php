<?php

namespace Api\DAO;

use Api\Model\FuncionarioModel;

class FuncionarioDAO extends DAO
{
    
    public function __construct()
    {

        parent::__construct();
        
    }

    public function Insert(FuncionarioModel $model) : FuncionarioModel
    {

        $sql = "INSERT INTO Funcionario(nome, genero, cpf, rg, cargo, cep, email, telefone, senha, " .
               "observacoes, administrador) VALUES(?, ?, ?, ?, ?, ?, ?, ?, MD5(?), ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);

        $stmt->bindValue(2, $model->genero);

        $stmt->bindValue(3, $model->cpf);

        $stmt->bindValue(4, $model->rg);

        $stmt->bindValue(5, $model->cargo);

        $stmt->bindValue(6, $model->cep);

        $stmt->bindValue(7, $model->email);

        $stmt->bindValue(8, $model->telefone);

        $stmt->bindValue(9, $model->senha);

        $stmt->bindValue(10, $model->observacoes);

        $stmt->bindValue(11, $model->administrador);

        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;

    }

    public function Update(FuncionarioModel $model) : bool
    {

        $sql = "UPDATE Funcionario SET nome = ?, genero = ? cpf = ?, rg = ?, cargo = ?, " .
               "cep = ?, email = ?, telefone = ?, senha = MD5(?), observacoes = ?, " .
               "administrador = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);

        $stmt->bindValue(2, $model->genero);

        $stmt->bindValue(3, $model->cpf);

        $stmt->bindValue(4, $model->rg);

        $stmt->bindValue(5, $model->cargo);

        $stmt->bindValue(6, $model->cep);

        $stmt->bindValue(7, $model->email);

        $stmt->bindValue(8, $model->telefone);

        $stmt->bindValue(9, $model->senha);

        $stmt->bindValue(10, $model->observacoes);

        $stmt->bindValue(11, $model->administrador);

        $stmt->bindValue(12, $model->id);

        return $stmt->execute();

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

    public function Select() : array
    {

        $sql = "SELECT Funcionario.*, " .
               "DATE_FORMAT(Funcionario.data_cadastro, 'dd/MM/yyyy hh:mm:ss') " .
               "FROM Funcionario ORDER BY nome ASC";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\FuncionarioModel");

    }

    public function Search(string $value) : array
    {

        $parametro = [":filtro" => "%" . $value . "%"];

        $sql = "SELECT Funcionario.*, " .
               "DATE_FORMAT(Funcionario.data_cadastro, 'dd/MM/yyyy hh:mm:ss') " .
               "FROM Funcionario WHERE nome LIKE :filtro ORDER BY nome ASC";
        
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