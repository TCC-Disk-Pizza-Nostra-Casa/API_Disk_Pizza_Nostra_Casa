<?php

namespace Api\DAO;

use Api\Model\FornecedorModel;

class FornecedorDAO extends DAO
{

    public function Insert(FornecedorModel $model) : FornecedorModel
    {

        $sql = "INSERT INTO Fornecedor(nome, cnpj, telefone) VALUES(?,?,?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);

        $stmt->bindValue(2, $model->cnpj);

        $stmt->bindValue(3, $model->telefone);

        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;

    }

    public function Update(FornecedorModel $model) : bool
    {

        $sql = "UPDATE Fornecedor SET nome = ?, cnpj = ?, telefone = ?, data_modificacao = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);

        $stmt->bindValue(2, $model->cnpj);

        $stmt->bindValue(3, $model->telefone);

        $stmt->bindValue(4, $model->data_modificacao);

        $stmt->bindValue(5, $model->id);

        return $stmt->execute();

    }

    public function Deactivate(int $id) : bool
    {

        $sql = "UPDATE Fornecedor SET ativo = 0 WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        return $stmt->execute();

    }

    public function Reactivate(int $id) : bool
    {

        $sql = "UPDATE Fornecedor SET ativo = 1 WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        return $stmt->execute();

    }

    public function Select() : array
    {

        $sql = "SELECT * FROM Fornecedor ORDER BY nome ASC";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\FornecedorModel");

    }

    public function Search(string $value) : array
    {

        $parametro = [":filtro" => "%" . $value . "%"];

        $sql = "SELECT * FROM Fornecedor WHERE nome LIKE :filtro ORDER BY nome ASC";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->execute($parametro);

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\FornecedorModel");

    }

}

?>