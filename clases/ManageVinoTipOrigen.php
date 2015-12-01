<?php

//Podemos hacerlo con una clase pojo para abarcar las 3 tablas

class VinoTipoOrigen{
   private $vino, $Tipo,$origen; 
   
  
   function __construct(Vino $vino, Tipo $tipo,  Origen $origen) {
       $this->vino = $vino;
       $this->tipo = $tipo;
       $this->origen = $origen;
   }

   function getVino() {
       return $this->vino;
   }

   function getTipo() {
       return $this->Tipo;
   }

   function getOrigen() {
       return $this->origen;
   }

   function setVino($vino) {
       $this->vino = $vino;
   }

   function setTipo($Tipo) {
       $this->Tipo = $Tipo;
   }

   function setOrigen($origen) {
       $this->origen = $origen;
   }
}


//O crear un método en la clase para relacionar las tablas
class ManageRelations {
    
    private $bd=null;
    
    function __construct(Database $bd) {
        $this->bd=$bd;
    }
    
    //Podíamos dejar la condicion en 1=1, pero quizás la siguiente forma sea menos cutre 
    
    function getListCoCiCoLa($condicion=null, $parametros=array()){
        
        if($condicion===null){
            $condicion="";
        }
        else{
          $condicion="where $condicion";
        }
        $sql="select co.*, ci.*, cl.*"
                . "from country co"
                . "left join city ci"
                . "on co.Code=ci.CountryCode"
                . "left join countrylanguage cl"
                . "on co.Code=cl.CountryCode $condicion";
        
        
        $this->bd->send($sql, $parametros);
        $r=array();
        //$contador=0;
        
        while($row = $this->bd->getRow()){
            $country = new Country();
            $country->set($row);
            $city=new City();
            
            //el 15 sería el nº de campos de country, a partir del cual empiezan los campos de city
            $city->set($row,15);
            $countrylanguage=new CountryLanguage();
            //El 20 serían los 15 campos de country, más los 5 de city
            $countrylanguage->set($row,20);
            //Aquí llamamos a la clase pojo
            $r=new CountryCityCountryLanguage($country,$city,$country);
            //o hacemos lo siguiente si no la usamos
            //$r[contador]["country"]=$country;
            //$r[contador]["city"]=$city;
            //$r[contador]["countrylanguage"]=$countrylanguage;
            //$contador++;
        }
        return $r;
        
    }
}
