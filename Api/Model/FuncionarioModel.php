<?php

namespace Api\Model;

use Api\DAO\FuncionarioDAO;

class FuncionarioModel extends Model
{
    
    public $id, $nome, $genero, $email, $telefone, $senha, $administrador, $data_cadastro;

    public function Save()
    {

        //return ($this->id == null) ? (new FuncionarioDAO())->Insert($this) : (new FuncionarioDAO())->Update($this);

        if($this->id == null)
        {

            return (new FuncionarioDAO())->Insert($this);

        }

        else
        {

            return (new FuncionarioDAO())->Update($this);

        }

    }

    public function Erase(int $id)
    {

        return (new FuncionarioDAO())->Delete($id);

    }

    public function GetRows(string $query = null)
    {

        $dao = new FuncionarioDAO();

        $this->rows = ($query == null) ? $dao->Select() : $dao->Search($query);

    }

    public function LoginValidation(string $usuario, string $senha)
    {

        $this->rows = (new FuncionarioDAO())->Login($usuario, $senha);

    }

}

?>