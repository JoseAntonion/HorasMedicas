<?php

/**
 */
class Persona {
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
    
    public function __construct() {
        
    }
    
    public function getRut() {
        return $this->rut;
    }    
    public function getContrasena() {
        return $this->contrasena;
    }    
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    } 
    public function getFecha_nac() {
        return $this->fecha_nac;
    }
    public function getSexo() {
        return $this->sexo;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getTelefono() {
        return $this->telefono;
    }
    public function getValor_consulta() {
        return $this->valor_consulta;
    }
    public function getFecha_contrato() {
        return $this->fecha_contrato;
    }
    public function getId_perfil() {
        return $this->id_perfil;
    }
    
      
    
    public function setRut($rut) {
        $this->rut = $rut;
    }
    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function setFecha_nac($fecha_nac) {
        $this->fecha_nac = $fecha_nac;
    }
    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    public function setValor_consulta($valor_consulta) {
        $this->valor_consulta = $valor_consulta;
    }
    public function setFecha_contrato($fecha_contrato) {
        $this->fecha_contrato = $fecha_contrato;
    }
    public function setId_perfil($id_perfil) {
        $this->id_perfil = $id_perfil;
    }

}
