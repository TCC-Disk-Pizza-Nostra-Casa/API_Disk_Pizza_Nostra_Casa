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

        $sql = "INSERT INTO Cliente(nome, sexo, estado_civil, cpf, cep, email, telefone, " .
               "data_nascimento, observacoes) VALUES(?,?,?,?,?,?,?,?,?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);

        $stmt->bindValue(2, $model->sexo);
        
        $stmt->bindValue(3, $model->estado_civil);

        $stmt->bindValue(4, $model->cpf);

        $stmt->bindValue(5, $model->cep);

        $stmt->bindValue(6, $model->email);

        $stmt->bindValue(7, $model->telefone);

        $stmt->bindValue(8, $model->data_nascimento);

        $stmt->bindValue(9, $model->observacoes);

        return (!$stmt->execute()) ? null : $model;

    }

    public function Update(ClienteModel $model) : ?ClienteModel
    {

        $sql = "UPDATE Cliente SET nome = ?, sexo = ?, estado_civil = ?, cpf = ?, cep = ?, email = ?, " .
               "telefone = ?, data_nascimento = ?, observacoes = ?, data_modificacao = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);

        $stmt->bindValue(2, $model->sexo);
        
        $stmt->bindValue(3, $model->estado_civil);

        $stmt->bindValue(4, $model->cpf);

        $stmt->bindValue(5, $model->cep);

        $stmt->bindValue(6, $model->email);

        $stmt->bindValue(7, $model->telefone);

        $stmt->bindValue(8, $model->data_nascimento);

        $stmt->bindValue(9, $model->observacoes);

        $stmt->bindValue(10, $model->data_modificacao);

        $stmt->bindValue(11, $model->id);

        return (!$stmt->execute()) ? null : $model;

    }

    public function Deactivate(int $id) : bool
    {

        $sql = "UPDATE Cliente SET ativo = 0 WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        return $stmt->execute();

    }

    public function Reactivate(int $id) : bool
    {

        $sql = "UPDATE Cliente SET ativo = 1 WHERE id = ?";

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