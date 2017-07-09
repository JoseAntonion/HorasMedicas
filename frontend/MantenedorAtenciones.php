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
                        <label for="example-text-input" class="col-2 col-form-label">Rut</label>
                        <div class="col-8">
                            <input class="form-control" type="text" 
                                   value="" 
                                   id="txtRut" 
                                   name="txtRut">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Contraseña</label>
                        <div class="input-group" id="contraseña">
                            <input class="form-control" type="password" 
                                   value="" 
                                   id="txtContrasena" 
                                   name="txtContrasena" />
                            <span id="show-hide-passwd" action="hide" 
                                  class="input-group-addon glyphicon glyphicon glyphicon-eye-open"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-search-input" class="col-2 col-form-label">Nombre</label>
                        <div class="col-8">
                            <input class="form-control" type="text" 
                                   value="" 
                                   id="txtNombre"
                                   name="txtNombre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-2 col-form-label">Apellido</label>
                        <div class="col-8">
                            <input class="form-control" type="text" 
                                   value="" 
                                   id="txtApellido"
                                   name="txtApellido">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">Fecha de Nacimiento</label>
                        <div class="col-8">
                            <input class="form-control" type="date" 
                                   value="" 
                                   id="dpFecha"
                                   name="dpFecha">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-url-input" class="col-2 col-form-label">Direccion</label>
                        <div class="col-8">
                            <input class="form-control" type="text"
                                   value="" 
                                   id="txtDireccion"
                                   name="txtDireccion">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="example-url-input" class="col-2 col-form-label">Teléfono</label>
                        <div class="col-8">
                            <input class="form-control" type="text"
                                   value="" 
                                   id="txtFono"
                                   name="txtFono">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Sexo</label>
                        <div class="col-5 selectContainer">
                            <select class="form-control" name="cboSexo">
                                <option value="">Seleccione Sexo</option>
                                <option value="FEMENINO">Femenino</option>
                                <option value="MASCULINO">Masculino</option>

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

                <h2 class="sub-header">Lista de Pacientes</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Sexo</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listaPersonas as $persona) {
                                /* @var $persona Persona */
                                ?>
                                <tr>
                                    <td><?= $persona->getRut() ?></td>
                                    <td><?= $persona->getNombre() ?></td>
                                    <td><?= $persona->getApellido() ?></td>
                                    <td><?= $persona->getFecha_nac() ?></td>
                                    <td><?= $persona->getSexo() ?></td>
                                    <td><?= $persona->getDireccion() ?></td>
                                    <td><?= $persona->getTelefono() ?></td>
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


