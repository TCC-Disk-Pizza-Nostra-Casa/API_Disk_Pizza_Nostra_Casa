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

    public function insertTableVenda(VendaModel $model) : VendaModel{
        $allowedColumns = [
            "delivery", "valor_total", "id_funcionario", "id_cliente"
        ];
        $this->automatedInsert("venda", $allowedColumns, $model);
        $model->id_venda = $this->conexao->lastInsertId();
        return $model;
    }

    public function insertTableVenda_Produto_Assoc(VendaModel $model) : bool{
        $allowedColumns = [
            "id_venda", "id_produto", "quantidade_produto", "valor_item_venda"
        ];

        return $this->automatedInsert("venda_produto_assoc", $allowedColumns, $model);
    }
}

/* 
inserções para teste das tabelas da venda
insert into cliente(nome) values ("teste");
insert into funcionario(nome, senha) values ("teste", "123");
insert into produto(nome, estoque, preco) values ("teste", 1, 2); 

envio de solicitação http com envio de json para recurso /venda/save pelo curl:
curl -X POST -H "Content-Type: application/json" -d '{"delivery": "1", "valor_total": "100", "id_funcionario": "1", "id_cliente": "1", "id_produto": "1", "quantidade_produto": "1", "valor_item_venda": "1"}' http://localhost:8000/venda/save
*/
?>