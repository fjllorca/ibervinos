<?php

class Tipo {
    private $idtipo, $nombre;
    
    //1º constructor -> null
    function __construct($idtipo=null, $nombre=null) {
        $this->idtipo = $idtipo;
        $this->nombre = $nombre;
       
    }

    //2º Métodos get y set de la clase
    public function getIdtipo() {
        return $this->idtipo;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function setIdtipo($idtipo) {
        $this->idtipo = $idtipo;
    }

    public function setName($nomre) {
        $this->nombre = $nomre;
    }
    //3º Método getJson
    
    //4º Método set genérico
    function setOld($valores, $inicio=0){
        $this->idtipo = $valores[0+$inicio];
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