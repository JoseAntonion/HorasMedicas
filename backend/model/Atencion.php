<?php

/**
 */
class Atencion {
    private $id_atencion;
    private $fecha_atencion;
    private $hora_atencion;
    private $estado;
    private $rut_paciente;
    private $rut_medico;
    
    public function __construct() {
        
    }
    
    public function getId_atencion() {
        return $this->id_atencion;
    }
    
    public function getFecha_atencion() {
        return $this->fecha_atencion;
    }
    
    public function getHora_atencion() {
        return $this->hora_atencion;
    }
    
    public function getEstado() {
        return $this->estado;
    }
    
    public function getRut_paciente() {
        return $this->rut_paciente;
    }
    
    public function getRut_medico() {
        return $this->rut_medico;
    }    
    
    
    public function setId_atencion($id_atencion) {
        $this->id_atencion = $id_atencion;
    }

    public function setFecha_atencion($fecha_atencion) {
        $this->fecha_atencion = $fecha_atencion;
    }
    
    public function setHora_atencion($hora_atencion) {
        $this->hora_atencion = $hora_atencion;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setRut_paciente($rut_paciente) {
        $this->rut_paciente = $rut_paciente;
    }

    public function setRut_medico($rut_medico) {
        $this->rut_medico = $rut_medico;
    }
    
}
