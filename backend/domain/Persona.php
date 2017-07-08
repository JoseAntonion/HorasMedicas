<?php

//include_once __DIR__ . "/Beneficiario.php";

class Cliente implements JsonSerializable {

    private $rut;
    private $contrasena;
    private $nombre;
    private $apellido;
    private $fecha_nac;
    private $sexo;
    private $direccion;
    private $telefono;
    private $valor_consulta;
    private $fecha_contrato;
    private $id_perfil;
   
    function getRut() {
        return $this->rut;
    }
    function getContrasena() {
        return $this->contrasena;
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
    function getSexo() {
        return $this->sexo;
    }
    function getDireccion() {
        return $this->direccion;
    }
    function getTelefono() {
        return $this->telefono;
    }
    function getValor_consulta() {
        return $this->valor_consulta;
    }
    function getFecha_contrato() {
        return $this->fecha_contrato;
    }
    function getId_perfil() {
        return $this->id_perfil;
    }
    function setRut($rut) {
        $this->rut = $rut;
    }
    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
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
    function setSexo($sexo) {
        $this->sexo = $sexo;
    }
    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    function setValor_consulta($valor_consulta) {
        $this->valor_consulta = $valor_consulta;
    }
    function setFecha_contrato($fecha_contrato) {
        $this->fecha_contrato = $fecha_contrato;
    }
    function setId_perfil($id_perfil) {
        $this->id_perfil = $id_perfil;
    }

    
    public function jsonSerialize() {
        $arregloAsociativo = Array("id" => $this->id,
            "nombre" => $this->nombre,
            "apellido" => $this->apellido,
            "fecha_nac" => $this->fecha_nac);
        return $arregloAsociativo;
    }

}
