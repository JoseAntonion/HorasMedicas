<?php

include __DIR__ . "/controller/PersonaController.php";


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["opcion"])) {
        switch ($_GET["opcion"]) {
            case 1:
                $json = PersonaController::BuscarPorIdJSON($_GET["id"]);
                echo $json;
                break;
            case 2:
                $exito = PersonaController::AgregarPersona($_GET["rut"],$_GET["pass"],
                        $_GET["nombre"],$_GET["apellido"],$_GET["fecha_nac"],$_GET["direccion"],
                        $_GET["sexo"],$_GET["fono"],$_GET["id"]);
                echo $exito;
                break;
            case 3:

                $exito = PersonaController::ModificarPersona($_GET["rut"],$_GET["pass"],
                        $_GET["nombre"],$_GET["apellido"],$_GET["fecha_nac"],$_GET["direccion"],
                        $_GET["sexo"],$_GET["fono"],$_GET["id"]);
                echo $exito;
                break;
            default:
                break;
        }
    }else {
        echo "{\"error\": \"solictud incorrecta, no se ha enviado el parámetro 'opcion' correctamente\"";
        exit;
    }
} else {
    echo "{\"error\": \"el método de la solicitud no está permitido\"";
    exit;
}