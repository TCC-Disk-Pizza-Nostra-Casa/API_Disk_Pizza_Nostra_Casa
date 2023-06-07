<?php

use Api\Controller\FuncionarioController;

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

switch($url)
{

    case "/":
        echo "Início.";
    break;

    case "/funcionario/save":
        FuncionarioController::SaveAsyncFuncionario();
    break;

    case "/funcionario/delete":
        FuncionarioController::DeleteAsyncFuncionario();
    break;

    case "/funcionario/list":
        FuncionarioController::GetListAsyncFuncionario();
    break;

    case "/funcionario/search":
        FuncionarioController::SearchAsyncFuncionario();
    break;

    default:
        //echo "Erro 404!";
        http_response_code(404);
    break;
    
}

?>