<?php

namespace Api\Model;

use Api\DAO\FornecedorDAO;

class FornecedorModel extends Model
{

    public $id, $nome, $cnpj, $telefone, $data_cadastro, $data_modificacao, $ativo;

    public function Save()
    {

        return ($this->id == null) ? (new FornecedorDAO())->Insert($this) : (new FornecedorDAO())->Update($this);

    }

    public function Enable(int $id)
    {

        return (new FornecedorDAO())->Reactivate($id);

    }

    public function Disable(int $id)
    {

        return (new FornecedorDAO())->Deactivate($id);

    }

    public function GetRows(string $query = null)
    {

        $dao = new FornecedorDAO();

        $this->rows = ($query == null) ? $dao->Select() : $dao->Search($query);

    }

}

?>