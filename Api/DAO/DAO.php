<?php

namespace Api\DAO;

use \PDO;
use Exception;
use PDOException;

abstract class DAO extends PDO
{

    protected $conexao;

    protected function __construct()
    {

        try
        {

            $dsn = "mysql:host=" . $_ENV["db"]["host"] . ";dbname=" . $_ENV["db"]["database_name"];

            $user = $_ENV["db"]["user"];

            $passowrd = $_ENV["db"]["password"];

            $options = [

                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"

            ];

            $this->conexao = new PDO($dsn, $user, $passowrd, $options);

        }

        catch(PDOException $ex)
        {

            throw new Exception("Ocorreu um erro!", 0, $ex);

        }

    }

}

?>