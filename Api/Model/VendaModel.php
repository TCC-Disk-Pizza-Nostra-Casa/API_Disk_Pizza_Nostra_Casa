<?php

namespace Api\Model;

use Api\DAO\VendaDAO;

class VendaModel extends Model
{

    public $id, $delivery, $valor_total, $fk_funcionario, $fk_cliente, $data_venda;

    public function save(VendaProdutoAssocModel $modelVendaProdutoAssocModel): bool
    {
        if ($this->id == null){
            $response = (new VendaDAO())->insert($this, $modelVendaProdutoAssocModel);
            $response += $modelVendaProdutoAssocModel->save();
        }
        else
        {
            $response = (new VendaDAO())->update($this);
        }
        
        return $response;
    }

    public function getRows(string $query = null) : void
    {
        $this->rows = ($query == null) ? (new VendaDAO)->select() : (new VendaDAO)->search($query);
    }

    public function delete() : bool
    {
        return (new VendaDAO)->delete($this);
    }
}
