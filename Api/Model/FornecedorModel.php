<?php

namespace Api\Model;

use Api\DAO\FornecedorDAO;

class FornecedorModel extends Model
{

    public $id, $nome, $cnpj, $email, $telefone, $observacoes, $data_cadastro, $data_modificacao, $ativo;

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

        $this->rows = ($query == null) ? (new FornecedorDAO())->Select() : (new FornecedorDAO())->Search($query);

    }

}

?>