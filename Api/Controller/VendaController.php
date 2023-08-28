<?php

namespace Api\Controller;

use Api\Model\VendaModel;
use Exception;

class VendaController extends Controller{

    public static function SaveAsyncVenda() : void
    {
        try
        {

            $data = json_decode(file_get_contents("php://input"));

            $model = new VendaModel();
            
            parent::fillModel($model, $data);
            
            parent::SendReturnAsJson($model->save());
            
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
}

?>