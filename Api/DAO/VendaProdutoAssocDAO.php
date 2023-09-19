<?php

namespace Api\DAO;

use Api\Model\VendaProdutoAssocModel;
use PDO;

class VendaProdutoAssocDAO extends DAO{

    public function __construct()
    {
        parent::__construct();
    }

    public function select(int $id_venda) : array
    {
        $sql = "SELECT 
                    v.id_venda, 
                    p.nome as produto, 
                    v.quantidade_produto, 
                    v.valor_total_item_venda 
                FROM Venda_Produto_Assoc AS v 
                    JOIN Produto AS p ON v.id_produto = p.id 
                WHERE id_venda = ?";
       
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id_venda);

        $stmt->execute();

        $response = $stmt->fetchAll(PDO::FETCH_CLASS);

        return $response;
    }

    public function insert(VendaProdutoAssocModel $model) : bool
    {
        $response = false;

        $sql = "INSERT INTO Venda_Produto_Assoc (id_venda, id_produto, quantidade_produto, valor_total_item_venda) VALUES (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $quantidadeProduto = count($model->id_produto);
        for ($index = 0; $index < $quantidadeProduto; $index ++)
        {
            $stmt->bindValue(1, $model->id_venda);
            $stmt->bindValue(2, $model->id_produto[$index]);
            $stmt->bindValue(3, $model->quantidade_produto[$index]);
            $stmt->bindValue(4, $model->valor_total_item_venda[$index]);
            
            $response += $stmt->execute();
        }

        return $response;
    }

}
