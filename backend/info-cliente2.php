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
                /*
                $persona->setRut($_GET["rut"]);
                $persona->setContrasena($_GET["pass"]);
                $persona->setNombre($_GET["nombre"]);
                $persona->setApellido($_GET["apellido"]);
                $persona->setFecha_nac($_GET["fecha_nac"]);
                $persona->setDireccion($_GET["direccion"]);
                $persona->setSexo($_GET["sexo"]);
                $persona->setTelefono($_GET["fono"]);
                $persona->setId_perfil($_GET["id"]);
                 */
                $exito = PersonaController::AgregarPersona($_GET["rut"],$_GET["pass"],
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