<?php
session_start();
include_once __DIR__ . "/../backend/dao/DBConnection.php";
include_once __DIR__ . "/../backend/controller/PersonaController.php";

$estiloError = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtUsuario"]) && isset($_POST["txtContrasena"])) {
        $exito = PersonaController::validarPersonaClave($_POST["txtUsuario"], $_POST["txtContrasena"]);

        if ($exito) {
            $estiloError = "";
            $error = "";
            header("location:MenuPrincipal.php");
            return;
        } else {
            $estiloError = "alert alert-danger";
            $error = "Usuario y/o Contraseña incorrecta";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="/HorasMedicas/frontend/css/bootstrap.min.css" rel="stylesheet">
        <link href="/HorasMedicas/frontend/css/bootstrap.min.css" rel="stylesheet">
        <link href="/HorasMedicas/frontend/css/bootstrap-theme.css" rel="stylesheet">
        <link href="/HorasMedicas/frontend/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="/HorasMedicas/frontend/css/bootstrap.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="../../favicon.ico">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <title>Loguin</title>
    </head>

    <body>

        <div class="container">

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <form class="form-signin" action="Login.php" method="POST">
                        <h2 class="form-signin-heading">Iniciar Sesión</h2>
                        <label for="inputEmail" class="sr-only">Rut</label>
                        <input type="text" id="txtUsuario" name="txtUsuario" class="form-control" placeholder="Rut" required autofocus>
                        <label for="inputPassword" class="sr-only">Contraseña</label>
                        <input type="password" id="txtContrasena" name="txtContrasena" class="form-control" placeholder="Contraseña" required>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
                    </form>

                </div>
                <div class="col-md-4"></div>
            </div>

            <br/>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="<?PHP echo $estiloError; ?>" role="alert" style="text-align: center">
                        <?PHP echo $error; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>

        </div>

    </body>
</html>
