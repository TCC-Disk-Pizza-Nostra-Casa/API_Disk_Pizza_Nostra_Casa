<?php

namespace Api\Model;

use Api\DAO\VendaDAO;

class VendaModel extends Model
{

    public $id, $delivery, $valor_total, $id_funcionario, $id_cliente, $data_venda;

    public function save(VendaProdutoAssocModel $modelVendaProdutoAssocModel): bool
    {

        $response = ($this->id == null) ? (new VendaDAO())->insert($this, $modelVendaProdutoAssocModel) : (new VendaDAO())->update($this);

        $response += $modelVendaProdutoAssocModel->save();

        return $response;
    }

    public function getRows(string $query = null) : void
    {
        $this->rows = ($query == null) ? (new VendaDAO)->select() : (new VendaDAO)->search($query);
    }
}
