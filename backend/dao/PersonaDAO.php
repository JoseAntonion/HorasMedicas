<?php

include_once __DIR__."/GenericDAO.php";
include_once __DIR__."/../model/Persona.php";


class PersonaDAO implements GenericDAO {

    
    private $conexion;
    
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function actualizar($registro) {
        /*@var $registro Persona */
        $query = "UPDATE persona SET RUT = :RUT, CONTRASENA = :CONTRASENA, NOMBRE = :NOMBRE, APELLIDO = :APELLIDO, FECHA_NAC = :FECHA_NAC,"
                . " SEXO = :SEXO, DIRECCION = :DIRECCION, TELEFONO = :TELEFONO, ID_PERFIL = :ID "
                . "WHERE RUT = :RUT ";
                
        $sentencia = $this->conexion->prepare($query);
        
        $rut = $registro->getRut();
        $contrasena = $registro->getContrasena();
        $nombre = $registro->getNombre();
        $apellido = $registro->getApellido();
        $fecha_nac = $registro->getFecha_nac();
        $sexo = $registro->getSexo();
        $direccion = $registro->getDireccion();
        $telefono = $registro->getTelefono();
        $id_perfil = $registro->getId_perfil();
                
        $sentencia->bindParam(':RUT', $rut);
        $sentencia->bindParam(':CONTRASENA', $contrasena);
        $sentencia->bindParam(':NOMBRE', $nombre);
        $sentencia->bindParam(':APELLIDO', $apellido);
        $sentencia->bindParam(':FECHA_NAC', $fecha_nac);
        $sentencia->bindParam(':SEXO',$sexo );
        $sentencia->bindParam(':DIRECCION', $direccion);
        $sentencia->bindParam(':TELEFONO', $telefono);
        $sentencia->bindParam(':ID', $id_perfil);
              
        return $sentencia->execute();
    }

    public function agregar($registro) {
     
        $query = "INSERT INTO persona (RUT,CONTRASENA,NOMBRE,APELLIDO,FECHA_NAC,"
                . " SEXO, DIRECCION, TELEFONO,ID_PERFIL) "
                . "VALUES (:RUT, :CONTRASENA, :NOMBRE, :APELLIDO, :FECHA_NAC, :SEXO, :DIRECCION, :TELEFONO, :ID) ";
                
        $sentencia = $this->conexion->prepare($query);
        
        $rut = $registro->getRut();
        $contrasena = $registro->getContrasena();
        $nombre = $registro->getNombre();
        $apellido = $registro->getApellido();
        $fecha_nac = $registro->getFecha_nac();
        $sexo = $registro->getSexo();
        $direccion = $registro->getDireccion();
        $telefono = $registro->getTelefono();
        $id_perfil = $registro->getId_perfil();
                
        $sentencia->bindParam(':RUT', $rut);
        $sentencia->bindParam(':CONTRASENA', $contrasena);
        $sentencia->bindParam(':NOMBRE', $nombre);
        $sentencia->bindParam(':APELLIDO', $apellido);
        $sentencia->bindParam(':FECHA_NAC', $fecha_nac);
        $sentencia->bindParam(':SEXO',$sexo );
        $sentencia->bindParam(':DIRECCION', $direccion);
        $sentencia->bindParam(':TELEFONO', $telefono);
        $sentencia->bindParam(':ID', $id_perfil);
              
        return $sentencia->execute();

    }

    public function eliminar($idRegistro) {       
        
  
        $query = "DELETE FROM persona WHERE RUT = :rut ";      
        $sentencia = $this->conexion->prepare($query);      
        $sentencia->bindParam(':rut', $idRegistro);
                
        return $sentencia->execute();   
    }

