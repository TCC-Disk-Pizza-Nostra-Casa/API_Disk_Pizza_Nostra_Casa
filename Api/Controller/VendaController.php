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

        $json_object = json_decode(file_get_contents("php://input"));

        $model = new VendaModel();

        $id_funcionario = $json_object[0];

        $id_cliente = $json_object[1];

        $model->GetRows($id_funcionario, $id_cliente);

        parent::SendReturnAsJson($model->rows);

    }

    /*public static function SaveAsyncVenda(): void
    {
        try {

            $data = self::getDataFromRequest();
            
            $Venda = new VendaModel();
            parent::fillModel($Venda, $data);

            $vendaProdutoAssoc = new VendaProdutoAssocModel();
            parent::fillModel($vendaProdutoAssoc, $data);

            parent::SendReturnAsJson($Venda->save($vendaProdutoAssoc));
        } catch (Exception $ex) {

            parent::SendExceptionAsJson($ex);
        }
    }

    public static function GetListAsyncVenda(): void
    {
        try {

            $model = new VendaModel();
            $model->getAllRows();
            parent::SendReturnAsJson($model->rows);
        } catch (Exception $ex) {

            parent::SendExceptionAsJson($ex);
        }
    }

    public static function SearchByClientAsyncVenda(): void
    {
        try {

            $filter = self::getDataFromRequest();

            $model = new VendaModel();
            
            $model->searchByClient($filter);

            parent::SendReturnAsJson($model->rows);
        } catch (Exception $ex) {

            parent::SendExceptionAsJson($ex);
        }
    }

    public static function searchByIDFunctionaryAsyncVenda(): void
    {
        try {

            $id = self::getDataFromRequest();

            $model = new VendaModel();
            
            $model->searchByIdFunctionary($id);

            parent::SendReturnAsJson($model->rows);
            
        } catch (Exception $ex) {

            parent::SendExceptionAsJson($ex);
        }
    }

    public static function SearchByDateAsyncVenda(): void
    {
        try {

            $filter = self::getDataFromRequest();

            $model = new VendaModel();
            
            $model->data_venda = $filter;
            
            $model->searchByDate();

            parent::SendReturnAsJson($model->rows);
        } catch (Exception $ex) {

            parent::SendExceptionAsJson($ex);
        }
    }

    public static function DeleteAsyncVenda(): void
    {
        try {

            $id = self::getDataFromRequest();

            $model = new VendaModel();
            $model->id = $id;

            parent::SendReturnAsJson($model->delete());
        } catch (Exception $ex) {

            parent::SendExceptionAsJson($ex);
        }
    }

    public static function getDataFromRequest()
    {
        return json_decode(file_get_contents("php://input"));
    }*/

}