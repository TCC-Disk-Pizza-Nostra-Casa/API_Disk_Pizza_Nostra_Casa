<?php

namespace Api\DAO;

use \PDO;

abstract class DAO extends PDO
{

    protected $conexao;

    public function __construct()
    {

        

    }

}

?>