<?php

class DBConnection {

    const HOST = "localhost";
    const DBNAME = "ExamenDAI";
    const PORT = "3306";
    const USER = "root";
    const PASS = "";

    public static function getConexion() {
        $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME . ";port=" . self::PORT . ";charset=utf8";

        try {
            $dbConexion = new PDO($dsn, self::USER, self::PASS);
            return $dbConexion;
        } catch (PDOException $exception) {
            switch ($exception->getCode()) {
                case 2002:
                    echo '<div class="error">No se pudo establecer la conexión con la base de datos, revise que &eacute;sta se encuentre en ejecuci&oacute;n.</div>';
                    exit;
                case 1045:
                    echo '<div class="error">No se pudo conectar a la base de datos, revise las credenciales configuradas</div>';
                    exit;
                case 1049: // La base de datos no existe.                        
                    $dbConexion = self::crearBaseDatos();
                    return $dbConexion;
                default:
                    echo '<div class="error">' . $exception->getMessage() . '</div>';
                    break;
            }
        }
    }

    private static function crearBaseDatos() {

        echo '<div class="warning">Base de datos no encontrada, se crear&aacute;...</div>';

        try {
            $dsn = "mysql:host=" . self::HOST . ";port=" . self::PORT . ";charset=utf8";
            $mysqlConexion = new PDO($dsn, self::USER, self::PASS);
            $mysqlConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $mysqlConexion->exec("CREATE DATABASE " . self::DBNAME);
            $mysqlConexion->exec("USE " . self::DBNAME);

            $mysqlConexion->exec("
    CREATE TABLE `atencion` (
        `ID_ATENCION` int NOT NULL,
        `FECHA_ATENCION` varchar(20) DEFAULT NULL,
        `HORA_ATENCION` varchar(20) DEFAULT NULL,
        `ESTADO` varchar(100) DEFAULT NULL,
        `RUT_PACIENTE` varchar(20) NOT NULL,
        `RUT_MEDICO` varchar(20) NOT NULL
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8");

            $mysqlConexion->exec("
    CREATE TABLE `perfil` (
        `ID_PERFIL` int(11) NOT NULL,
        `NOMBRE_PERFIL` varchar(100) DEFAULT NULL
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8");

            $mysqlConexion->exec("
    CREATE TABLE `persona` (
        `RUT` varchar(20) NOT NULL,
        `CONTRASENA` varchar(256) DEFAULT NULL,
        `NOMBRE` varchar(100) DEFAULT NULL,
        `APELLIDO` varchar(100) DEFAULT NULL,
        `FECHA_NAC` date DEFAULT NULL,
        `SEXO` varchar(20) DEFAULT NULL,
        `DIRECCION` varchar(256) DEFAULT NULL,
        `TELEFONO` varchar(100) DEFAULT NULL,
        `VALOR_CONSULTA` int(11) DEFAULT NULL,
        `FECHA_CONTRATO` date DEFAULT NULL,
        `ID_PERFIL` int(11) NOT NULL
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8");

             $mysqlConexion->exec("
        ALTER TABLE `atencion`
          MODIFY COLUMN ID_ATENCION INT auto_increment,
          ADD PRIMARY KEY (`ID_ATENCION`),
          ADD KEY `ATENCION_PERSONA_FK` (`RUT_PACIENTE`),
          ADD KEY `ATENCION_PERSONA_FKv1` (`RUT_MEDICO`)");

            $mysqlConexion->exec("
            ALTER TABLE `perfil`
          ADD PRIMARY KEY (`ID_PERFIL`)");
        
            $mysqlConexion->exec("
            ALTER TABLE `persona`
          ADD PRIMARY KEY (`RUT`),
          ADD KEY `PERSONA_PERFIL_FK` (`ID_PERFIL`)");
            
                  $mysqlConexion->exec("
                Insert into PERFIL (ID_PERFIL,NOMBRE_PERFIL) values ('1','PACIENTE');
                Insert into PERFIL (ID_PERFIL,NOMBRE_PERFIL) values ('2','MEDICO');
                Insert into PERFIL (ID_PERFIL,NOMBRE_PERFIL) values ('3','SECRETARIA');
                Insert into PERFIL (ID_PERFIL,NOMBRE_PERFIL) values ('5','ADMINISTRADOR');
                Insert into PERFIL (ID_PERFIL,NOMBRE_PERFIL) values ('4','DIRECTOR');
                ");
                  
                  $mysqlConexion->exec("
                INSERT INTO `persona` (`RUT`, `CONTRASENA`, `NOMBRE`, `APELLIDO`, `FECHA_NAC`, `SEXO`, `DIRECCION`, `TELEFONO`, `VALOR_CONSULTA`, `FECHA_CONTRATO`, `ID_PERFIL`) VALUES
                ('1', '$2y$10$0Yww2XVsXy12JRyORqtQT.WthNdTAZdzE0DFotgwINPPoeetJGf3u', 'JUAN', 'PEREZ', '2017-07-02', 'MASCULINO', 'LALALAN', '1234', NULL, NULL, 1),
                ('3', '$2y$10$0Yww2XVsXy12JRyORqtQT.WthNdTAZdzE0DFotgwINPPoeetJGf3u', 'MARIA', 'CACERES', NULL, NULL, NULL, NULL, NULL, '2017-07-02', 3),
                ('2', '$2y$10$0Yww2XVsXy12JRyORqtQT.WthNdTAZdzE0DFotgwINPPoeetJGf3u', 'OSCAR', 'LEON', NULL, NULL, NULL, NULL, 10000, '2017-07-02', 2),
                ('4', '$2y$10$0Yww2XVsXy12JRyORqtQT.WthNdTAZdzE0DFotgwINPPoeetJGf3u', 'WILL', 'SMITH', NULL, 'MASCULINO', 'CERCA DE AHI', '555555', NULL, '2017-07-02', 4),
                ('5', '$2y$10$0Yww2XVsXy12JRyORqtQT.WthNdTAZdzE0DFotgwINPPoeetJGf3u', 'ITALO', 'MONTES', '2017-07-02', 'MASCULINO', 'MAPOCHO 4242', '12345', NULL, '2017-07-02', 5);
                ");
                
                $mysqlConexion->exec("
                INSERT INTO `atencion` (`ID_ATENCION`, `FECHA_ATENCION`, `HORA_ATENCION`, `ESTADO`, `RUT_PACIENTE`, `RUT_MEDICO`) VALUES
                ('1', '01/01/2017', '08:30', 'AGENDADA', '1', '2'),
                ('2', '02/01/2017', '08:40', 'CONFIRMADA', '1', '2'),
                ('3', '03/01/2017', '08:50', 'ANULADA', '1', '2'),
                ('4', '04/01/2017', '07:50', 'REALIZADA', '1', '2'),
                ('5', '05/01/2017', '10:50', 'REALIZADA', '1', '2');
                ");                    
                  
            return $mysqlConexion;
            
        } catch (Exception $e) {
            echo $e->getMessage();
            die($e->getCode());
        }
    }

}

