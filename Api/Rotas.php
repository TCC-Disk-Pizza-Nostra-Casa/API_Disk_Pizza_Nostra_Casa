<?php

use Api\Controller\FuncionarioController;
use Api\Controller\ClienteController;
use Api\Controller\ProdutoController;
use Api\Controller\VendaController;

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

    case "/funcionario/login":
        FuncionarioController::LoginAsyncFuncionario();
    break;


    case "/cliente/save":
        ClienteController::SaveAsyncCliente();
    break;

    case "/cliente/delete":
        ClienteController::DeleteAsyncCliente();
    break;

    case "/cliente/list":
        ClienteController::GetListAsyncCliente();
    break;

    case "/cliente/search":
        ClienteController::SearchAsyncCliente();
    break;


    case "/produto/save":
        ProdutoController::SaveAsyncProduto();
    break;

    case "/produto/delete":
        ProdutoController::DeleteAsyncProduto();
    break;

    case "/produto/list":
        ProdutoController::GetListAsyncProduto();
    break;

    case "/produto/search":
        ProdutoController::SearchAsyncProduto();
    break;


    case "/venda/save":
        VendaController::SaveAsyncVenda();
    break;

    default:
        //echo "Erro 404!";
        http_response_code(404);
    break;
    
}

?>