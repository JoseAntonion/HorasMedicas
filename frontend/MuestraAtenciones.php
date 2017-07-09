<?php
session_start();
include_once __DIR__ . "/../backend/controller/AtencionController.php";
$usuarioLogeado = "";
$opcionesMenu = "";
$listaAtenciones = new Atencion();


if (isset($_SESSION["nombre"]) && isset($_SESSION["apellido"])) {
    $listaAtenciones = AtencionController::listarAtencionesPorRut($_SESSION["rut"]);
    $usuarioLogeado = $_SESSION["nombre"] . ' ' . $_SESSION["apellido"];
    $mantPacientes = 'MantenedorPacientes.php';
    $mantMedicos = 'MantenedorMedicos.php';
    $mantAtenciones = 'MantenedorAtenciones.php';
    $mantSecretarias = 'MantenedorSecretarias.php';
    $muestraAtenciones = 'MuestraAtenciones.php';
    $mantDirectores = 'MantenedorDirectores.php';
    $estadisticas = 'Estadisticas.php';

    
    
    
    if ($_SESSION["id_perfil"] == '1') { // PACIENTE
        $opcionesMenu = '<li><a href="' . $muestraAtenciones . '">LISTA ATENCIONES</a></li>';
    }

    if ($_SESSION["id_perfil"] == '3') { // SECRETARIA
        $opcionesMenu = '<li><a href="' . $mantPacientes . '">PACIENTES</a></li>';
        $opcionesMenu = $opcionesMenu . '<li><a href="' . $mantMedicos . '">MEDICOS</a></li>';
        $opcionesMenu = $opcionesMenu . '<li><a href="' . $mantAtenciones . '">ATENCIONES</a></li>';
    }

    if ($_SESSION["id_perfil"] == '4') { // DIRECTOR
        $opcionesMenu = '<li><a href="' . $mantPacientes . '">PACIENTES</a></li>';
        $opcionesMenu = $opcionesMenu . '<li><a href="' . $mantMedicos . '">MEDICOS</a></li>';
        $opcionesMenu = $opcionesMenu . '<li><a href="' . $mantAtenciones . '">ATENCIONES</a></li>';
        $opcionesMenu = $opcionesMenu . '<li><a href="' . $estadisticas . '">ESTADISTICAS</a></li>';
    }

    if ($_SESSION["id_perfil"] == '5') { // ADMINISTRADOR
        $opcionesMenu = '<li><a href="' . $mantPacientes . '">PACIENTES</a></li>';
        $opcionesMenu = $opcionesMenu . '<li><a href="' . $mantMedicos . '">MEDICOS</a></li>';
        $opcionesMenu = $opcionesMenu . '<li><a href="' . $mantSecretarias . '">SECRETARIAS</a></li>';
        $opcionesMenu = $opcionesMenu . '<li><a href="' . $mantDirectores . '">DIRECTORES</a></li>';
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

        <script src="js/jquery-3.2.1.js"></script>
        <script src="js/jquery.Rut.js"></script>
        <script src="js/MantenedorPacientes.js" ></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/holder.min.js"></script>
        <title>Hospital Municipal</title>

        <!-- Custom styles for this template -->
        <link href="css/dashboard.css" rel="stylesheet">
        <link href="css/estilo.css" rel="stylesheet">
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

        <br/>
        <br/>
        <br/>
        <br/>


        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <h2 class="sub-header">Lista de Atenciones</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id Atencion</th>
                                <th>Fecha Atencion</th>
                                <th>Hora Atencion</th>
                                <th>Estado</th>
                                <th>Rut Paciente</th>
                                <th>Rut Medico</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listaAtenciones as $atenciones) {
                                ?>
                                <tr>
                                    <td><?= $atenciones->getId_atencion() ?></td>
                                    <td><?= $atenciones->getFecha_atencion() ?></td>
                                    <td><?= $atenciones->getHora_atencion() ?></td>
                                    <td><?= $atenciones->getEstado() ?></td>
                                    <td><?= $atenciones->getRut_paciente() ?></td>
                                    <td><?= $atenciones->getRut_medico() ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>

    </body>
</html>

