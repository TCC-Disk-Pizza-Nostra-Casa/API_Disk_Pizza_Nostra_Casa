<?php

namespace Api\Model;

use Api\DAO\ClienteDAO;

class ClienteModel extends Model
{

    public $id, $nome, $sexo, $cpf, $cep, $email, $telefone;

    public $observacoes, $data_nascimento, $data_cadastro, $data_modificacao, $ativo;

    public function Save()
    {

        return ($this->id == null) ? (new ClienteDAO())->Insert($this) : (new ClienteDAO())->Update($this);

    }

    public function Enable(int $id)
    {

        return (new ClienteDAO())->Reactivate($id);

    }

    public function Disable(int $id)
    {

        return (new ClienteDAO())->Deactivate($id);

    }

    public function GetRows(string $query = null)
    {

        $dao = new ClienteDAO();

        $this->rows = ($query == null) ? $dao->Select() : $dao->Search($query);

    }

}

?>