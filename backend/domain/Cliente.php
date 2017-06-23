<?php

include_once __DIR__."/Beneficiario.php";

class Cliente  implements JsonSerializable {
    
    private $id;
    private $nombre;
    private $apellido;
    
    /**
     *
     * @var Array 
     */
    private $beneficiarios;
    
    public function __construct() {
        $this->beneficiarios = Array();
    }
    
    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    /**
     * 
     * @param Beneficiario $beneficiario
     */
    function addBeneficiario($beneficiario) {
        array_push($this->beneficiarios, $beneficiario);
    }

    function getBeneficiarios() {
        $this->beneficiarios;
    }   
    
    public function jsonSerialize() {
        $arregloAsociativo =   Array("id" => $this->id,
                                     "nombre" => $this->nombre, 
                                     "apellido" => $this->apellido,
                                     "beneficiarios" => $this->beneficiarios);     
        return $arregloAsociativo;
    }

}
