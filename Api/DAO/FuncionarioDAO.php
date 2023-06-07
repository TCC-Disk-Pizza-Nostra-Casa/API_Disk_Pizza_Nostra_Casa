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

        $sql = "INSERT INTO Funcionario(nome, email, senha, ".
               "administrador, data_cadastro) VALUES(?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);

        $stmt->bindValue(2, $model->email);

        $stmt->bindValue(3, $model->senha);

        $stmt->bindValue(4, $model->administrador);

        $stmt->bindValue(5, $model->data_cadastro);

        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;

    }

    public function Update(FuncionarioModel $model) : bool
    {

        $sql = "UPDATE Funcionario SET nome = ?, email = ?, senha = ?, " .
               "administrador = ?, data_cadastro = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);

        $stmt->bindValue(2, $model->email);

        $stmt->bindValue(3, $model->email);

        $stmt->bindValue(4, $model->administrador);

        $stmt->bindValue(5, $model->data_cadastro);

        $stmt->bindValue(6, $model->id);

        return $stmt->execute();

    }

    public function Delete(int $id) : bool
    {

        $sql = "DELETE FROM Funcionario WHERE id = ?";

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

        $sql = "SELECT Funcionario.*, ".
               "DATE_FORMAT(Funcionario.data_cadastro, 'dd/MM/yyyy hh:mm:ss') ".
               "FROM Funcionario WHERE nome LIKE :filtro ORDER BY nome ASC";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->execute($parametro);

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\FuncionarioModel");

    }
    
}

?>