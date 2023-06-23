<?php

namespace Api\DAO;

use Api\Model\ClienteModel;

class ClienteDAO extends DAO
{

    public function __construct()
    {

        parent::__construct();
        
    }

    public function Insert(ClienteModel $model) : ClienteModel
    {

        $sql = "INSERT INTO Cliente(nome, genero, telefone, " .
               "data_nascimento) VALUES(?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);

        $stmt->bindValue(2, $model->genero);

        $stmt->bindValue(3, $model->telefone);

        $stmt->bindValue(4, $model->data_nascimento);

        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;

    }

    public function Update(ClienteModel $model) : bool
    {

        $sql = "UPDATE Cliente SET nome = ?, genero = ?, " .
               "telefone = ?, data_nascimento = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);

        $stmt->bindValue(2, $model->genero);

        $stmt->bindValue(3, $model->telefone);

        $stmt->bindValue(4, $model->data_nascimento);

        $stmt->bindValue(5, $model->id);

        return $stmt->execute();

    }

    public function Delete(int $id) : bool
    {

        $sql = "DELETE FROM Cliente WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        return $stmt->execute();

    }

    public function Select() : array
    {

        $sql = "SELECT Cliente.*, " .
               "DATE_FORMAT(Cliente.data_nascimento, 'dd/MM/yyyy hh:mm:ss') " .
               "FROM Cliente ORDER BY nome ASC";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\ClienteModel");

    }

    public function Search(string $value) : array
    {

        $parametro = [":filtro" => "%" . $value . "%"];

        $sql = "SELECT Cliente.*, " .
               "DATE_FORMAT(Cliente.data_nascimento, 'dd/MM/yyyy hh:mm:ss') " .
               "FROM Cliente WHERE nome LIKE :filtro ORDER BY nome ASC";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->execute($parametro);

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\ClienteModel");

    }

}

?>