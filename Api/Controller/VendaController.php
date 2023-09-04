<?php

namespace Api\Controller;

use Api\Model\VendaModel;
use Api\Model\VendaProdutoAssocModel;
use Exception;

class VendaController extends Controller{

    public static function SaveAsyncVenda() : void
    {
        try
        {

            $data = json_decode(file_get_contents("php://input"));

            $Venda = new VendaModel();
            parent::fillModel($Venda, $data);

            $vendaProdutoAssoc = new VendaProdutoAssocModel();
            parent::fillModel($vendaProdutoAssoc, $data);

            parent::SendReturnAsJson($Venda->save($vendaProdutoAssoc));
            
        }
        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }
    }

    public static function GetListAsyncVenda() : void
    {
        try
        {

            $model = new VendaModel();
            $model->getRows();
            parent::SendReturnAsJson($model->rows);

        }
        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }
    }
    
    public static function SearchAsyncVenda() : void
    {

    }
}

?>