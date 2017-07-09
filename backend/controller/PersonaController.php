<?php

include_once __DIR__."/../dao/DBConnection.php";
include_once __DIR__."/../dao/PersonaDAO.php";


class PersonaController {    
    
    public static function validarPersonaClave($rut, $contrasena) {
        
        $conexion = DBConnection::getConexion();
        $daoPersona= new PersonaDAO($conexion);
        
        $persona = $daoPersona->BuscarPorId($rut);
        
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

    public static function AgregarPersona($rut,$pass,$nombre,$apellido,$fecha_nac,$direccion,$sexo,$fono,$id){
        $conexion = DBConnection::getConexion();
        $personaDAO = new PersonaDAO($conexion);
        
        $persona = new Persona();
        $persona->setRut($rut);
        
        $persona->setContrasena($pass);
        $persona->setNombre($nombre);
        $persona->setApellido($apellido);
        $persona->setFecha_nac($fecha_nac);
        $persona->setDireccion($direccion);
        $persona->setSexo($sexo);
        $persona->setTelefono($fono);
        $persona->setId_perfil($id);
        
        return $personaDAO->agregar($persona);
    }
    
    public static function ModificarPersona($rut,$pass,$nombre,$apellido,$fecha_nac,$direccion,$sexo,$fono,$id){
        $conexion = DBConnection::getConexion();
        $personaDAO = new PersonaDAO($conexion);
        
        $persona = new Persona();
        $persona->setRut($rut);
        
        $persona->setContrasena($pass);
        $persona->setNombre($nombre);
        $persona->setApellido($apellido);
        $persona->setFecha_nac($fecha_nac);
        $persona->setDireccion($direccion);
        $persona->setSexo($sexo);
        $persona->setTelefono($fono);
        $persona->setId_perfil($id);
        
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
        return $personaDAO->BuscarPorId($idCliente);
    }
    
    public static function BuscarPorIdJSON($idCliente){
        $conexion = DBConnection::getConexion();
        $personaDAO = new PersonaDAO($conexion);
        
        //return $personaDAO->buscarPorId($idCliente);
        return $personaDAO->BuscarPorIdJSON($idCliente);
    }
 
    public static function ListarTodo(){
       $conexion = DBConnection::getConexion();
        $personaDAO = new PersonaDAO($conexion);
        
        return $personaDAO->listarTodos();
        
    }
}
