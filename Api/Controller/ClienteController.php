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

            $model->sexo = $json_object->sexo;

            $model->estado_civil = $json_object->estado_civil;

            $model->cpf = str_replace([".","-"], "", $json_object->cpf);

            $model->cep = str_replace("-", "", $json_object->cep);

            $model->email = $json_object->email;

            $model->telefone = str_replace(["(",")"," ","-"], "", $json_object->telefone);

            $model->data_nascimento = $json_object->data_nascimento;

            $model->observacoes = $json_object->observacoes;

            $model->data_modificacao = $json_object->data_modificacao;

            $model->ativo = $json_object->ativo;

            parent::SendReturnAsJson($model->Save());

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function EnableAsyncCliente() : void
    {

        try
        {

            $id = json_decode(file_get_contents("php://input"));

            parent::SendReturnAsJson((new ClienteModel())->Enable((int) $id));

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function DisableAsyncCliente() : void
    {

        try
        {

            $id = json_decode(file_get_contents("php://input"));

            parent::SendReturnAsJson((new ClienteModel())->Disable((int) $id));

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