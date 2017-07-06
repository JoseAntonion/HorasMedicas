<?php

include_once __DIR__ ."/../backend/dao/DBConnection.php";

    if($_SERVER["REQUEST_METHOD"]=="GET") {
        $conexion = DBConnection::getConexion();
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <form action="#" method="POST" >
        <table style="width:100%;">
            <tr>
                <td>Login</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Usuario</td>
                <td>
                    <input id="txtUsuario" type="text" /></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input id="txtPassword" type="password" /></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <input id="btnEnviar" type="button" value="Enviar" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </form>
    </body>
</html>
