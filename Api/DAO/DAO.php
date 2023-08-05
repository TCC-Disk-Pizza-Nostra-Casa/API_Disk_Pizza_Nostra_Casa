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

    public function autoInsert(string $table, array $allowedColumns, object $model) : bool{
        $column = implode(",", $allowedColumns);

        $placeholderList = array_fill(0, count($allowedColumns), "?");
        $placeholderString = implode(",", $placeholderList);

        $sql = "INSERT INTO " . $table . " (" . $column . ") values (" . $placeholderString . ")";

        $stmt = $this->conexao->prepare($sql);

        //vinculando os dados na inserção
        $index = 1;
        foreach ($allowedColumns as $value){
            $attributeName = strtolower($value);
            $stmt->bindValue($index++, $model->$attributeName);
        }
        
        return $stmt->execute();
    }

}

?>