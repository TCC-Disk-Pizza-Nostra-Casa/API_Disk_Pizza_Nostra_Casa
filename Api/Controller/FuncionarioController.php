<?php

namespace Api\Controller;

use Api\Model\FuncionarioModel;
use Exception;

class FuncionarioController extends Controller
{
    
    public static function SaveAsyncFuncionario() : void
    {

        try
        {

            $json_object = json_decode(file_get_contents("php://input"));

            $model = new FuncionarioModel();

            $model->id = $json_object->id;

            $model->nome = $json_object->nome;

            $model->email = $json_object->email;

            $model->administrador = $json_object->administrador;

            $model->data_cadastro = $json_object->data_cadastro;

            parent::SendReturnAsJson($model->Save());

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function DeleteAsyncFuncionario() : void
    {

        try
        {

            $id = json_decode(file_get_contents("php://input"));

            parent::SendReturnAsJson((new FuncionarioModel())->Erase((int) $id));

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function GetListAsyncFuncionario() : void
    {

        try
        {

            $model = new FuncionarioModel();

            $model->GetRows();

            parent::SendReturnAsJson($model->rows);

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function SearchAsyncFuncionario() : void
    {

        try
        {

            $filtro = json_decode(file_get_contents("php://input"));

            $model = new FuncionarioModel();

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