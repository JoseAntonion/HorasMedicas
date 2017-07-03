<?php


include __DIR__ ."/controller/ClienteControlador.php";


    if($_SERVER["REQUEST_METHOD"]=="GET") {
        if(isset($_GET["id"])) {
            $id = $_GET["id"];
            $json = ClienteControlador::getInfoCliente($id);
            echo $json;
        } else {
            echo "{\"error\": \"solictud incorrecta, no se ha enviado el parámetro 'id' del cliente\"";
            exit;
        }        
    } else {
        echo "{\"error\": \"el método de la solicitud no está permitido\"";
        exit;
    }