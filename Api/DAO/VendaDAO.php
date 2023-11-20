<?php

namespace Api\DAO;

use Api\Model\VendaModel;
use DateTime;

class VendaDAO extends DAO
{

    public function __construct()
    {

        parent::__construct();

    }

    public function Insert(VendaModel $model) : ?VendaModel
    {

        $sql = "INSERT INTO Venda(delivery, valor_total, observacoes, " .
               "fk_funcionario, fk_cliente) VALUES(?,?,?,?,?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->delivery);

        $stmt->bindValue(2, $model->valor_total);

        $stmt->bindValue(3, $model->observacoes);

        $stmt->bindValue(4, $model->fk_funcionario);

        $stmt->bindValue(5, $model->fk_cliente);

        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;

    }

    public function Deactivate(int $id) : bool
    {

        $sql = "UPDATE Venda SET ativo = 0 WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        return $stmt->execute();

    }

    public function Reactivate(int $id) : bool
    {

        $sql = "UPDATE Venda SET ativo = 1 WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        return $stmt->execute();

    }

    public function Select() : array
    {

        $sql = "SELECT * FROM Venda ORDER BY data_venda DESC";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\VendaModel");

    }

    public function Search(int $id_funcionario, int $id_cliente, string $data_venda) : array
    {

        $sql = "SELECT * FROM Venda WHERE fk_funcionario = ? AND fk_cliente = ? AND DATE_FORMAT(data_venda, '%Y-%m-%d')  = ? ORDER BY data_venda DESC";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id_funcionario);

        $stmt->bindValue(2, $id_cliente);

        $stmt->bindValue(3, $data_venda);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\VendaModel");

    }

}