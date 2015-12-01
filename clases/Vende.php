<?php

class Vende {
    private $idvende, $idvino, $idtipo, $idorigen, $precio;
    function __construct($idvende=null, $idvino=null, $idtipo=null, $idorigen=null, $precio=null) {
        $this->idvende=$idvende; 
        $this->idvino=$idvino;
        $this->idvtipo=$idtipo;
        $this->idorigen=$idorigen;
        $this->precio=$precio;
    }
    //2º Métodos get y set de la clase
    function getIdvende() {
        return $this->idvende;
    }

    function getIdvino() {
        return $this->idvino;
    }

    function getIdtipo() {
        return $this->idtipo;
    }

    function getIdorigen() {
        return $this->idorigen;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setIdvende($idvende) {
        $this->idvende = $idvende;
    }

    function setIdvino($idvino) {
        $this->idvino = $idvino;
    }

    function setIdtipo($idtipo) {
        $this->idtipo = $idtipo;
    }

    function setIdorigen($idorigen) {
        $this->idorigen = $idorigen;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

 //3º Método getJson
    
    //4º Método set genérico
    function setOld($valores, $inicio=0){
        $this->idvino = $valores[0+$inicio];
        $this->nombre = $valores[1+$inicio]; 
        $this->variedad= $valores[2+$inicio]; 
        $this->idorigen= $valores[3+$inicio];
        $this->idtipo= $valores[4+$inicio];
    }
    //Pa ke no se fuera de la olla
    function set($valores, $inicio=0){
        //$i=0;
        foreach ($this as $indice => $valor) {
            $this->$indice=$valores[$inicio];
            //$i++;
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
