<?php

class ManageProveedor {
    private $bd = null;
    private $tabla = "proveedor";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function get($idproveedor){
        $parametros = array();
        $parametros["idproveedor"]=$idproveedor;
        $this->bd->select($this->tabla, "*", "idproveedor = :idproveedor",$parametros );
        $row = $this->bd->getRow();
        $proveedor = new Proveedor();
        $proveedor->set($row);
        return $proveedor;
    }
    
    function count($condicion="1=1", $parametros=array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
    function delete($idproveedor){
        $parametros=array();
        $parametros["idproveedor"]=$idproveedor;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    //Funcion delete segun los parametros que le pase
    function deleteProveedores($parametros){
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(Proveedor $proveedor){
        return $this->delete($proveedor->getID());
    }
    
    function set(Proveedor $proveedor){
        //update de todos los campos menos el ID, devuelve el num de filas modificadas 
        //$parametrosSet=$city->getGenerico();
        /*foreach ($city as $key => $value) {
            $parametrosSet[$key] = $value;
        }*/
        $parametrosWhere=array();
        $parametrosWhere["idproveedor"]=$proveedor->getIdproveedor();
        return $this->bd->update($this->tabla, $proveedor->getGenerico(), $parametrosWhere);
        
    }
    
    function insert(Proveedor $proveedor){
        //inserta un objeto City y devuelve el ID
        return $this->bd->insert($this->tabla, $proveedor->getGenerico(),false);
    }
    
    function getList($pagina=1,$orden="",$nrpp=Contants::NRPP){
        
        $ordenPredeterminado="$orden, nombre, ciudad,idproveedor";
        if($orden==="" || $orden===null){
             $ordenPredeterminado="nombre, ciudad,idproveedor";
        }
      
        $registroInicial=($pagina-1)*$nrpp;
        $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado,"$registroInicial,$nrpp");
        $r=array();
        /*El 1,10 del ultimo parametro es el limite de registros por pagina*/
        
        while($row = $this->bd->getRow()){
            $proveedor = new Proveedor();
            $proveedor->set($row);
            $r[]=$proveedor;
        }
        return $r;
    }
    
    
    function getValueSelect(){
        //$table, $proyeccion="*", $parametros=array(), $orden="1", $limite=""
        $this->bd->query($this->tabla, "idproveedor, nombre", array(), "nombre");
        $array =array();
        while ($row=  $this->bd->getRow()){
            $array[$row[0]]=$row[1];
        }
        return $array;
    }
}
