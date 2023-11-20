<?php

namespace Api\Controller;

use Api\Model\VendaProdutoAssocModel;

use Exception;

class VendaProdutoAssocController extends Controller
{

    public static function SaveAsyncVendaProdutoAssoc()
    {
        
        try 
        {
            $json_object = json_decode(file_get_contents("php://input"));

            $model = new VendaProdutoAssocModel();

            $model->fk_venda = $json_object->fk_venda;

            $model->fk_produto = $json_object->fk_produto;

            $model->quantidade_produto = $json_object->quantidade_produto;

            $model->valor_total_item_venda = $json_object->valor_total_item_venda;

            $model->ativo = $json_object->ativo;

            parent::SendReturnAsJson($model->Save());

        } 
        
        catch(Exception $ex) 
        {
            
            parent::SendExceptionAsJson($ex);

        }

    }

    public static function EnableAsyncVendaProdutoAssoc() : void
    {

        try
        {

            $id = json_decode(file_get_contents("php://input"));

            parent::SendReturnAsJson((new VendaProdutoAssocModel())->Enable((int) $id));

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function DisableAsyncVendaProdutoAssoc() : void
    {

        try
        {

            $id = json_decode(file_get_contents("php://input"));

            parent::SendReturnAsJson((new VendaProdutoAssocModel())->Disable((int) $id));

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function SearchAsyncVendaProdutoAssoc() : void
    {

        try
        {

            $id = json_decode(file_get_contents("php://input"));

            $model = new VendaProdutoAssocModel();

            $model->GetRows($id);

            parent::SendReturnAsJson($model->rows);

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

}