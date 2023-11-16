<?php

namespace Api\Controller;

use Api\Model\FornecedorModel;

use Exception;

class FornecedorController extends Controller
{

    public static function SaveAsyncFornecedor() : void
    {

        try
        {

            $json_object = json_decode(file_get_contents("php://input"));

            $model = new FornecedorModel();

            $model->id = $json_object->id;

            $model->nome = $json_object->nome;

            $model->cnpj = str_replace([".","-","/"], "", $json_object->cnpj);

            $model->email = $json_object->email;

            $model->telefone = str_replace(["(",")"," ","-"], "", $json_object->telefone);

            $model->observacoes = $json_object->observacoes;

            $model->data_cadastro = $json_object->data_cadastro;

            $model->data_modificacao = $json_object->data_modificacao;

            $model->ativo = $json_object->ativo;

            parent::SendReturnAsJson($model->Save());

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function EnableAsyncFornecedor() : void
    {

        try
        {

            $id = json_decode(file_get_contents("php://input"));

            parent::SendReturnAsJson((new FornecedorModel())->Enable((int) $id));

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function DisableAsyncFornecedor() : void
    {

        try
        {

            $id = json_decode(file_get_contents("php://input"));

            parent::SendReturnAsJson((new FornecedorModel())->Disable((int) $id));

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function GetListAsyncFornecedor() : void
    {

        try
        {

            $model = new FornecedorModel();

            $model->GetRows();

            parent::SendReturnAsJson($model->rows);

        }

        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }

    }

    public static function SearchAsyncFornecedor() : void
    {

        try
        {

            $filtro = json_decode(file_get_contents("php://input"));

            $model = new FornecedorModel();

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