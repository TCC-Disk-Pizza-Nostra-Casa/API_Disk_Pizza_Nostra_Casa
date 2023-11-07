<?php

use Api\Controller\
{

    FuncionarioController,
    ClienteController,
    FornecedorController,
    ProdutoController,
    VendaController,
    VendaProdutoAssocController

};

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

switch($url)
{

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

    case "/funcionario/promote":
        FuncionarioController::PromoteAsyncFuncionario();
    break;

    case "/funcionario/demote":
        FuncionarioController::DemoteAsyncFuncionario();
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
        ClienteController::EnableAsyncCliente();
    break;

    case "/cliente/disable":
        ClienteController::DisableAsyncCliente();
    break;

    case "/cliente/list":
        ClienteController::GetListAsyncCliente();
    break;

    case "/cliente/search":
        ClienteController::SearchAsyncCliente();
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

    case "/venda/enable":
        VendaController::EnableAsyncVenda();
    break;

    case "/venda/disable":
        VendaController::DisableAsyncVenda();
    break;

    case "/venda/list":
        VendaController::GetListAsyncVenda();
    break;

    case "/venda/search":
        VendaController::SearchAsyncVenda();
    break;

    // Módulo - VendaProdutoAssoc:

    case "/venda_produto/save":
        VendaProdutoAssocController::SaveAsyncVendaProdutoAssoc();
    break;

    case "/venda_produto/enable":
        VendaProdutoAssocController::EnableAsyncVendaProdutoAssoc();
    break;

    case "/venda_produto/disable":
        VendaProdutoAssocController::DisableAsyncVendaProdutoAssoc();
    break;

    case "/venda_produto/search":
        VendaProdutoAssocController::SearchAsyncVendaProdutoAssoc();
    break;

    /*case "/venda/searchByClient":
        VendaController::SearchByClientAsyncVenda();
    break;

    case "/venda/searchByIDFunctionary":
        VendaController::searchByIDFunctionaryAsyncVenda();
    break;

    case "/venda/searchByDate":
        VendaController::searchByDateAsyncVenda();
    break;

    // Módulo - VendaProdutoAssocModel:
    case "/detalhesVenda/search":
        VendaProdutoAssocController::SearchByIdAsyncVendaProdutoAssoc();
    break;*/

    // Resposta padrão:

    default:
        http_response_code(404);
    break;
    
}

?>