<?php
session_start();
$usuarioLogeado = "";
$opcionesMenu = "";
if (isset($_SESSION["nombre"]) && isset($_SESSION["apellido"])) {
    
    $usuarioLogeado = $_SESSION["nombre"] . ' ' . $_SESSION["apellido"];
    $mantPacientes = 'MantenedorPacientes.php';
    $mantMedicos = 'MantenedorMedicos.php';
    $mantAtenciones = 'MantenedorAtenciones.php';
    $mantSecretarias = 'MantenedorSecretarias.php';
    $mantDirectores = 'MantenedorDirectores.php';
    $estadisticas = 'Estadisticas.php';
    
    if($_SESSION["id_perfil"] == '1'){ // PACIENTE
        $opcionesMenu = '<li><a href="'.$mantAtenciones.'">ATENCIONES</a></li>';
    }
    
    if($_SESSION["id_perfil"] == '3'){ // SECRETARIA
        $opcionesMenu = '<li><a href="'.$mantPacientes.'">PACIENTES</a></li>';
        $opcionesMenu = $opcionesMenu.'<li><a href="'.$mantMedicos.'">MEDICOS</a></li>';
        $opcionesMenu = $opcionesMenu.'<li><a href="'.$mantAtenciones.'">ATENCIONES</a></li>';              
    }
    
    if($_SESSION["id_perfil"] == '4'){ // DIRECTOR
        $opcionesMenu = '<li><a href="'.$mantPacientes.'">PACIENTES</a></li>';
        $opcionesMenu = $opcionesMenu.'<li><a href="'.$mantMedicos.'">MEDICOS</a></li>';
        $opcionesMenu = $opcionesMenu.'<li><a href="'.$mantAtenciones.'">ATENCIONES</a></li>';
        $opcionesMenu = $opcionesMenu.'<li><a href="'.$estadisticas.'">ESTADISTICAS</a></li>'; 
    }
    
    if($_SESSION["id_perfil"] == '5'){ // ADMINISTRADOR
        $opcionesMenu = '<li><a href="'.$mantPacientes.'">PACIENTES</a></li>';
        $opcionesMenu = $opcionesMenu.'<li><a href="'.$mantMedicos.'">MEDICOS</a></li>';
        $opcionesMenu = $opcionesMenu.'<li><a href="'.$mantSecretarias.'">SECRETARIAS</a></li>';
        $opcionesMenu = $opcionesMenu.'<li><a href="'.$mantDirectores.'">DIRECTORES</a></li>';
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

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link rel="icon" href="/../HorasMedicas/Hospital.ico">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/holder.min.js"></script>
        <title>Hospital Municipal</title>

        <!-- Custom styles for this template -->
        <link href="css/dashboard.css" rel="stylesheet">


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
                    <a class="navbar-brand">Centro de Salud Municipal</a>
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
        <script src="js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="js/holder.min.js"></script>

    </body>
</html>
