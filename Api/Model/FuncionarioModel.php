<?php

namespace Api\Model;

use Api\DAO\FuncionarioDAO;

class FuncionarioModel extends Model
{
    
    public $id, $nome, $genero, $estado_civil, $cpf, $rg, $cep, $email, $telefone, $senha;

    public $observacoes, $administrador, $data_cadastro, $data_modificacao, $ativo;

    public function Save()
    {

        return ($this->id == null) ? (new FuncionarioDAO())->Insert($this) : (new FuncionarioDAO())->Update($this);

    }

    public function Enable(int $id)
    {

        return (new FuncionarioDAO())->Reactivate($id);

    }

    public function Disable(int $id)
    {

        return (new FuncionarioDAO())->Deactivate($id);

    }

    public function GetRows(string $query = null)
    {

        $dao = new FuncionarioDAO();

        $this->rows = ($query == null) ? $dao->Select() : $dao->Search($query);

    }

    public function LoginValidation(string $cpf, string $senha)
    {

        $this->rows = (new FuncionarioDAO())->Login($cpf, $senha);

    }

}

?>