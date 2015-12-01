<?php

class ManageVino {
    private $bd = null;
    private $tabla = "vino";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function get($idvino){
        $parametros = array();
        $parametros["idvino"]=$idvino;
        $this->bd->select($this->tabla, "*", "idvino = :idvino",$parametros );
        $row = $this->bd->getRow();
        $vino = new Vino();
        $vino->set($row);
        return $vino;
    }
    
    function count($condicion="1=1", $parametros=array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
    function delete($idvino){
        $parametros=array();
        $parametros["idvino"]=$idvino;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    //Funcion delete segun los parametros que le pase
    function deleteVinos($parametros){
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(Vino $vino){
        return $this->delete($vino->getIdvino());
    }
    function forzarDelete($idvino){
        $parametros=array();
        $parametros["idvino"]=$idvino;
        $gestor=new ManageVino($this->bd);
        $gestor->deleteVinos($parametros);
        $this->bd->delete("idvino",$parametros);
        $parametros=array();
        $parametros["idvino"]=$idvino;
        return $this->bd->delete($this->tabla, $parametros); 
    }
    function set(Vino $vino){
        //update de todos los campos menos el ID, devuelve el num de filas modificadas 
        
        $parametrosWhere=array();
        $parametrosWhere["idvino"]=$vino->getIdvino();
        return $this->bd->update($this->tabla, $vino->getGenerico(), $parametrosWhere);
        
    }
    
    function insert(Vino $vino){
        //inserta un objeto Vino y devuelve el ID
        return $this->bd->insert($this->tabla, $vino->getGenerico());
    }
    
    function getList($pagina=1,$orden="",$nrpp=Contants::NRPP){
        
        $ordenPredeterminado="$orden, nombre,variedad,idvino";
        if($orden==="" || $orden===null){
             $ordenPredeterminado="nombre,variedad,idvino";
        }
      
        $registroInicial=($pagina-1)*$nrpp;
        $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado,"$registroInicial,$nrpp");
        $r=array();
        /*El 1,10 del ultimo parametro es el limite de registros por pagina*/
        
        while($row = $this->bd->getRow()){
            $vino = new Vino();
            $vino->set($row);
            $r[]=$vino;
        }
        return $r;
    }
    
    
    function getValueSelect(){
        //$table, $proyeccion="*", $parametros=array(), $orden="1", $limite=""
        $this->bd->query($this->tabla, "idvino, nombre", array(), "nombre");
        $array =array();
        while ($row=  $this->bd->getRow()){
            $array[$row[0]]=$row[1];
        }
        return $array;
    }

}

?>

