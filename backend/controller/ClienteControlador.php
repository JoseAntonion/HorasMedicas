<?php

include_once __DIR__ ."/../dao/DBConnection.php";
include_once __DIR__ ."/../domain/Cliente.php";
include_once __DIR__ ."/../dao/ClienteDAO.php";

class ClienteControlador {
    
    public static function listarPersonasRegistradas() {
        $conexion = DBConnection::getConexion();
        $daoPersona = new PersonaDAO($conexion);
        
        return $daoPersona->listarTodos();
    }
    
    public static function getInfoCliente($idCliente) {
        
        $conexion = DBConnection::getConexion();
        $clienteDAO = new ClienteDAO($conexion);
        
        return json_encode($clienteDAO->buscarPorId($idCliente));
        //json_encode transforma la respuesta de la llamada al metodo buscarPorId a un objeto json
        
     
        //return json_encode($cliente->jsonSerialize());
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
