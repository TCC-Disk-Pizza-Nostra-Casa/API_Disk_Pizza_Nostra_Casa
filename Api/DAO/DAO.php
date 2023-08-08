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

    public function automatedInsert(string $table, array $allowedColumns, object $model) : bool
    {
        /* Automação de inserções banco de dados*/

        $insert = $this->buildInsertStatement($table, $allowedColumns);

        $stmt = $this->conexao->prepare($insert);

        $this->bindValuesToStatement($stmt, $allowedColumns, $model);
        
        return $stmt->execute();
      
    }

    public function buildInsertStatement(string $table, array $allowedColumns) : string
    {
        /** constrói inserção do sql */

        $column = implode(",", $allowedColumns);
        /* string com campos; exemplo:  (id_cliente, id_venda)*/

        $placeholderList = array_fill(0, count($allowedColumns), "?");
        $placeholderString = implode(",", $placeholderList);
        /* forma string com os marcadores que serão substituídos. Exemplo: (?, ?) */

        $insert = "INSERT INTO " . $table . " (" . $column . ") values (" . $placeholderString . ")";

        return $insert;
    }

    public function automatedUpdate(string $table, array $allowedColumns, object $model) : bool
    {
        /* Automação de atualização no banco de dados. */

        $update = $this->buildUpdateStatement($table, $allowedColumns);

        $stmt = $this->conexao->prepare($update);

        $this->bindValuesToStatement($stmt, $allowedColumns, $model);

        return $stmt->execute();
    }

    public function buildUpdateStatement(string $table, array $columnsToUpdate) : string
    {
        $column = "";

        $index = (count($columnsToUpdate)) - 1;
        foreach ($columnsToUpdate as $field){
            if ($field <> "id"){
                if ($index != 1){
                    $column .= $field . "=?, ";
               }else{
                    $column .= $field . "=? ";
                }
            }

            $index --;
        }

        $update = "UPDATE " . $table . " SET " . $column . "where id = ? ";
        
        return $update;

    }


    public function bindValuesToStatement(PDOStatement $stmt, array $columnList, object $valueObject) : void
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