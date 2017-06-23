<?php

include_once __DIR__ ."/../dao/DBConnection.php";
include_once __DIR__ ."/../domain/Cliente.php";

class ClienteJSONController {
    
    public static function listarPersonasRegistradas() {
        $conexion = ConexionDB::getConexion();
        $daoPersona = new PersonaDAO($conexion);
        
        return $daoPersona->listarTodos();
    }
    
    public static function getInfoCliente($idCliente) {
        
        
     
        return json_encode($cliente->jsonSerialize());
    }        
    
    public static function registrarPersona($rut, $nombre, $apellido,
                                            $fechaNacimiento, $email) {
        
        // validar que los datos sean válidos
        
        $persona = new Persona();
        $persona->setRut($rut);
        $persona->setNombre($nombre);
        $persona->setApellido($apellido);
        $persona->setFechaNacimiento($fechaNacimiento);
        $persona->setEmail($email);
        
        $conexion = ConexionDB::getConexion();
        $daoPersona = new PersonaDAO($conexion);
        
        return $daoPersona->agregar($persona); 
        
    }        
}
