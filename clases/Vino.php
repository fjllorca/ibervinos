<?php
//Clase POJO - plana -> solo sirve para almacenar información
class Vino {
    private $idvino, $nombre, $variedad, $idorigen, $idtipo;
    
    //1º constructor -> null
    function __construct($idvino=null, $nombre=null, $variedad=null, $idorigen=null, $idtipo=null) {
        $this->idvino = $idvino;
        $this->nombre = $nombre;
        $this->variedad = $variedad;
        $this->idorigen = $idorigen;
        $this->idtipo = $idtipo;
    }

    //2º Métodos get y set de la clase
    function getIdvino() {
        return $this->idvino;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getVariedad() {
        return $this->variedad;
    }

    function getIdorigen() {
        return $this->idorigen;
    }

    function getIdtipo() {
        return $this->idtipo;
    }

    function setIdvino($idvino) {
        $this->idvino = $idvino;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setVariedad($variedad) {
        $this->variedad = $variedad;
    }

    function setIdorigen($idorigen) {
        $this->idorigen = $idorigen;
    }

    function setIdtipo($idtipo) {
        $this->idtipo = $idtipo;
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


