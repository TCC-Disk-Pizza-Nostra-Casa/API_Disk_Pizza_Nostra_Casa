<?php

use Api\Controller\
{

    FuncionarioController,
    ClienteController,
    ProdutoController,
    VendaController,
    FornecedorController

};

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

switch($url)
{

    case "/":
        echo "Início.";
    break;

    // Módulo - Funcionário:

    case "/funcionario/save":
        FuncionarioController::SaveAsyncFuncionario();
    break;

    case "/funcionario/enable":
        FuncionarioController::EnableAsyncFuncionario();
    break;

    case "/funcionario/disable":
        FuncionarioController::DisableAsyncFuncionario();
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

    // Módulo - Cliente:

    case "/cliente/save":
        ClienteController::SaveAsyncCliente();
    break;

    case "/cliente/enable":
        ProdutoController::EnableAsyncProduto();
    break;

    case "/cliente/delete":
        ClienteController::DisableAsyncCliente();
    break;

    case "/cliente/list":
        ClienteController::GetListAsyncCliente();
    break;

    case "/cliente/search":
        ClienteController::SearchAsyncCliente();
    break;

    // Módulo - Produto:

    case "/produto/save":
        ProdutoController::SaveAsyncProduto();
    break;

    case "/produto/enable":
        ProdutoController::EnableAsyncProduto();
    break;

    case "/produto/disable":
        ProdutoController::DisableAsyncProduto();
    break;

    case "/produto/list":
        ProdutoController::GetListAsyncProduto();
    break;

    case "/produto/search":
        ProdutoController::SearchAsyncProduto();
    break;

    // Módulo - Venda:

    case "/venda/save":
        VendaController::SaveAsyncVenda();
    break;

    case "/venda/delete":
        VendaController::DeleteAsyncVenda();
    break;

    case "/venda/list":
        VendaController::GetListAsyncVenda();
    break;

    case "/venda/search":
        VendaController::SearchAsyncVenda();
    break;

    // Módulo - Fornecedor:

    case "/fornecedor/save":
        FornecedorController::SaveAsyncFornecedor();
    break;

    case "/fornecedor/enable":
        FornecedorController::EnableAsyncFornecedor();
    break;

    case "/fornecedor/disable":
        FornecedorController::DisableAsyncFornecedor();
    break;

    case "/fornecedor/list":
        FornecedorController::GetListAsyncFornecedor();
    break;
    
    case "/fornecedor/search":
        FornecedorController::SearchAsyncFornecedor();
    break;

    default:
        //echo "Erro 404!";
        http_response_code(404);
    break;
    
}

?>