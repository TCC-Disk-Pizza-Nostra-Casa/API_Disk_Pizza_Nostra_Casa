<?php

namespace Api\Model;

use Api\DAO\ProdutoDAO;

class ProdutoModel extends Model
{
    
    public $id, $nome, $estoque, $preco, $observacoes, $data_cadastro, $data_modificacao, $fk_fornecedor;
    
    public function Save()
    {

        return ($this->id == null) ? (new ProdutoDAO())->Insert($this) : (new ProdutoDAO())->Update($this);

    }

    public function Enable(int $id)
    {

        return (new ProdutoDAO())->Reactivate($id);

    }

    public function Disable(int $id)
    {

        return (new ProdutoDAO())->Deactivate($id);

    }

    public function GetRows(string $query = null)
    {

        $this->rows = ($query == null) ? (new ProdutoDAO())->Select() : (new ProdutoDAO())->Search($query);

    }

}

?>