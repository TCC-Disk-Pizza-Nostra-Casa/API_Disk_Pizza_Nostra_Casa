<?php

namespace Api\Controller;

use Api\Model\ClienteModel;

use Exception;

class ClienteController extends Controller
{

    public static function SaveAsyncCliente() : void
    {

        try
        {

            $json_object = json_decode(file_get_contents("php://input"));

            $model = new ClienteModel();

            $model->id = $json_object->id;
            $model->nome = $json_object->nome;
            $model->email = $json_object->email;
            $model->telefone = $json_object->telefone;

            parent::SendReturnAsJson($model->Save());

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function DeleteAsyncCliente() : void
    {

        try
        {

            $id = json_decode(file_get_contents("php://input"));

            parent::SendReturnAsJson((new ClienteModel())->Erase((int) $id));

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function GetListAsyncCliente() : void
    {

        try
        {

            $model = new ClienteModel();

            $model->GetRows();

            parent::SendReturnAsJson($model->rows);

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function SearchAsyncCliente() : void
    {

        try
        {

            $filtro = json_decode(file_get_contents("php://input"));

            $model = new ClienteModel();

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