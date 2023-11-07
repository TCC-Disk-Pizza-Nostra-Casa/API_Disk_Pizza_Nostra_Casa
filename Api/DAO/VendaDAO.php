<?php

namespace Api\DAO;

use Api\Model\VendaModel;

use PDO;

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

    public function Search(int $id_funcionario, int $id_cliente) : array
    {

        $sql = "SELECT * FROM Venda WHERE fk_funcionario = ? AND fk_cliente = ? ORDER BY data_venda DESC";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id_funcionario);

        $stmt->bindValue(2, $id_cliente);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\VendaModel");

    }

    /*public function select(): array
    {

        $sql = "SELECT
                    v.id,  
                    DATE_FORMAT(data_venda, '%d de %M de %Y %H:%i') AS data_venda, 
                    delivery, 
                    valor_total, 
                    f.nome AS funcionario, 
                    c.nome AS cliente
                FROM 
                    Venda AS v
                    JOIN Cliente AS c ON v.fk_cliente = c.id
                    JOIN Funcionario AS f ON v.fk_funcionario = f.id
                GROUP BY v.id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        $response = $stmt->fetchAll(PDO::FETCH_CLASS);

        return $response;
    }

    public function searchByClient(string $query): array
    {

        $filter = "%" . $query . "%";

        $sql = "SELECT
                    v.id,
                    DATE_FORMAT(data_venda, '%d de %M de %Y %H:%i') AS data_venda,
                    delivery,
                    valor_total,
                    f.nome AS funcionario,
                    c.nome AS cliente
                FROM
                    Venda AS v
                    JOIN Cliente AS c ON v.fk_cliente = c.id
                    JOIN Funcionario AS f ON v.fk_funcionario = f.id
                WHERE
                    c.nome LIKE :keyword
                GROUP BY v.id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(":keyword", $filter);
        $stmt->execute();

        $response = $stmt->fetchAll(PDO::FETCH_CLASS);

        return $response;

    }

    public function searchByIdFunctionary(string $id): array
    {

        $sql = "SELECT
                    v.id,
                    DATE_FORMAT(data_venda, '%d de %M de %Y %H:%i') AS data_venda,
                    delivery,
                    valor_total,
                    f.nome AS funcionario,
                    c.nome AS cliente
                FROM
                    Venda AS v
                    JOIN Cliente AS c ON v.fk_cliente = c.id
                    JOIN Funcionario AS f ON v.fk_funcionario = f.id
                WHERE
                    f.id = :id
                GROUP BY v.id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $response = $stmt->fetchAll(PDO::FETCH_CLASS);

        return $response;

    }

    public function searchByDate(VendaModel $model): array
    {
        $sql = "SELECT
                    v.id,
                    DATE_FORMAT(data_venda, '%d de %M de %Y %H:%i') AS data_venda,
                    delivery,
                    valor_total,
                    f.nome AS funcionario,
                    c.nome AS cliente
                FROM
                    Venda AS v
                    JOIN Cliente AS c ON v.fk_cliente = c.id
                    JOIN Funcionario AS f ON v.fk_funcionario = f.id
                WHERE
                    DATE(v.data_venda) = :dataVenda
                GROUP BY v.id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(":dataVenda", $model->data_venda);
        $stmt->execute();

        $response = $stmt->fetchAll(PDO::FETCH_CLASS);

        return $response;

    }

    public function insert(VendaModel $modelVenda, VendaProdutoAssocModel $modelVendaProdutoAssocModel): bool
    {

        $sql = "INSERT INTO Venda (delivery, fk_funcionario, fk_cliente, valor_total) VALUES (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(1, $modelVenda->delivery);
        $stmt->bindValue(2, $modelVenda->fk_funcionario);
        $stmt->bindValue(3, $modelVenda->fk_cliente);
        $stmt->bindValue(4, $modelVenda->valor_total);

        $response = $stmt->execute();

        $modelVenda->id = $this->conexao->lastInsertId();

        $modelVendaProdutoAssocModel->fk_venda = $modelVenda->id;

        return $response;

    }

    public function update(VendaModel $model): bool
    {

        $sql = "UPDATE Venda SET delivery = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(1, $model->delivery);
        $stmt->bindValue(2, $model->id);

        return $stmt->execute();

    }

    public function delete(VendaModel $model) : bool
    {

        $sql = "DELETE FROM Venda WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id);

        return $stmt->execute();

    }*/

}