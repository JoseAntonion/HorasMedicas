<?php


class Beneficiario implements JsonSerializable{
    
    private $id;
    private $nombre;
    private $apellido;
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
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
   
    
    public function jsonSerialize() {
        $arreglo = Array("id"=>$this->id,
                         "nombre" => $this->nombre,
                         "apellido" => $this->apellido);
        
        return $arreglo;
    }

}
