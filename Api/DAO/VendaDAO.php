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
        $this->automatedInsert("Venda", $allowedColumns, $model);
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

        for ($index = 0; $index < $quantidadeProduto; $index ++)
        {
            $objectToInsert = clone $model;

            $objectToInsert->id_produto = $model->id_produto[$index];
            $objectToInsert->quantidade_produto = $model->quantidade_produto[$index];
            
            $response += $this->automatedInsert("Venda_Produto_Assoc", $allowedColumns, $objectToInsert);
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
            "delivery", "id"
        ];
      
        return $this->automatedUpdate("Venda", $allowedColumns, $model);
    }

}

/* 

inserções para teste das tabelas da venda:
insert into Cliente(nome, cpf) values ("teste", "12345678909");
insert into Funcionario(nome, senha, cpf, rg, cep, cargo, telefone) values ("teste", "123", "12345678909", "123456789", "17209233", "balconista", "996592724");
insert into Produto(nome, estoque, preco) values ("teste", 1, 2);
insert into Produto(nome, estoque, preco) values ("asdf", 1, 2);

envio de solicitação http com envio de json para api para o recurso /venda/save pelo curl:
curl -X POST -H "Content-Type: application/json" -d '{
    "delivery": "1",
    "valor_total": "100",
    "id_funcionario": "1",
    "id_cliente": "1",
    "id_produto": ["1", "2"],
    "quantidade_produto": ["1", "2"],
    "valor_item_venda": "1"
}' http://localhost:8000/venda/save

*/

?>