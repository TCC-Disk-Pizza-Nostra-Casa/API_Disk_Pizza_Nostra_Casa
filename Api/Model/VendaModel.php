<?php

namespace Api\Model;

use Api\DAO\VendaDAO;

class VendaModel extends Model
{

    public $id, $delivery, $valor_total, $observacoes, $data_venda, $ativo, $fk_funcionario, $fk_cliente;

    public function Save()
    {

        return (new VendaDAO())->Insert($this);

    }

    public function Enable(int $id)
    {

        return (new VendaDAO())->Reactivate($id);

    }

    public function Disable(int $id)
    {

        return (new VendaDAO())->Deactivate($id);

    }

    public function GetRows(?int $id_funcionario = null, ?int $id_cliente = null, ?string $data_venda = null)
    {

        $this->rows = ($id_funcionario != null && $id_cliente != null) ? (new VendaDAO())->Search($id_funcionario, $id_cliente, $data_venda) : (new VendaDAO())->Select();

    }

}