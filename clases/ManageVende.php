<?php
class ManageVende {
   
   private $bd = null;
    private $tabla = "vende";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function get($idvende){
        $parametros = array();
        $parametros["idvende"]=$idvende;
        $this->bd->select($this->tabla, "*", "idvende = :idvende",$parametros );
        $row = $this->bd->getRow();
        $venta = new Vende();
        $venta->set($row);
        return $venta;
    }
     function count($condicion="1=1", $parametros=array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
    function delete($idvende){
        //devuelve el numero de filas borradas
        $parametros=array();
        $parametros["idvende"]=$idvende;
        return $this->bd->delete($this->tabla, $parametros);
    }
    function erase(Vende $venta){
        return $this->delete($venta->getIdvende());
    }
    
    function set(Vende $venta){
        //update de todos los campos menos el ID, devuelve el num de filas modificadas 
        
        $parametrosWhere=array();
        $parametrosWhere["idvende"]=$venta->getIdvende();
        return $this->bd->update($this->tabla, $venta->getGenerico(), $parametrosWhere);
        
    }
    
    function insert(Vende $venta){
        //inserta un objeto Vino y devuelve el ID
        return $this->bd->insert($this->tabla, $venta->getGenerico());
    }
    
    
//    function getList(){
//        $r=array();
//        $this->bd->select($this->tabla, "*", "1=1", array(), "idvende,idvino,idtipo,idorigen,precio");
//        while($row = $this->bd->getRow()){
//            $venta = new Vende();
//            $venta->set($row);
//            $r[]=$venta;
//        }
//        return $r;
//    }
    function getList($pagina=1,$orden="",$nrpp=Contants::NRPP){
        
        $ordenPredeterminado="$orden, idvende,idvino";
        if($orden==="" || $orden===null){
             $ordenPredeterminado="idvende,idvino";
        }
      
        $registroInicial=($pagina-1)*$nrpp;
        $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado,"$registroInicial,$nrpp");
        $r=array();
        /*El 1,10 del ultimo parametro es el limite de registros por pagina*/
        
        while($row = $this->bd->getRow()){
            $vende = new Vende();
            $vende->set($row);
            $r[]=$vende;
        }
        return $r;
    }
    
    function getValueSelect(){
        //$table, $proyeccion="*", $parametros=array(), $orden="1", $limite=""
        $this->bd->query($this->tabla, "idvende, idvino", array(), "idvino");
        $array =array();
        while ($row=  $this->bd->getRow()){
            $array[$row[0]]=$row[1];
        }
        return $array;
    }
}

?>