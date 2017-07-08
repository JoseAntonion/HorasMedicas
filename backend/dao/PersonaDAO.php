<?php

include_once __DIR__."/GenericDAO.php";
include_once __DIR__."/../model/Persona.php";


class PersonaDAO implements GenericDAO {
    
    /**
     *
     * @var PDO 
     */
    
    private $conexion;
    
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    
    public function actualizar($registro) {
        
    }

    public function agregar($registro) {
        /*@var $registro Persona */
        

        
        $query = "INSERT INTO persona (RUT,CONTRASENA,NOMBRE,APELLIDO, FECHA_NAC, SEXO, DIRECCION, TELEFONO, VALOR_CONSULTA, FECHA_CONTRATO, ID_PERFIL) VALUES (:rut, :nombre, :apellido, :fecha_nacimiento, :email) ";
        
        $sentencia = $this->conexion->prepare($query);
        
        $rut = $registro->getRut();
        $nombre = $registro->getNombre();
        $apellido = $registro->getApellido();
        $fechaNacimiento = $registro->getFechaNacimiento();
        $email = $registro->getEmail();
        
        $sentencia->bindParam(':rut', $rut);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':apellido', $apellido);
        $sentencia->bindParam(':fecha_nacimiento', $fechaNacimiento);
        $sentencia->bindParam(':email', $email);        
              
        return $sentencia->execute();

    }

    public function buscarPorId($idRegistro) {
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

    public function eliminar($idRegistro) {
        
    }

    public function listarTodos() {
        $listado = array();
        
        $registros = $this->conexion->query("SELECT * FROM persona");
        
        if($registros != null) {
            foreach($registros as $fila) {
                $persona = new Persona();
                $persona->setRut($fila["rut"]);
                $persona->setNombre($fila["nombre"]);
                $persona->setApellido($fila["apellido"]);
                $persona->setFechaNacimiento($fila["fecha_nacimiento"]);
                $persona->setEmail($fila["email"]);

                array_push($listado, $persona);
            }
        }
        
        return $listado;
    }

    public function listarPorParametro($idRegistro) {
        
    }

}