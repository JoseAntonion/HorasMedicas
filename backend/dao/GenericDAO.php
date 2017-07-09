<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author yo
 */
interface GenericDAO {
    
    public function agregar($rut,$pass,$nombre,$apellido,$fecha_nac,$sexo,$direccion,$telefono,$id);
    
    public function actualizar($registro);
    
    public function eliminar($idRegistro);
    
    public function BuscarPorId($idRegistro);

    public function listarPorParametro($idRegistro);
    
    public function listarTodos();
}
