<?php

interface GenericDAO {
    
    public function agregar($registro);
    
    public function actualizar($registro);
    
    public function eliminar($idRegistro);
    
    public function BuscarPorId($idRegistro);

    public function listarPorParametro($idRegistro);
    
    public function listarTodos();
}
