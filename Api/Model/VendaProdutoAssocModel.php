<?php

namespace Api\Model;

use Api\DAO\VendaProdutoAssocDAO;

class VendaProdutoAssocModel extends Model
{

    public $fk_venda, $fk_produto, $quantidade_produto, $valor_total_item_venda, $ativo;

    public function Save()
    {

        return (new VendaProdutoAssocDAO())->Insert($this);

    }

    public function Enable(int $id)
    {

        return (new VendaProdutoAssocDAO())->Reactivate($id);

    }

    public function Disable(int $id)
    {

        return (new VendaProdutoAssocDAO())->Deactivate($id);

    }

    public function GetRows(int $id_venda)
    {

        $this->rows = (new VendaProdutoAssocDAO())->Search($id_venda);

    }

    /*public function save() : bool
    {

        $dao = new VendaProdutoAssocDAO();
        return $dao->insert($this);

    }

    public function getDetalhesVenda(?int $id) : array
    {
        
        return (new VendaProdutoAssocDAO())->selectByFKVenda($id);

    }*/

}