<?php

include_once __DIR__."/GenericDAO.php";
include_once __DIR__."/../model/Atencion.php";


class AtencionDAO implements GenericDAO {
    
    private $conexion;
    
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    
    public function actualizar($registro) {
        
        $query = "UPDATE ATENCION SET ID_ATENCION = :id_atencion, FECHA_ATENCION = :fecha_atencion, HORA_ATENCION = :hora_atencion, ESTADO = :estado, RUT_PACIENTE = :rut_paciente, RUT_MEDICO = :rut_medico WHERE ID_ATENCION = :id_atencion " ;
        
        $sentencia = $this->conexion->prepare($query);
        
        $id_atencion = $registro->getId_atencion();
        $fecha_atencion = $registro->getFecha_atencion();
        $hora_atencion = $registro->getHora_atencion();
        $estado = $registro->getEstado();
        $rut_paciente = $registro->getRut_paciente();
        $rut_medico = $registro->getrut_medico();
        
        $sentencia->bindParam(':id_atencion', $id_atencion);
        $sentencia->bindParam(':fecha_atencion', $fecha_atencion);
        $sentencia->bindParam(':hora_atencion', $hora_atencion);
        $sentencia->bindParam(':estado', $estado);
        $sentencia->bindParam(':rut_paciente', $rut_paciente);        
        $sentencia->bindParam(':rut_medico', $rut_medico);
        
        return $sentencia->execute();
        
    }

    public function agregar($registro) {
        
        $query = "INSERT INTO ATENCION (ID_ATENCION,FECHA_ATENCION,HORA_ATENCION,ESTADO, RUT_PACIENTE, RUT_MEDICO) VALUES (:id_atencion, :fecha_atencion, :hora_atencion, :estado, :rut_paciente, :rut_medico) ";
        
        $sentencia = $this->conexion->prepare($query);
        
        $id_atencion = $registro->getId_atencion();
        $fecha_atencion = $registro->getFecha_atencion();
        $hora_atencion = $registro->getHora_atencion();
        $estado = $registro->getEstado();
        $rut_paciente = $registro->getRut_paciente();
        $rut_medico = $registro->getrut_medico();
        
        $sentencia->bindParam(':id_atencion', $id_atencion);
        $sentencia->bindParam(':fecha_atencion', $fecha_atencion);
        $sentencia->bindParam(':hora_atencion', $hora_atencion);
        $sentencia->bindParam(':estado', $estado);
        $sentencia->bindParam(':rut_paciente', $rut_paciente);        
        $sentencia->bindParam(':rut_medico', $rut_medico);
        
        return $sentencia->execute();

    }

    public function buscarPorId($idRegistro) {
        $atencion = null;
        
        $sentencia = $this->conexion->prepare("SELECT ID_ATENCION, FECHA_ATENCION, HORA_ATENCION, ESTADO, RUT_PACIENTE, RUT_MEDICO FROM ATENCION WHERE ID_ATENCION = :a_id");
        
        $a_id = $idRegistro;
        $sentencia->bindParam(':a_id', $a_id);
        
        $sentencia->execute();

        
        while($registro = $sentencia->fetch()) {            
            $atencion = new atencion();
            $atencion->setId_atencion($registro["ID_ATENCION"]);            
            $atencion->setFecha_atencion($registro["FECHA_ATENCION"]);
            $atencion->setHora_atencion($registro["HORA_ATENCION"]); 
            $atencion->setEstado($registro["ESTADO"]);
            $atencion->setRut_paciente($registro["RUT_PACIENTE"]); 
            $atencion->setRut_medico($registro["RUT_MEDICO"]); 
        }
        
        return $atencion;
    }

    public function eliminar($idRegistro) {
        
    }

    public function listarTodos() {
        $listado = array();
        $atencion = null;
        $registros = $this->conexion->query("SELECT * FROM ATENCION");
        
        if($registros != null) {
            foreach($registros as $fila) {
                $atencion = new atencion();
                $atencion->setId_atencion($fila["ID_ATENCION"]);            
                $atencion->setFecha_atencion($fila["FECHA_ATENCION"]);
                $atencion->setHora_atencion($fila["HORA_ATENCION"]); 
                $atencion->setEstado($fila["ESTADO"]);
                $atencion->setRut_paciente($fila["RUT_PACIENTE"]); 
                $atencion->setRut_medico($fila["RUT_MEDICO"]); 

                array_push($listado, $atencion);
            }
        }
        
        return $listado;
    }
    
    public function listarPorParametro($idRegistro) {
        
        $atencion = null;
        $listado = array();
        $sentencia = $this->conexion->prepare("SELECT ID_ATENCION, FECHA_ATENCION, HORA_ATENCION, ESTADO, RUT_PACIENTE, RUT_MEDICO FROM ATENCION WHERE RUT = :a_id");
        
        $a_id = $idRegistro;
        $sentencia->bindParam(':a_id', $a_id);
        
        $sentencia->execute();
        
        if($sentencia != null) {
            foreach($sentencia as $fila) {
                $atencion = new atencion();
                $atencion->setId_atencion($fila["ID_ATENCION"]);            
                $atencion->setFecha_atencion($fila["FECHA_ATENCION"]);
                $atencion->setHora_atencion($fila["HORA_ATENCION"]); 
                $atencion->setEstado($fila["ESTADO"]);
                $atencion->setRut_paciente($fila["RUT_PACIENTE"]); 
                $atencion->setRut_medico($fila["RUT_MEDICO"]); 

                array_push($listado, $atencion);
            }
        }
        
        return $listado;        
        
    }

}