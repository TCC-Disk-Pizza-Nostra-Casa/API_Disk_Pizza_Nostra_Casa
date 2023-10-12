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

        $sql = "INSERT INTO Produto(nome, estoque, preco, tamanho, categoria, observacoes, fk_fornecedor) " .
               "VALUES (?,?,?,?,?,?,?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        
        $stmt->bindValue(2, $model->estoque);
        
        $stmt->bindValue(3, $model->preco);

        $stmt->bindValue(4, $model->tamanho);

        $stmt->bindValue(5, $model->categoria);
        
        $stmt->bindValue(6, $model->observacoes);

        $stmt->bindValue(7, $model->fk_fornecedor);

        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;

    }
    
    public function Update(ProdutoModel $model) : ?ProdutoModel
    {

        $sql = "UPDATE Produto SET nome = ?, estoque = ?, preco = ?, " .
               "tamanho = ?, categoria = ?, observacoes = ?, fk_fornecedor = ?, " .
               "data_modificacao = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        
        $stmt->bindValue(2, $model->estoque);
        
        $stmt->bindValue(3, $model->preco);

        $stmt->bindValue(4, $model->tamanho);

        $stmt->bindValue(5, $model->categoria);
        
        $stmt->bindValue(6, $model->observacoes);

        $stmt->bindValue(7, $model->fk_fornecedor);

        $stmt->bindValue(8, $model->data_modificacao);

        $stmt->bindValue(9, $model->id);

        return ($stmt->execute()) ? $model : null;
        
    }

    public function Deactivate(int $id) : bool
    {

        $sql = "UPDATE Produto SET ativo = 0 WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        return $stmt->execute();

    }

    public function Reactivate(int $id) : bool
    {

        $sql = "UPDATE Produto SET ativo = 1 WHERE id = ?";

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

        $stmt->execute($parametro);

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\ProdutoModel");

    }

}

?>