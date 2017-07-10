<?php
session_start();
include_once __DIR__ . "/../backend/controller/AtencionController.php";
$usuarioLogeado = "";
$opcionesMenu = "";
if (isset($_SESSION["nombre"]) && isset($_SESSION["apellido"])) {
    $listaAtenciones = AtencionController::listarAtencionesRegistradas();
    $usuarioLogeado = $_SESSION["nombre"] . ' ' . $_SESSION["apellido"];
    $mantPacientes = 'MantenedorPacientes.php';
    $mantMedicos = 'MantenedorMedicos.php';
    $mantAtenciones = 'MantenedorAtenciones.php';
    $mantSecretarias = 'MantenedorSecretarias.php';
    $mantDirectores = 'MantenedorDirectores.php';
    $estadisticas = 'Estadisticas.php';

    if ($_SESSION["id_perfil"] == '1') { // PACIENTE
        $opcionesMenu = '<li><a href="' . $mantAtenciones . '">ATENCIONES</a></li>';
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

        <link href="/HorasMedicas/frontend/css/bootstrap.min.css" rel="stylesheet">
        <link href="/HorasMedicas/frontend/css/bootstrap.min.css" rel="stylesheet">
        <link href="/HorasMedicas/frontend/css/bootstrap-theme.css" rel="stylesheet">
        <link href="/HorasMedicas/frontend/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="/HorasMedicas/frontend/css/bootstrap.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="/../HorasMedicas/Hospital.ico">

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


        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="" role="alert" 
                     style="text-align: center" 
                     id="mensaje" 
                     value="">
                    <label id="mensajePacientes"></label>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>


        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="#" method="POST" id="formularioPaciente">
                    
                    <div class="form-group row">
                        <label for="example-url-input" class="col-2 col-form-label">Numero de Atención</label>
                        <div class="col-8">
                            <input class="form-control" type="text"
                                   value="" 
                                   id="txtNumeroAtencion"
                                   name="txtNumeroAtencion">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">Fecha de Atención</label>
                        <div class="col-8">
                            <input class="form-control" type="date" 
                                   value="" 
                                   id="dpFechaAtencion"
                                   name="dpFechaAtencion">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">Hora de Atención</label>
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" value="00:00" id="txtHoraAtencion">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-url-input" class="col-2 col-form-label">Rut Paciente</label>
                        <div class="col-8">
                            <input class="form-control" type="text"
                                   value="" 
                                   id="txtRutPacienteAtencion"
                                   name="txtRutPacienteAtencion">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="example-url-input" class="col-2 col-form-label">Nombre Paciente</label>
                        <div class="col-8">
                            <input class="form-control" type="text"
                                   value="" 
                                   id="txtNombrePacienteAtencion"
                                   name="txtNombrePacienteAtencion">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Médico Tratante</label>
                        <div class="col-5 selectContainer">
                            <select class="form-control" name="cboMedico">
                                <option value="">Seleccione Médico</option>
                            </select>
                        </div>
                    </div>

                    <div class="btn-group btn-group-justified">
                        <a href="#" class="btn btn-primary" type="submit" id="btnAgregar">Agregar</a>
                        <a href="#" class="btn btn-primary" type="submit" id="btnEliminar">Eliminar</a>
                        <a href="#" class="btn btn-primary" type="submit" id="btnEliminar">Modificar</a>
                        <a href="#" class="btn btn-primary" type="submit" id="btnBuscar">Buscar</a>
                        <a href="#" class="btn btn-primary" type="reset" id="btnLimpiar">Limpiar</a>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <h2 class="sub-header">Lista de Atenciones</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Paciente</th>
                                <th>Medico</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listaAtenciones as $atencion) {
                                /* @var $persona Persona */
                                ?>
                                <tr>
                                    <td><?= $atencion->getRut() ?></td>
                                    <td><?= $atencion->getNombre() ?></td>
                                    <td><?= $atencion->getApellido() ?></td>
                                    <td><?= $atencion->getFecha_nac() ?></td>
                                    <td><?= $atencion->getSexo() ?></td>
                                    <td><?= $atencion->getDireccion() ?></td>
                                    <td><?= $atencion->getTelefono() ?></td>
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


