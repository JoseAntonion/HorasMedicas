<?php


include __DIR__ ."/controller/PersonaController.php";


    if($_SERVER["REQUEST_METHOD"]=="POST") {
        if(isset($_POST["id"])) {
            $json = PersonaController::BuscarPorId($_POST["id"]);
            echo $json;
        } else {
            echo "{\"error\": \"solictud incorrecta, no se ha enviado el parámetro 'id' del cliente\"";
            exit;
        }        
    } else {
        echo "{\"error\": \"el método de la solicitud no está permitido\"";
        exit;
    }