<?php

namespace Api\DAO;

use \PDO;
use Exception;
use PDOException;
use PDOStatement;

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

    public function autoInsert(string $table, array $allowedColumns, object $model) : bool
    {
        /* Automação de inserções banco de dados*/

        $column = implode(",", $allowedColumns);
        /* string com campos; exemplo:  (id_cliente, id_venda)*/

        $placeholderList = array_fill(0, count($allowedColumns), "?");
        $placeholderString = implode(",", $placeholderList);
        /* forma string com os marcadores que serão substituídos. Exemplo: (?, ?) */

        $insert = "INSERT INTO " . $table . " (" . $column . ") values (" . $placeholderString . ")";

        $stmt = $this->conexao->prepare($insert);

        $this->autoBind($stmt, $allowedColumns, $model);
        
        return $stmt->execute();
    }

    public function autoBind(PDOStatement $stmt, array $columnList, object $valueObject) : void
    {
        /* Automação de declarações preparadas (prepared statements) */
        /* $valueObject é um objeto com dados que serão atribuídos */

        $index = 1;
        foreach ($columnList as $value){
            $attributeName = strtolower($value);
            $stmt->bindValue($index++, $valueObject->$attributeName);
        }
    }

}

?>