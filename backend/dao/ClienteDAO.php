<?php

include_once __DIR__ . "/GenericDAO.php";
include_once __DIR__ . "/../domain/Cliente.php";

class ClienteDAO implements GenericDAO {

    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function actualizar($registro) {
        
    }

    public function agregar($registro) {

        $query = "INSERT INTO persona (rut,nombre,apellido,fecha_nacimiento, email) VALUES (:rut, :nombre, :apellido, :fecha_nacimiento, :email) ";

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

    public function buscarPorId($id) {

        $query = "SELECT * FROM persona WHERE PERSONA_ID = :id ";
        $sentencia = $this->conexion->prepare($query);
        $sentencia->bindParam(':id', $id);
        return $sentencia->execute();
        
    }

    public function eliminar($idRegistro) {
        
    }

    public function listarTodos() {
        
    }

}
