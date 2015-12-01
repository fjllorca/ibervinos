<?php


class ManageOrigen {
  

   private $bd = null;
    private $tabla = "origen";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function get($idorigen){
        $parametros = array();
        $parametros["idorigen"]=$idorigen;
        $this->bd->select($this->tabla, "*", "idorigen = :idorigen",$parametros );
        $row = $this->bd->getRow();
        $origen = new Origen();
        $origen->set($row);
        return $origen;
    }
     function count($condicion="1=1", $parametros=array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
    function delete($idorigen){
        //devuelve el numero de filas borradas
        $parametros=array();
        $parametros["idorigen"]=$idorigen;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
        
    function erase(Origen $origen){
        return $this->delete($country->getCode());
    }
    
    function set(Origen $origen){       
        $parametrosWhere=array();
        $parametrosWhere["idorigen"]= $origen->getIdorigen();
        return $this->bd->update($this->tabla, $origen->getGenerico(), $parametrosWhere);
    }
    
    function insert(Origen $origen){
        //inserta un objeto City y devuelve el ID
        
        return $this->bd->insert($this->tabla, $origen->getGenerico());
    }
    
//    function getList(){
//        $r=array();
//        $this->bd->select($this->tabla, "*", "1=1", array(), "idorigen,nombre");
//        while($row = $this->bd->getRow()){
//            $origen = new Origen();
//            $origen->set($row);
//            $r[]=$origen;
//        }
//        return $r;
//    }
    function getList($pagina=1,$orden="",$nrpp=Contants::NRPP){
        
        $ordenPredeterminado="$orden, idorigen,nombre";
        if($orden==="" || $orden===null){
             $ordenPredeterminado="idorigen,nombre";
        }
      
        $registroInicial=($pagina-1)*$nrpp;
        $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado,"$registroInicial,$nrpp");
        $r=array();
        /*El 1,10 del ultimo parametro es el limite de registros por pagina*/
        
        while($row = $this->bd->getRow()){
            $origen = new Origen();
            $origen->set($row);
            $r[]=$origen;
        }
        return $r;
    }
    
    function getValueSelect(){
        //$table, $proyeccion="*", $parametros=array(), $orden="1", $limite=""
        $this->bd->query($this->tabla, "idorigen, nombre", array(), "nombre");
        $array =array();
        while ($row=  $this->bd->getRow()){
            $array[$row[0]]=$row[1];
        }
        return $array;
    }
}

?>
