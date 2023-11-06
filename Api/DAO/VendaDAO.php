<?php

namespace Api\DAO;

use Api\Model\{
    Model,
    VendaModel,
    VendaProdutoAssocModel

};

use PDO;

class VendaDAO extends DAO
{

    public function __construct()
    {

        parent::__construct();

    }

    public function select(): array
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

    }
}