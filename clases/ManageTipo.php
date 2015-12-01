<?php

class ManageTipo {
    
    private $bd = null;
    private $tabla = "tipo";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function get($idtipo){
        $parametros = array();
        $parametros["idtipo"]=$idtipo;
        $this->bd->select($this->tabla, "*", "idtipo = :idtipo",$parametros );
        $row = $this->bd->getRow();
        $tipo = new Tipo();
        $tipo->set($row);
        return $tipo;
    }
    
    function count($condicion="1=1", $parametros=array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
    function delete($idtipo){
        $parametros=array();
        $parametros["idtipo"]=$idtipo;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
        
    
    function erase(Tipo $tipo){
        return $this->delete($tipo->getIdtipo());
    }
    
    function set(Tipo $tipo){
        
        $parametrosWhere=array();
        $parametrosWhere["idtipo"]=$tipo->getIdtipo();
        return $this->bd->update($this->tabla, $tipo->getGenerico(), $parametrosWhere);
        
    }
    
    function insert(Tipo $tipo){
        //inserta un objeto City y devuelve el ID
        return $this->bd->insert($this->tabla, $tipo->getGenerico());
    }
    
   function getList($pagina=1,$orden="",$nrpp=Contants::NRPP){
        
        $ordenPredeterminado="$orden, nombre,idtipo";
        if($orden==="" || $orden===null){
             $ordenPredeterminado="nombre,idtipo";
        }
      
        $registroInicial=($pagina-1)*$nrpp;
        $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado,"$registroInicial,$nrpp");
        $r=array();
        /*El 1,10 del ultimo parametro es el limite de registros por pagina*/
        
        while($row = $this->bd->getRow()){
            $tipo = new Tipo();
            $tipo->set($row);
            $r[]=$tipo;
        }
        return $r;
    }
    
    
    function getValueSelect(){
        //$table, $proyeccion="*", $parametros=array(), $orden="1", $limite=""
        $this->bd->query($this->tabla, "  idtipo, nombre", array(), "nombre");
        $array =array();
        while ($row=  $this->bd->getRow()){
            $array[$row[0]]=$row[1];
        }
        return $array;
    }

}

?>
