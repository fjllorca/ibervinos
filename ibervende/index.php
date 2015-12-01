<?php
    require '../clases/AutoCarga.php';
    $bd = new DataBase();
    $gestor = new ManageVende($bd);
    $page=  Request::get('page');
    if($page===null || $page===""){
        $page=1;
    }
    $registros=$gestor->count();
    $paginas=ceil($registros /  Contants::NRPP); //ceil devuelve el primer entero >= que el numero que tengo
    $order=  Request::get("order");
    $sort=  Request::get("sort");
    $orden="$order $sort";
    
    //La pagina ordena bien, pero cuando pasamos de pagina ya no lo hace. Es decir, sí lo hace por el campo que le hayamos dicho,
    //pero no mantiene un segundo orden lógico (que debería ser el nombre de la ciudad, por ejemplo), lo mezcla todo
    $trozoEnlace="";
    if(trim($orden)!=""){
        $trozoEnlace="&order=$order&sort=$sort";
    }
    $ventas = $gestor->getList($page,trim($orden));
    $op = Request::get("op");
    $r = Request::get("r");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script src="../js/scripts.js"></script>
    </head>
    <body>
        <h2><a href="viewinsert.php">Insertar</a></h2>
        <table border="1">
            <thead>
                <tr>
                    
                    <!-- Aqui mandamos order, campo x el que queremos ordenar, y sort, de qué modo queremos hacerlo !-->
                    
                    <th>
                        <a href="?order=idvende&sort=asc">&Delta; </a>
                        idcompra
                        <a href="?order=idvende&sort=desc">&Del; </a>
                        
                    </th>
                    <th>
                        <a href="?order=idvino&sort=asc">&Delta; </a>
                        idvino 
                        <a href="?order=idvino&sort=desc">&Del; </a>                        
                    </th>
                    <th>
                        <a href="?order=idtipo&sort=asc">&Delta; </a>
                        idtipo
                        <a href="?order=idtipo&sort=desc">&Del; </a>                        
                    </th>
                    
                    <th>
                        <a href="?order=idorigen&sort=asc">&Delta; </a>
                       idorigen
                        <a href="?order=idorigen&sort=desc">&Del; </a>                        
                    </th>
                    <th>
                        
                        <a href="?order=precio&sort=asc">&Delta; </a>
                        precio 
                        <a href="?order=precio&sort=desc">&Del; </a>
                    </th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="7">
                         <a href='?page=1<?= $trozoEnlace ?>'>Primero</a>
                         <a href="?page=<?php echo max(1, $page-1).$trozoEnlace ?>">Anterior</a>
                         <a href="?page=<?php echo min($page+1,$paginas).$trozoEnlace ?>">Siguiente </a>
                         <a href="?page=<?php echo $paginas.$trozoEnlace ?>">Última </a>                         
                    </td>
                </tr>
            </tfoot>
            <tbody>
                
                <?php 
                if($op!=null){
                        echo "<h1>La operacion $op ha dado como resultado $r</h1>";
                        }
                foreach ($ventas as $indice => $vende) { ?>
                
                <tr>
                    <td><?php echo $vende->getIdvende(); ?></td>
                    <td><?php echo $vende->getIdvino() ?></td>  
                    <td><?php echo $vende->getIdtipo(); ?></td>
                    <td><?php echo $vende->getIdorigen(); ?></td>
                    <td><?php echo $vende->getPrecio(); ?></td>
                    <td>
                        <a class='borrar' href='phpdelete.php?idvende=<?php echo $vende->getIdvende(); ?>'>Borrar</a>
                        <a href='viewedit.php?idvende=<?php echo $vende->getIdvende(); ?>'>Editar</a><br/>
                    </td>
                  
                </tr>
                <?php
                }
                ?>
            </tbody>
            
          
        </table>

         
    </body>
</html>
<?php
$bd->close();
?>