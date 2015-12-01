<?php

class Util {
    static function getSelect($name, $parametros, $valor=null, $blanco=true ,$id=null, $atributos=""){
        if($id != null){
            $id="id='$id'";
        }
        else{$id="";}
        $r= "<select name='$name' $atributos ></br>";
        if($blanco==true){
            $r .="<option value=''>&nbsp;</option></br>";
        }
        foreach ($parametros as $indice => $value) {
            $selected = "";
            if($valor!=null && $indice == $valor){
                $selected = "selected";
            }
            $r .= "<option $selected value='$indice'>$value</option></br>";
        }
        
        $r.="</select>";
        return $r;
    }
    
}
