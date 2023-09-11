<?php

namespace Api\Model;

use Api\DAO\ClienteDAO;

class ClienteModel extends Model
{

    public $id, $nome, $email, $telefone, $ativo;

    public function Save()
    {

        return ($this->id == null) ? (new ClienteDAO())->Insert($this) : (new ClienteDAO())->Update($this);

    }

    public function Erase(int $id)
    {

        return (new ClienteDAO())->Delete($id);

    }

    public function GetRows(string $query = null)
    {

        $dao = new ClienteDAO();

        $this->rows = ($query == null) ? $dao->Select() : $dao->Search($query);

    }

}

?>