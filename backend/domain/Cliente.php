<?php

include_once __DIR__ . "/Beneficiario.php";

class Cliente implements JsonSerializable {

    private $id;
    private $nombre;
    private $apellido;
    private $fecha_nac;

    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getFecha_nac() {
        return $this->fecha_nac;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setFecha_nac($fecha_nac) {
        $this->fecha_nac = $fecha_nac;
    }

        
    public function jsonSerialize() {
        $arregloAsociativo = Array("id" => $this->id,
            "nombre" => $this->nombre,
            "apellido" => $this->apellido,
            "fecha_nac" => $this->fecha_nac);
        return $arregloAsociativo;
    }

}
