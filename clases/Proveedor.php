<?php


class Proveedor {
    private $idproveedor, $nombre, $ciudad, $direccion, $telefono, $email;
    function __construct($idproveedor=null, $nombre=null, $ciudad=null, $direccion=null, $telefono=null, $email=null) {
         $this->idproveedor=$idproveedor;
         $this->nombre=$nombre;
         $this->ciudad=$ciudad;
         $this->direccion=$direccion;
         $this->telefono=$telefono;
         $this->email=$email;
    }
    function getIdproveedor() {
        return $this->idproveedor;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function setIdproveedor($idproveedor) {
        $this->idproveedor = $idproveedor;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
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
