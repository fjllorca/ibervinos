<?php

class Origen {
    private $idorigen, $nombre;
    function __construct($idorigen=null, $nombre=null) {
        $this->idorigen=$idorigen;
        $this->nombre=$nombre;
    }
    function getIdorigen() {
        return $this->idorigen;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdorigen($idorigen) {
        $this->idorigen = $idorigen;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
     //3º Método getJson
    
    //4º Método set genérico
    function setOld($valores, $inicio=0){
        $this->idorigen = $valores[0+$inicio];
        $this->nombre = $valores[1+$inicio]; 
        
    }
    
    function set($valores, $inicio=0){
        $i=0;
        foreach ($this as $indice => $valor) {
            $this->$indice=$valores[$i+$inicio];
            $i++;
        }
    }
    
    function getGenerico(){
        $array = array();
        foreach ($this as $indice => $valor) {
            $array[$indice]=$valor;
        }
        return $array;
    }
    
    public function __toString() {
        $r ="";
        foreach ($this as $key => $valor) {
            $r .= "$valor ";
        }
        return $r;
    }


}
