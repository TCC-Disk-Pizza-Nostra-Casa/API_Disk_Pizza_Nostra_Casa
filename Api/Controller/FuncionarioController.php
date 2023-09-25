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

            $model->genero = $json_object->genero;

            $model->estado_civil = $json_object->estado_civil;

            $model->cpf = str_replace([".","-"], "", $json_object->cpf);

            $model->rg = str_replace([".","-"], "", $json_object->rg);

            $model->cep = str_replace([".","-"], "", $json_object->cep);

            $model->email = $json_object->email;

            $model->telefone = str_replace(["(",")"," ","-"], "", $json_object->telefone);

            $model->senha = $json_object->senha;

            $model->observacoes = $json_object->observacoes;

            $model->data_modificacao = $json_object->data_modificacao;

            $model->administrador = $json_object->administrador;

            $model->ativo = $json_object->ativo;

            parent::SendReturnAsJson($model->Save());

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function EnableAsyncFuncionario() : void
    {

        try
        {

            $id = json_decode(file_get_contents("php://input"));

            parent::SendReturnAsJson((new FuncionarioModel())->Enable((int) $id));

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function DisableAsyncFuncionario() : void
    {

        try
        {

            $id = json_decode(file_get_contents("php://input"));

            parent::SendReturnAsJson((new FuncionarioModel())->Disable((int) $id));

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

    public static function LoginAsyncFuncionario() : void
    {

        $json_object = json_decode(file_get_contents("php://input"));

        $model = new FuncionarioModel();

        $cpf = $json_object[0];

        $senha = $json_object[1];

        $model->LoginValidation($cpf, $senha);

        parent::SendReturnAsJson($model->rows);

    }

}

?>