<?php

namespace Api\Controller;

use Api\Model\{
    VendaProdutoAssocModel
};

use Exception;

class VendaProdutoAssocController extends Controller
{

    public static function SearchByIdAsyncVendaProdutoAssoc(): void
    {
        try {

            $id = self::getDataFromRequest();
            parent::SendReturnAsJson((new VendaProdutoAssocModel())->getDetalhesVenda($id));

        } catch (Exception $ex) {

            parent::SendExceptionAsJson($ex);
        }
    }

    public static function getDataFromRequest()
    {
        return json_decode(file_get_contents("php://input"));
    }
}
