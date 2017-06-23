<?php

class Atencion implements JsonSerializable{
    
    private $id_atencion;
    private $id_beneficiario;
    private $fecha_atencion;
    private $comuna_id;
    
    private $beneficiarios;
    
    public function __construct() {
        $this->beneficiarios = Array();
    }
    
    function addBeneficiario($beneficiario) {
        array_push($this->beneficiarios, $beneficiario);
    }

    function getBeneficiarios() {
        $this->beneficiarios;
    }
    
    function getIdAtencion() {
        return $this->id_atencion;
    }

    function getFechaAtencion() {
        return $this->fecha_atencion;
    }
    
    function getIdComuna() {
        return $this->comuna_id;
    }

    
    function setIdAtencion($id_atencion) {
        $this->id_atencion = $id_atencion;
    }

    function setFechaAtencion($fecha_atencion) {
        $this->fecha_atencion = $fecha_atencion;
    }
    
    function setIdComuna($comuna_id) {
        $this->comuna_id = $comuna_id;
    }

    
    public function jsonSerialize() {
        $arreglo = Array("id_atencion"=>$this->id_atencion,
                         "id_beneficiario" => $this->id_beneficiario,
                         "fecha_atencion" => $this->fecha_atencion,
                         "comuna_id" => $this->comuna_id);
        
        return $arreglo;
    }

}
