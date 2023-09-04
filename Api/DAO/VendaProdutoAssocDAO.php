<?php

namespace Api\DAO;

use Api\Model\VendaProdutoAssocModel;

class VendaProdutoAssocDAO extends DAO{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert(VendaProdutoAssocModel $model) : bool
    {
        $response = false;

        $allowedColumns = [
            "id_venda", "id_produto", "quantidade_produto", "valor_total_item_venda"
        ];

        $quantidadeProduto = count($model->id_produto);

        for ($index = 0; $index < $quantidadeProduto; $index ++)
        {
            $objectToInsert = clone $model;

            $objectToInsert->id_produto = $model->id_produto[$index];
            $objectToInsert->quantidade_produto = $model->quantidade_produto[$index];
            $objectToInsert->valor_total_item_venda = $model->valor_total_item_venda[$index];
            
            $response += $this->automatedInsert("Venda_Produto_Assoc", $allowedColumns, $objectToInsert);
        }

        return $response;
    }

}