<?php

namespace Api\Model;

use Api\DAO\ProdutoDAO;

class ProdutoModel extends Model
{
    
    public $id, $nome, $estoque, $preco, $observacoes;
    
    public function Save() : ?ProdutoModel
    {

        return ($this->id == null) ? (new ProdutoDAO())->Insert($this) : (new ProdutoDAO())->Update($this);

        /*if($this->id == null)
        {

            return (new ProdutoDAO())->Insert($this);  

        }

        else
        {

            return (new ProdutoDAO())->Update($this);

        }*/

    }

    public function Delete(int $id)
    {

        return (new ProdutoDAO())->Delete($id);

    }

    public function GetRows(string $query = null)
    {

        $this->rows = ($query == null) ? (new ProdutoDAO())->Select() : (new ProdutoDAO())->Search($query);

    }
}

?>