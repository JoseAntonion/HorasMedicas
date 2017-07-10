<?php

include_once __DIR__."/../dao/DBConnection.php";
include_once __DIR__."/../dao/AtencionDAO.php";

class AtencionController {    
    
    public static function listarAtencionesRegistradas() {
        $conexion = DBConnection::getConexion();
        $daoAtencion = new AtencionDAO($conexion);
        
        return $daoAtencion->listarTodos();
    }
    
    public static function listarAtencionesPorRut($rut) {
        $conexion = DBConnection::getConexion();
        $daoAtencion = new AtencionDAO($conexion);
        
        return $daoAtencion->listarPorParametro($rut);
    }
    
    public static function agregarAtencion($fecha_atencion, $hora_atencion,
                                            $estado, $rut_paciente, $rut_medico) {
        
        // validar que los datos sean válidos
        $atencion = new Atencion();
        
        //$atencion->setId_atencion($id_atencion);
        $atencion->setFecha_atencion($fecha_atencion);
        $atencion->setHora_atencion($hora_atencion);
        $atencion->setEstado($estado);
        $atencion->setRut_paciente($rut_paciente);
        $atencion->setRut_medico($rut_medico);
        
        $conexion = DBConnection::getConexion();
        $daoAtencion = new AtencionDAO($conexion);
        
        return $daoAtencion->agregar($atencion); 
        
    }
    
    public static function actualizarAtencion($id_atencion, $fecha_atencion, $hora_atencion,
                                            $estado, $rut_paciente, $rut_medico) {
        
        // validar que los datos sean válidos
        $atencion = new Atencion();
        
        $atencion->setId_atencion($id_atencion);
        $atencion->setFecha_atencion($fecha_atencion);
        $atencion->setHora_atencion($hora_atencion);
        $atencion->setEstado($estado);
        $atencion->setRut_paciente($rut_paciente);
        $atencion->setRut_medico($rut_medico);
        
        $conexion = DBConnection::getConexion();
        $daoAtencion = new AtencionDAO($conexion);
        
        return $daoAtencion->actualizar($atencion); 
        
    }
    
    
    
    
}
