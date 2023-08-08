<?php

namespace Api\Model;

use Api\DAO\VendaDAO;

class VendaModel extends Model
{
    
    public $id, $delivery, $valor_total, $id_funcionario, $id_cliente, $data_venda, $id_produto, $id_venda, $quantidade_produto, $valor_item_venda;
    
    public function save() : bool
    {
      
        if ($this->id == null){
            
            return (new VendaDAO())->insert($this);

        }else{

            return (new VendaDAO())->update($this);
            
        }
        
    }
}

?>