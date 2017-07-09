<?php


class Perfil {
    private $id_perfil;
    private $nombre_perfil;
    
    function __construct() {
    }

    function getId_perfil() {
        return $this->id_perfil;
    }

    function getNombre_perfil() {
        return $this->nombre_perfil;
    }

    function setId_perfil($id_perfil) {
        $this->id_perfil = $id_perfil;
    }

    function setNombre_perfil($nombre_perfil) {
        $this->nombre_perfil = $nombre_perfil;
    }


    
}
