<?php

namespace Api\Controller;

use Exception;

abstract class Controller
{

    /*protected static function render($view, $model = null) : void
    {

        $arquivo = VIEWS . $view. ".php";

        if(file_exists($arquivo))
        {

            include $arquivo;

        }

        else
        {

            exit("Arquivo não encontrado. Arquivo chamado: " . $arquivo);

        }

    }*/

    protected static function SendReturnAsJson($dados) : void
    {

        header("Access-Control-Allow-Origin: *");
        header("Content-type: application/json; charset=utf-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Pragma: public");

        exit(json_encode($dados));

    }

    protected static function SendExceptionAsJson(Exception $ex) : void
    {

        $exception = [

            "message" => $ex->getMessage(),
            "code" => $ex->getCode(),
            "file" => $ex->getFile(),
            "line" => $ex->getLine(),
            "traceAsString" => $ex->getTraceAsString(),
            "previous" => $ex->getPrevious()

        ];

        http_response_code(400);

        header("Access-Control-Allow-Origin: *");
        header("Content-type: application/json; charset=utf-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Pragma: public");

        exit(json_encode($exception));

    }

    protected static function IsGet() : void
    {

        if($_SERVER["REQUEST_METHOD"] !== "GET")
        {

            throw new Exception("O método de requisição deve ser GET!");

        }

    }

    protected static function IsPost() : void
    {

        if($_SERVER["REQUEST_METHOD"] !== "POST")
        {

            throw new Exception("O método de requisição deve ser POST!");

        }

    }

    protected static function fillModel($model, $objectToFill): void{
        foreach ((get_object_vars($objectToFill)) as $key => $value):
            //$key => $value: separa cada variável em chave e valor, utilizando o operador de vetores "=>"

            //Nome do atributo do objeto model que receberá o seu respectivo valor
            $attributeName = strtolower($key);

            $model->$attributeName = $value;
        endforeach;
    }

}

?>