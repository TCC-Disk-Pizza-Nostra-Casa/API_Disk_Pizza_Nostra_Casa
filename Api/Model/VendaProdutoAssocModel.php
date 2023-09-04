<?php

namespace Api\Model;

use Api\DAO\VendaProdutoAssocDAO;

class VendaProdutoAssocModel extends Model
{

    public $id_produto, $id_venda, $quantidade_produto, $valor_item_venda;

    public function save()
    {
    
        $dao = new VendaProdutoAssocDAO();
        $dao->insertTableVenda_Produto_Assoc($this);

    }

}