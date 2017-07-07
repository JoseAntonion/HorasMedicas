<?php
session_start();
$usuarioLogeado = "";
$opcionesMenu = "";
if (isset($_SESSION["nombre"]) && isset($_SESSION["apellido"])) {
    $usuarioLogeado = $_SESSION["nombre"] . ' ' . $_SESSION["apellido"];
    if($_SESSION["id_perfil"] == '1'){
        $opcionesMenu = '<li><a href="#">Perfil 1 Opcion1</a></li>';
        $opcionesMenu = $opcionesMenu.'<li><a href="#">Perfil 1 Opcion2</a></li>';
        $opcionesMenu = $opcionesMenu.'<li><a href="#">Perfil 1 Opcion3</a></li>';               
    }
    
    if($_SESSION["id_perfil"] == '2'){
        $opcionesMenu = '<li><a href="#">Perfil 2 Opcion1</a></li>';
        $opcionesMenu = $opcionesMenu.'<li><a href="#">Perfil 2 Opcion2</a></li>';
        $opcionesMenu = $opcionesMenu.'<li><a href="#">Perfil 2 Opcion3</a></li>';              
    }
    
    if($_SESSION["id_perfil"] == '3'){
        $opcionesMenu = '<li><a href="#">Perfil 3 Opcion1</a></li>';
        $opcionesMenu = $opcionesMenu.'<li><a href="#">Perfil 3 Opcion2</a></li>';
        $opcionesMenu = $opcionesMenu.'<li><a href="#">Perfil 3 Opcion3</a></li>';              
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
        <title>Hospital Municipal</title>
        

        <!-- Bootstrap core CSS -->
        <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="dashboard.css" rel="stylesheet">

        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">Sentro de Salud Municipal</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <?php echo $opcionesMenu ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a>Sr(a) <?php echo $usuarioLogeado ?></a></li>
                        <li><a href="logout.php" ><span class="glyphicon glyphicon-log-out"></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="../../assets/js/vendor/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>