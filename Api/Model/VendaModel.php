<?php

namespace Api\Model;

use Api\DAO\VendaDAO;

class VendaModel extends Model
{
    
    public $id, $delivery, $valor_total, $id_funcionario, $id_cliente, $data_venda, $id_produto, $id_venda, $quantidade_produto, $valor_item_venda;
    
    public function save() : bool
    {
        $response = ($this->id == null) ? (new VendaDAO())->insert($this) : (new VendaDAO())->update($this);

        return $response;
        
    }

    public function getRows(string $query = null)
    {
        $this->rows = ($query == null) ? (new VendaDAO)->select() : (new VendaDAO)->search($query);
    }
}

?>