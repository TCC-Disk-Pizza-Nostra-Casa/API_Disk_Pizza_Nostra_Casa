<?php

namespace Api\Controller;

use Api\Model\VendaModel;
use Exception;

class VendaController extends Controller{

    public static function SaveAsyncVenda(){
        try{

            $data = json_decode(file_get_contents("php://input"));

            $model = new VendaModel();
            $model = parent::fillModel($model, $data);
            
            $model->save();
        }
        catch(Exception $ex)
        {

            parent::SendExceptionAsJson($ex);

        }
    }

}

?>