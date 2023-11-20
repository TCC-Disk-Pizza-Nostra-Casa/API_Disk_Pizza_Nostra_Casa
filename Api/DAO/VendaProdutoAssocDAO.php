<?php

namespace Api\DAO;

use Api\Model\VendaProdutoAssocModel;

class VendaProdutoAssocDAO extends DAO
{

    public function __construct()
    {

        parent::__construct();

    }

    public function Insert(VendaProdutoAssocModel $model) : ?VendaProdutoAssocModel
    {

        $sql = "INSERT INTO Venda_Produto_Assoc(fk_venda, fk_produto, quantidade_produto, " .
               "valor_total_item_venda) VALUES(?,?,?,?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->fk_venda);

        $stmt->bindValue(2, $model->fk_produto);

        $stmt->bindValue(3, $model->quantidade_produto);

        $stmt->bindValue(4, $model->valor_total_item_venda);

        return (!$stmt->execute()) ? null : $model;

    }

    public function Deactivate(int $id) : bool
    {

        $sql = "UPDATE Venda_Produto_Assoc SET ativo = 0 WHERE fk_venda = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        return $stmt->execute();

    }

    public function Reactivate(int $id) : bool
    {

        $sql = "UPDATE Venda_Produto_Assoc SET ativo = 1 WHERE fk_venda = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        return $stmt->execute();

    }

    public function Search(int $id_venda) : array
    {

        $sql = "SELECT * FROM Venda_Produto_Assoc WHERE fk_venda = ? ORDER BY fk_produto ASC";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id_venda);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\VendaProdutoAssocModel");

    }

}