    public function listarTodos() {
        /*@var $persona Persona */
        
        $listado = array();
        $persona = new Persona();
        $registros = $this->conexion->query("SELECT * FROM persona");
        
        if($registros != null) {
            foreach($registros as $fila) {
                $persona = new Persona();
                $persona->setRut($fila["RUT"]);
                $persona->setNombre($fila["NOMBRE"]);
                $persona->setApellido($fila["APELLIDO"]);
                $persona->setFecha_nac($fila["FECHA_NAC"]);
                $persona->setSexo($fila["SEXO"]);
                $persona->setDireccion($fila["DIRECCION"]);
                $persona->setTelefono($fila["TELEFONO"]);

                array_push($listado, $persona);
            }
        }
        
        return $listado;
    }

    public function listarPorParametro($idRegistro) {
        
        $listado = array();
        $sentencia = $this->conexion->prepare("SELECT * FROM PERSONA WHERE ID_PERFIL = :ID");
        
        $sentencia->bindParam(':ID', $idRegistro);
        
        $sentencia->execute();

        if($sentencia != null) {
            foreach($sentencia as $fila) {
              
            $persona = new Persona();
            $persona->setRut($fila["RUT"]);            
            $persona->setContrasena($fila["CONTRASENA"]);
            $persona->setNombre($fila["NOMBRE"]); 
            $persona->setApellido($fila["APELLIDO"]);
            $persona->setFecha_nac($fila["FECHA_NAC"]); 
            $persona->setSexo($fila["SEXO"]); 
            $persona->setDireccion($fila["DIRECCION"]); 
            $persona->setTelefono($fila["TELEFONO"]); 
            $persona->setValor_consulta($fila["VALOR_CONSULTA"]); 
            $persona->setFecha_contrato($fila["FECHA_CONTRATO"]); 
            $persona->setId_perfil($fila["ID_PERFIL"]);
            
            array_push($listado, $persona);
            
            }
        }
        
        return $listado;
    }

    public function BuscarPorIdJSON($idRegistro) {
        
        $persona = new Persona();
        
        $sentencia = $this->conexion->prepare("SELECT * FROM PERSONA WHERE RUT = :p_rut");
        
        $sentencia->bindParam(':p_rut', $idRegistro);
        
        $sentencia->execute();

        
        while($registro = $sentencia->fetch()) {            
            
            $persona->setRut($registro["RUT"]);            
            $persona->setContrasena($registro["CONTRASENA"]);
            $persona->setNombre($registro["NOMBRE"]); 
            $persona->setApellido($registro["APELLIDO"]);
            $persona->setFecha_nac($registro["FECHA_NAC"]); 
            $persona->setSexo($registro["SEXO"]); 
            $persona->setDireccion($registro["DIRECCION"]); 
            $persona->setTelefono($registro["TELEFONO"]); 
            $persona->setValor_consulta($registro["VALOR_CONSULTA"]); 
            $persona->setFecha_contrato($registro["FECHA_CONTRATO"]); 
            $persona->setId_perfil($registro["ID_PERFIL"]); 
        }
        
        return json_encode($persona->jsonSerialize());
        
    }
    
    public function BuscarPorId($idRegistro) {
        
        $persona = null;
        
        $sentencia = $this->conexion->prepare("SELECT * FROM PERSONA WHERE RUT = :p_rut");
        
        $sentencia->bindParam(':p_rut', $idRegistro);
        
        $sentencia->execute();

        
        while($registro = $sentencia->fetch()) {            
            $persona = new Persona();
            $persona->setRut($registro["RUT"]);            
            $persona->setContrasena($registro["CONTRASENA"]);
            $persona->setNombre($registro["NOMBRE"]); 
            $persona->setApellido($registro["APELLIDO"]);
            $persona->setFecha_nac($registro["FECHA_NAC"]); 
            $persona->setSexo($registro["SEXO"]); 
            $persona->setDireccion($registro["DIRECCION"]); 
            $persona->setTelefono($registro["TELEFONO"]); 
            $persona->setValor_consulta($registro["VALOR_CONSULTA"]); 
            $persona->setFecha_contrato($registro["FECHA_CONTRATO"]); 
            $persona->setId_perfil($registro["ID_PERFIL"]); 
        }
        
        return $persona;
        
    }


}