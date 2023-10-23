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

    public function getAllRows() : void
    {
        $this->rows = (new VendaDAO)->select();
    }

    public function searchByClient(string $query = null) : void
    {
        $this->rows = (new VendaDAO)->searchByClient($query, $this);
    }

    public function searchByFunctionary(string $query = null) : void
    {
        $this->rows = (new VendaDAO)->searchByFunctionary($query, $this);
    }

    public function searchByDate() : void
    {
        $this->rows = (new VendaDAO)->searchByDate($this);
    }

    public function delete() : bool
    {
        return (new VendaDAO)->delete($this);
    }
}
