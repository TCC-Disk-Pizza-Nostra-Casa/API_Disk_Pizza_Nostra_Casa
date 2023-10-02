<?php

namespace Api\Controller;

use Api\Model\{
    VendaModel,
    VendaProdutoAssocModel
};

use Exception;

class VendaController extends Controller
{

    public static function SaveAsyncVenda(): void
    {
        try {

            $data = self::getDataFromRequest();
            
            $Venda = new VendaModel();
            parent::fillModel($Venda, $data);

            $vendaProdutoAssoc = new VendaProdutoAssocModel();
            parent::fillModel($vendaProdutoAssoc, $data);

            parent::SendReturnAsJson($Venda->save($vendaProdutoAssoc));
        } catch (Exception $ex) {

            parent::SendExceptionAsJson($ex);
        }
    }

    public static function GetListAsyncVenda(): void
    {
        try {

            $model = new VendaModel();
            $model->getRows();
            parent::SendReturnAsJson($model->rows);
        } catch (Exception $ex) {

            parent::SendExceptionAsJson($ex);
        }
    }

    public static function SearchAsyncVenda(): void
    {
        try {

            $filter = self::getDataFromRequest();

            $model = new VendaModel();
            $model->getRows($filter);

            parent::SendReturnAsJson($model->rows);
        } catch (Exception $ex) {

            parent::SendExceptionAsJson($ex);
        }
    }

    public static function DeleteAsyncVenda(): void
    {
        try {

            $id = self::getDataFromRequest();

            $model = new VendaModel();
            $model->id = $id;

            parent::SendReturnAsJson($model->delete());
        } catch (Exception $ex) {

            parent::SendExceptionAsJson($ex);
        }
    }

    public static function getDataFromRequest()
    {
        return json_decode(file_get_contents("php://input"));
    }
}
