<?php

namespace Api\DAO;

use Api\Model\VendaModel;

class VendaDAO extends DAO
{
    
    public function __construct()
    {

        parent::__construct();
        
    }

    public function insert(VendaModel $model) : bool
    {
        $model = $this->insertTableVenda($model);
        return $this->insertTableVenda_Produto_Assoc($model);
    }

    public function insertTableVenda(VendaModel $model) : VendaModel
    {
        $allowedColumns = [
            "delivery", "id_funcionario", "id_cliente"
        ];
        $this->automatedInsert("venda", $allowedColumns, $model);
        $model->id_venda = $this->conexao->lastInsertId();
        return $model;
    }

    public function insertTableVenda_Produto_Assoc(VendaModel $model) : bool
    {
        $response = false; 
        $allowedColumns = [
            "id_venda", "id_produto", "quantidade_produto"
        ];

        $quantidadeProduto = count($model->id_produto);
        
        for ($index = 1; $index < $quantidadeProduto; $index ++)
        {
            $objectToInsert = $model;

            $objectToInsert->id_produto = $model->id_produto[$index];
            $objectToInsert->quantidade_produto = $model->quantidade_produto[$index];
            
            $response += $this->automatedInsert("venda_produto_assoc", $allowedColumns, $objectToInsert);
        }

        return $response;
    }

    public function update(VendaModel $model) : bool
    {
        return $this->updateTableVenda($model);
    }

    public function updateTableVenda(VendaModel $model) : bool
    {
        $allowedColumns = [
            "delivery"
        ];

        return $this->automatedUpdate("Venda", $allowedColumns, $model);
    }
}

/* 
inserções para teste das tabelas da venda
insert into cliente(nome) values ("teste");
insert into funcionario(nome, senha) values ("teste", "123");
insert into produto(nome, estoque, preco) values ("teste", 1, 2); 

envio de solicitação http com envio de json para recurso /venda/save pelo curl:
 curl -X POST -H "Content-Type: application/json" -d '{"delivery": "1", "valor_total": "100", "id_funcionario": "1", "id_cliente": "1", "id_produto": ["1", "3"], "quantidade_produto": "1", "valor_item_venda": "1"}' http://localhost:8000/venda/save
*/
?>