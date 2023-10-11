<?php

namespace Api\Controller;

use Api\Model\ProdutoModel;

use Exception;

class ProdutoController extends Controller
{

    public static function SaveAsyncProduto()
    {
        
        try 
        {
            $json_object = json_decode(file_get_contents("php://input"));

            $model = new ProdutoModel();

            if($json_object->id != null)
            {

                $model->id = $json_object->id;

            }

            $model->nome = $json_object->nome;
            
            $model->estoque = $json_object->estoque;
            
            $model->preco = doubleval(str_replace(["'", '"', "(", ")", "[", "]", ":", "?", "/"], "", (string) $json_object->preco));

            $model->tamanho = $json_object->tamanho;

            $model->categoria = $json_object->categoria;
            
            $model->observacoes = $json_object->observacoes;

            $model->data_modificacao = $json_object->data_modificacao;

            $model->fk_fornecedor = $json_object->fk_fornecedor;

            $model->ativo = $json_object->ativo;

            parent::SendReturnAsJson($model->Save());

        } 
        
        catch(Exception $ex) 
        {
            
            parent::SendExceptionAsJson($ex);

        }

    }

    public static function EnableAsyncProduto() : void
    {

        try
        {

            $id = json_decode(file_get_contents("php://input"));

            parent::SendReturnAsJson((new ProdutoModel())->Enable((int) $id));

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function DisableAsyncProduto() : void
    {

        try
        {

            $id = json_decode(file_get_contents("php://input"));

            parent::SendReturnAsJson((new ProdutoModel())->Disable((int) $id));

        }

        catch(Exception $ex)
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
        
        catch(Exception $ex) 
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
        
        catch(Exception $ex) 
        {
            
            parent::SendExceptionAsJson($ex);

        }

    }
    
}

?>