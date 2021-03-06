<?php
    require '../ibervinos/clases/AutoCarga.php';
    $bd = new DataBase();
    $gestor = new ManageVino($bd);
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
    $vinos = $gestor->getList($page,trim($orden));
    $op = Request::get("op");
    $r = Request::get("r");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" type="text/css" href="../ibervinos/css/main.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script src="../js/scripts.js"></script>
    </head>
    <body>
        <table border="1">
            <thead>
                <img style="width: 25%;"src="../ibervinos/image/barrilesdevino.jpg"/>
                <tr>                    
                    <!-- Aqui mandamos order, campo x el que queremos ordenar, y sort, de qué modo queremos hacerlo !-->
                    <th>
                         &nbsp;<a href="?order=idvino&sort=asc">&Delta; </a>&nbsp;
                        &nbsp;idvino &nbsp;
                       &nbsp; <a href="?order=idvino&sort=desc">&Del; </a>  &nbsp;                     
                    </th>
                     <th>
                        &nbsp; <a href="?order=nombre&sort=asc">&Delta; </a>&nbsp;
                       &nbsp; nombre &nbsp;
                       &nbsp; <a href="?order=nombre&sort=desc">&Del; </a>&nbsp;
                        
                    </th>
                     <th>
                        &nbsp;<a href="?order=variedad&sort=asc">&Delta; </a>&nbsp;                         
                        &nbsp;variedad&nbsp;
                        &nbsp;<a href="?order=variedad&sort=desc">&Del; </a>&nbsp;                        
                    </th>
                    <th>
                       &nbsp;<a href="?order=idorigen&sort=asc">&Delta; </a>&nbsp;
                       &nbsp;idorigen&nbsp;
                       &nbsp; <a href="?order=idorigen&sort=desc">&Del; </a>&nbsp;                        
                    </th>
                    <th>
                        &nbsp; <a href="?order=idtipo&sort=asc">&Delta; </a>&nbsp;
                        &nbsp;idtipo&nbsp;
                        &nbsp; <a href="?order=idtipo&sort=desc">&Del; </a>&nbsp;                       
                    </th>
                   
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
                foreach ($vinos as $indice => $vino) { ?>                
                <tr>
                    <td><?php echo $vino->getidvino() ?></td>
                    <td><?php echo $vino->getNombre(); ?></td>
                    <td><?php echo $vino->getVariedad(); ?></td>
                    <td><?php echo $vino->getIdorigen(); ?></td>
                    <td><?php echo $vino->getIdtipo(); ?></td>   
                </tr>
                <?php
                }
                ?>
            </tbody>    
        </table>
        <a href="SeleccionUsuarios.html"><h3>Volver atrás</h3></a>
    </body>
</html>
<?php
$bd->close();
?>