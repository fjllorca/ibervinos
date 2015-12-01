<?php


class UsuAlta {
   
   private $nombre, $apellidos, $alias, $login, $clave, $email, $sexo, $fnac, $admin, $trabajador,$ip;
   
   function __construct($nombre=null, $apellidos=null, $alias=null, $login=null, $clave=null, $email=null, $sexo=null, $fnac=null, $admin=null, $trabajador=null,$ip=null) {
       $this->nombre = $nombre; //40
       $this->apellidos = $apellidos;//80
       $this->alias = $alias;//40
       $this->login = $login;//40
       $this->clave = $clave;//5-20
       $this->email = $email;//100
       $this->sexo = $sexo;//m,f
       $this->fnac = $fnac;//yyyy-mm-dd
       $this->admin = $admin;//true, false
       $this->trabajador = $trabajador;//true,false
       $this->ip=$ip;
   }

      function getNombre() {
       return $this->nombre;
   }

   function getApellidos() {
       return $this->apellidos;
   }

   function getAlias() {
       return $this->alias;
   }

   function getLogin() {
       return $this->login;
   }

   function getClave() {
       return $this->clave;
   }

   function getEmail() {
       return $this->email;
   }

   function getSexo() {
       return $this->sexo;
   }

   function getFnac() {
       return $this->fnac;
   }

   function getAdmin() {
       return $this->admin;
   }

   function getTrabajador() {
       return $this->trabajador;
   }

   function setNombre($nombre) {
       $this->nombre = $nombre;
   }

   function setApellidos($apellidos) {
       $this->apellidos = $apellidos;
   }

   function setAlias($alias) {
       $this->alias = $alias;
   }

   function setLogin($login) {
       $this->login = $login;
   }

   function setClave($clave) {
       $this->clave = $clave;
   }

   function setEmail($email) {
       $this->email = $email;
   }

   function setSexo($sexo) {
       $this->sexo = $sexo;
   }

   function setFnac($fnac) {
       $this->fnac = $fnac;
   }

   function setAdmin($admin) {
       $this->admin = $admin;
   }

   function setTrabajador($trabajador) {
       $this->trabajador = $trabajador;
   }
   
    function getIp() {
       return $this->ip;
   }

   function setIp($ip) {
       $this->ip = $ip;
   }

   public function __toString() {
       $cad="-------Usuario-------<br/><br/>";
       
       foreach($this as $key=>$value){
           $cad.="*$key--->$value<br/>";
       }
       return $cad;
       
   }


}
