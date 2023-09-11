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

        $sql = "INSERT INTO Cliente (nome, email, telefone) VALUES (?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);

        $stmt->bindValue(2, $model->email);

        $stmt->bindValue(3, $model->telefone);

        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;

    }

    public function Update(ClienteModel $model) : bool
    {

        $sql = "UPDATE Cliente SET nome = ?, email = ?, telefone = ?, ativo = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);

        $stmt->bindValue(2, $model->email);

        $stmt->bindValue(3, $model->telefone);

        $stmt->bindValue(4, $model->ativo);

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

        $sql = "SELECT * FROM Cliente ORDER BY nome ASC";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\ClienteModel");

    }

    public function Search(string $value) : array
    {

        $parametro = [":filtro" => "%" . $value . "%"];

        $sql = "SELECT * FROM Cliente WHERE nome LIKE :filtro ORDER BY nome ASC";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->execute($parametro);

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\ClienteModel");

    }

}

?>