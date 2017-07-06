<?php

session_start();
include_once __DIR__ ."/../backend/dao/DBConnection.php";
include_once __DIR__ ."/../backend/controller/PersonaController.php";

    $errorMessage = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST["txtUsuario"]) && isset($_POST["txtContrasena"]))
        {

            $exito = PersonaController::validarPersonaClave($_POST["txtUsuario"], $_POST["txtContrasena"]);

            if($exito) 
            {
               $errorMessage = "Usuario o Clave Correctos!!";
               //return;
            } 
            else 
            {
               $errorMessage = "Usuario o Clave Invalidos";
            }
        }  
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <form action="login.php" method="POST">
        <table style="width:100%;">
            <tr>
                <td>Login</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Usuario</td>
                <td>
                    <input id="txtUsuario" name="txtUsuario" type="text" /></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input id="txtContrasena" name="txtContrasena" type="password" /></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <input id="btnEnviar" type="submit" value="Enviar" /></td>
                <td><div id="mensaje" style="display:inline;">
                                <label id="label_mensaje"><?PHP echo $errorMessage; ?></label>
                            </div></td>
                            <td></td>
            </tr>
        </table>
    </form>
                <?php
                //if($_SERVER["REQUEST_METHOD"] == "POST")
                //{
                    if(isset($_SESSION["nombre"])) {
                        echo '<p><b>Usuario autenticado</b>: '.$_SESSION["nombre"].'</p>';
                        echo '<p><a href="logout.php" >Cerrar Sesion</a></p>';
                    }else{
                        echo '<p><b>No se ha iniciado sesion</b></p>';
                    }
                //}
                ?>
       
        
    </body>
</html>
