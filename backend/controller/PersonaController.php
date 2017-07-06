<?php

include_once __DIR__."/../dao/DBConnection.php";
include_once __DIR__."/../dao/PersonaDAO.php";


class PersonaController {    
    
//    public static function registrarUsuario($email, $clave, $confirmacionClave) {
//        
//        // validar que los datos sean válidos        
//        if($clave != $confirmacionClave) {
//            return false;
//        }
//        
//        $usuario = new Usuario();        
//        $usuario->setEmail($email);
//        
//        $hash = password_hash($clave, PASSWORD_BCRYPT);
//        $usuario->setClave($hash);
//        
//        $conexion = ConexionDB::getConexion();
//        $daoUsuario= new UsuarioDAO($conexion);
//        
//        return $daoUsuario->agregar($usuario); 
//                       
//    }
    
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
}
