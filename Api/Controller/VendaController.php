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

}

?>