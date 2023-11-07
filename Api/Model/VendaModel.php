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

    public function GetRows(int $id_funcionario = null, int $id_cliente = null)
    {

        $this->rows = ($id_funcionario != null && $id_cliente != null) ? (new VendaDAO())->Search($id_funcionario, $id_cliente) : (new VendaDAO())->Select();

    }

    /*public function save(VendaProdutoAssocModel $modelVendaProdutoAssocModel): bool
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

    public function searchByIdFunctionary(?int $id) : void
    {
        $this->rows = (new VendaDAO)->searchByIdFunctionary($id);
    }

    public function searchByDate() : void
    {
        $this->rows = (new VendaDAO)->searchByDate($this);
    }

    public function delete() : bool
    {
        return (new VendaDAO)->delete($this);
    }*/

}