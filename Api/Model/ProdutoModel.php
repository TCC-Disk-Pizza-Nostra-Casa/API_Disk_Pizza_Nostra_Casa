<?php

namespace Api\Model;

use Api\DAO\ProdutoDAO;

class ProdutoModel extends Model
{
    
    public $id, $nome, $estoque, $preco, $observacoes;
    
}

?>