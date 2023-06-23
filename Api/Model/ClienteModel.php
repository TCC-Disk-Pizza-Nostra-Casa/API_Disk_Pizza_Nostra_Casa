<?php

namespace Api\Model;

use Api\DAO\ClienteDAO;

class ClienteModel extends Model
{

    public $id, $nome, $genero, $telefone, $data_nascimento;

    public function Save()
    {

        //return ($this->id == null) ? (new ClienteDAO())->Insert($this) : (new ClienteDAO())->Update($this);

        if($this->id == null)
        {

            return (new ClienteDAO())->Insert($this);

        }

        else
        {

            return (new ClienteDAO())->Update($this);

        }

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