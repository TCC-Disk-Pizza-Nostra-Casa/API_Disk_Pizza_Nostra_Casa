<?php

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

switch($url)
{

    case "/":
        echo "Início.";
    break;

    default:
        //echo "Erro 404!";
        http_response_code(404);
    break;
    
}

?>