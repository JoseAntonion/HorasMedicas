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

        <script type="text/javascript" src="js/jquery.Rut.js"></script>
        <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="js/MantenedorPacientes.js" ></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            jQuery(document).ready(function () {

                jQuery.ajaxSetup({
                    "error": function (respuesta, jqXHR, errorMsg) {
                        ocultarImagenCargando();
                        alert("ha ocurrido el siguiente error: " + errorMsg);
                    }
                });




                /**
                 * Manejo del campo RUT
                 */
                jQuery("input[name='rut']").Rut({format_on: 'keyup'});
                jQuery("input[name='rut']").blur(function () {
                    if (this.value !== "") {
                        /*
                         if (!validarRut()) {
                         jQuery(this).addClass("error");
                         return;
                         } else {
                         jQuery(this).removeClass("error");
                         }
                         
                         var rutSinFormato = jQuery.Rut.quitarFormato(this.value);
                         var mantisa = rutSinFormato.slice(0, rutSinFormato.length - 1);
                         
                         //mostrarImagenCargando();
                         */
                        jQuery.getJSON("/HorasMedicas/backend/info-cliente2.php", {id: mantisa}, function (resul) {

                            jQuery("input[name='nombre']").val(resul.nombre);
                            jQuery("input[name='nombre']").attr("readonly", true);

                            jQuery("input[name='apellido']").val(resul.apellido);
                            jQuery("input[name='apellido']").attr("readonly", true);



                        });

                    }
                });









            });
        </script>

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
        <br/>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Rut</label>
                    <div class="col-8">
                        <input class="form-control" type="text" value="" id="txtRut">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Nombre</label>
                    <div class="col-8">
                        <input class="form-control" type="text" value="" id="txtNombre">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-2 col-form-label">Apellido</label>
                    <div class="col-8">
                        <input class="form-control" type="text" value="" id="txtApellido">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-date-input" class="col-2 col-form-label">Fecha de Nacimiento</label>
                    <div class="col-8">
                        <input class="form-control" type="date" value="" id="dpFecha">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Direccion</label>
                    <div class="col-8">
                        <input class="form-control" type="text" value="" id="txtDireccion">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Sexo</label>
                    <div class="col-5 selectContainer">
                        <select class="form-control" name="cboSexo">
                            <option value="">Seleccione Sexo</option>
                            <option value="f">Femenino</option>
                            <option value="m">Masculino</option>

                        </select>
                    </div>
                </div>

                <div class="btn-group btn-group-justified">
                    <a href="#" class="btn btn-primary">Agregar</a>
                    <a href="#" class="btn btn-primary">Eliminar</a>
                    <a href="#" class="btn btn-primary">Modificar</a>
                </div>

            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <h2 class="sub-header">Lista de Pacientes</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Rut</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Sexo</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                            </tr> 
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>




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

