<?php

namespace Api\Model;

use Api\DAO\VendaProdutoAssocDAO;

class VendaProdutoAssocModel extends Model
{

    public $fk_produto, $fk_venda, $quantidade_produto, $valor_total_item_venda;

    public function save() : bool
    {

        $dao = new VendaProdutoAssocDAO();
        return $dao->insert($this);

    }

}