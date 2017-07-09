<?php

include_once __DIR__."/../dao/DBConnection.php";
include_once __DIR__."/../dao/PersonaDAO.php";


class PersonaController {    
    
    public static function validarPersonaClave($rut, $contrasena) {
        
        $conexion = DBConnection::getConexion();
        $daoPersona= new PersonaDAO($conexion);
        
        $persona = $daoPersona->buscarPorId($rut);
        
        if($persona == null)  {
            return false;
        }       
        
        //if(password_verify($clave, $usuario->getClave())) {
        if($contrasena == $persona->getContrasena()) {            
            $_SESSION["rut"] = $persona->getRut();
            $_SESSION["nombre"] = $persona->getNombre();
            $_SESSION["apellido"] = $persona->getApellido();
            $_SESSION["fecha_nac"] = $persona->getFecha_nac();
            $_SESSION["sexo"] = $persona->getSexo();
            $_SESSION["direccion"] = $persona->getDireccion();
            $_SESSION["telefono"] = $persona->getTelefono();
            $_SESSION["valor_consulta"] = $persona->getValor_consulta();
            $_SESSION["fecha_contrato"] = $persona->getFecha_contrato();
            $_SESSION["id_perfil"] = $persona->getId_perfil();

            return true;
        }
        
        return false;
    }
    
    public static function ListarPersonasPorPerfil($perfil){
        $conexion = DBConnection::getConexion();
        $personaDAO = new PersonaDAO($conexion);
        
        return $personaDAO->listarPorParametro($perfil);
        
    }

    public static function AgregarPersona($persona){
        $conexion = DBConnection::getConexion();
        $personaDAO = new PersonaDAO($conexion);
        
        return $personaDAO->agregar($persona);
    }
    
    public static function ModificarPersona($persona){
        $conexion = DBConnection::getConexion();
        $personaDAO = new PersonaDAO($conexion);
        
        return $personaDAO->actualizar($persona);
    }
    
    public static function EliminarPersona($rut){
        $conexion = DBConnection::getConexion();
        $personaDAO = new PersonaDAO($conexion);
        
        return $personaDAO->eliminar($rut);
    }
    
    public static function BuscarPorId($idCliente){
        $conexion = DBConnection::getConexion();
        $personaDAO = new PersonaDAO($conexion);
        
        //return $personaDAO->buscarPorId($idCliente);
        return json_encode($personaDAO->buscarPorId($idCliente));
    }
 
    public static function ListarTodo(){
       $conexion = DBConnection::getConexion();
        $personaDAO = new PersonaDAO($conexion);
        
        return $personaDAO->listarTodos();
        
    }
}
