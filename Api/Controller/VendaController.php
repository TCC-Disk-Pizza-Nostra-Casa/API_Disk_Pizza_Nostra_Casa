<?php

namespace Api\Controller;

use Api\Model\VendaModel;

use Exception;

class VendaController extends Controller
{

    public static function SaveAsyncVenda()
    {
        
        try 
        {
            $json_object = json_decode(file_get_contents("php://input"));

            $model = new VendaModel();

            $model->id = $json_object->id;

            $model->delivery = $json_object->delivery;

            $model->valor_total = $json_object->valor_total;
            
            $model->observacoes = $json_object->observacoes;

            $model->fk_funcionario = $json_object->fk_funcionario;

            $model->fk_cliente = $json_object->fk_cliente;

            $model->ativo = $json_object->ativo;

            parent::SendReturnAsJson($model->Save());

        } 
        
        catch(Exception $ex) 
        {
            
            parent::SendExceptionAsJson($ex);

        }

    }

    public static function EnableAsyncVenda() : void
    {

        try
        {

            $id = json_decode(file_get_contents("php://input"));

            parent::SendReturnAsJson((new VendaModel())->Enable((int) $id));

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function DisableAsyncVenda() : void
    {

        try
        {

            $id = json_decode(file_get_contents("php://input"));

            parent::SendReturnAsJson((new VendaModel())->Disable((int) $id));

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function GetListAsyncVenda() : void
    {
        
        try 
        {

            $model = new VendaModel();

            $model->GetRows();

            parent::SendReturnAsJson($model->rows);

        } 
        
        catch(Exception $ex) 
        {
            
            parent::SendExceptionAsJson($ex);

        }

    }

    public static function SearchAsyncVenda() : void
    {

        try
        {

            $json_object = json_decode(file_get_contents("php://input"));

            $model = new VendaModel();

            $id_funcionario = $json_object[0];

            $id_cliente = $json_object[1];

            $data_venda = $json_object[2];

            $model->GetRows((int) $id_funcionario, (int) $id_cliente, $data_venda);

            parent::SendReturnAsJson($model->rows);

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

}