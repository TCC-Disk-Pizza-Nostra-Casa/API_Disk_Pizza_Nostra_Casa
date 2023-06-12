<?php

namespace Api\DAO;

use Api\Model\ProdutoModel;

class ProdutoDAO extends DAO
{
 
    public function __construct()
    {

        parent::__construct();
        
    }

    public function Insert(ProdutoModel $model) : ProdutoModel
    {

        $sql = "INSERT INTO Produto(nome, estoque, preco, observacoes) VALUES (?, ?, ?, ?);";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        
        $stmt->bindValue(2, $model->estoque);
        
        $stmt->bindValue(3, $model->preco);
        
        $stmt->bindValue(4, $model->observacoes);

        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;

    }
    
    public function Update(ProdutoModel $model) : bool
    {

        $sql = "UPDATE Produto SET nome =?, estoque =?, preco =?, observacoes =? WHERE id =?;";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        
        $stmt->bindValue(2, $model->estoque);
        
        $stmt->bindValue(3, $model->preco);
        
        $stmt->bindValue(4, $model->observacoes);
        
        $stmt->bindValue(5, $model->id);

        return $stmt->execute();
        
    }

    public function Delete(int $id) : bool
    {

        $sql = "DELETE FROM Produto WHERE id = ?;";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        return $stmt->execute();
    
    }

    public function Select() : array
    {
        
        $sql = "SELECT * FROM Produto ORDER BY nome ASC";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\ProdutoModel");

    }

    public function Search(string $value) : array
    {

        $parametro = [":filtro" => "%" . $value . "%"];

        $sql = "SELECT * FROM Produto WHERE nome LIKE :filtro ORDER BY nome ASC";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $value);

        $stmt->execute($parametro);

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\ProdutoModel");

    }

}

?>