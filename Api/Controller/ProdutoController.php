<?php

namespace Api\Controller;

use Api\Model\ProdutoModel;

use Exception;

class ProdutoController extends Controller
{

    public static function SaveAsyncProduto() : void
    {
        
        try 
        {
        
            $json_object = json_decode(file_get_contents("php://input"));

            $model = new ProdutoModel();

            $model->id = $json_object->id;

            $model->nome = $json_object->nome;
            
            $model->estoque = $json_object->estoque;
            
            $model->preco = $json_object->preco;
            
            $model->observacoes = $json_object->observacoes;

            parent::SendReturnAsJson($model->Save());

        } 
        
        catch (Exception $ex) 
        {
            
            parent::SendExceptionAsJson($ex);

        }

    }

    public static function DeleteAsyncProduto() : void
    {
        
        try 
        {
        
            $id = json_decode(file_get_contents("php://input"));

            parent::SendReturnAsJson((new ProdutoModel())->Delete((int) $id));

        } 
        
        catch (Exception $ex) 
        {
            
            parent::SendExceptionAsJson($ex);

        }

    }

    public static function GetListAsyncProduto() : void
    {
        
        try 
        {

            $model = new ProdutoModel();

            $model->GetRows();

            parent::SendReturnAsJson($model->rows);

        } 
        
        catch (Exception $ex) 
        {
            
            parent::SendExceptionAsJson($ex);

        }

    }

    public static function SearchAsyncProduto() : void
    {
        
        try 
        {
        
            $filtro = json_decode(file_get_contents("php://input"));

            $model = new ProdutoModel();

            $model->GetRows($filtro);

            parent::SendReturnAsJson($model->rows);

        } 
        
        catch (Exception $ex) 
        {
            
            parent::SendExceptionAsJson($ex);

        }

    }
    
}

?>