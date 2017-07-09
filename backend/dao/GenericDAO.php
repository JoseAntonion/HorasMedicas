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
    
    public function agregar($registro);
    
    public function actualizar($registro);
    
    public function eliminar($idRegistro);
    
    public function buscarPorId($idRegistro);
    
    public function listarPorParametro($idRegistro);
    
    public function listarTodos();
}
