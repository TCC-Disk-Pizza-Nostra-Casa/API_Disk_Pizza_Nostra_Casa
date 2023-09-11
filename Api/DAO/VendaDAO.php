<?php

namespace Api\DAO;

use Api\Model\VendaModel;
use Api\Model\VendaProdutoAssocModel;
use PDO;

class VendaDAO extends DAO
{
    
    public function __construct()
    {

        parent::__construct();
        
    }

    public function select()
    {
        $sql = "select v.id, data_venda, delivery, valor_total, f.nome as funcionario, c.nome as cliente, p.nome as produto, vp.quantidade_produto, vp.valor_total_item_venda from Venda as v join Venda_Produto_Assoc as vp on v.id = vp.id_venda join Produto as p on vp.id_produto = p.id join Cliente as c on v.id_cliente = c.id join Funcionario as f on v.id_funcionario = v.id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        
        $response = $stmt->fetchAll(PDO::FETCH_CLASS);

        foreach($response as $result){
            
        }
        
        exit(var_dump($response));
    }

    public function search(string $query){

    }

    public function insert(VendaModel $modelVenda, VendaProdutoAssocModel $modelVendaProdutoAssocModel) : bool
    {
        
        $allowedColumns = [
            "delivery", "id_funcionario", "id_cliente", "valor_total"
        ];

        $response = $this->automatedInsert("Venda", $allowedColumns, $modelVenda);

        $modelVenda->id = $this->conexao->lastInsertId();

        $modelVendaProdutoAssocModel->id_venda = $modelVenda->id;

        return $response;
    }

    public function update(VendaModel $model) : bool
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
    "id_funcionario": "1",
    "id_cliente": "1",
    "id_produto": ["1", "2"],
    "quantidade_produto": ["100", "200"],
    "valor_total": "600",
    "valor_total_item_venda": ["200", "400"]
}' http://localhost:8000/venda/save

*/

?>