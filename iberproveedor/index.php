<?php
    require '../clases/AutoCarga.php';
    $bd = new DataBase();
    $gestor = new ManageProveedor($bd);
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
    $proveedores = $gestor->getList($page,trim($orden));
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
        <h2><a href="viewinsert.php">Insertar nuevo proveedor</a></h2>
        <table border="1">
            <thead>
                <tr>
                    
                    <!-- Aqui mandamos order, campo x el que queremos ordenar, y sort, de qué modo queremos hacerlo !-->
                    <th>
                        <a href="?order=Idproveedor&sort=asc">&Delta; </a>&nbsp;
                        Idproveedor:&nbsp;
                        <a href="?order=Idproveedor&sort=desc">&Del; </a>&nbsp;
                        
                    </th>
                     <th>
                         &nbsp;<a href="?order=nombre&sort=asc">&Delta; </a>&nbsp;
                        Nombre: &nbsp;
                        <a href="?order=nombre&sort=desc">&Del; </a>&nbsp;
                        
                    </th>
                     <th>
                        &nbsp; &nbsp;<a href="?order=ciudad&sort=asc">&Delta; </a>&nbsp;
                        Ciudad:&nbsp;
                        <a href="?order=ciudad&sort=desc">&Del; </a>&nbsp;
                        
                    </th>
                    <th>
                        &nbsp;<a href="?order=direccion&sort=asc">&Delta; </a>&nbsp;
                       Direccion: &nbsp;
                        <a href="?order=direccion&sort=desc">&Del; </a>
                        
                    </th>
                    <th>
                        &nbsp;<a href="?order=telefono&sort=asc">&Delta; </a>&nbsp;
                        Telefono:&nbsp;
                        <a href="?order=telefono&sort=desc">&Del; </a>&nbsp;
                        
                    </th>
                    <th>
                        &nbsp;<a href="?order=email&sort=asc">&Delta; </a>&nbsp;
                        e-mail:&nbsp;
                        <a href="?order=email&sort=desc">&Del; </a>&nbsp;
                        
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
                foreach ($proveedores as $indice => $proveedor) { ?>
                
                <tr>
                    <td><?php echo $proveedor->getIdproveedor(); ?></td>
                    <td><?php echo $proveedor->getNombre(); ?></td>
                    <td><?php echo $proveedor->getCiudad(); ?></td>
                    <td><?php echo $proveedor->getDireccion(); ?></td>
                    <td><?php echo $proveedor->getTelefono(); ?></td>
                    <td><?php echo $proveedor->getEmail(); ?></td>
                    <td>
                        <a class='borrar' href='phpdelete.php?idproveedor=<?php echo $proveedor->getIdproveedor(); ?>'>Borrar</a>
                        <a href='viewedit.php?idproveedor=<?php echo $proveedor->getIdproveedor(); ?>'>Editar</a><br/>
                    </td>
                  
                </tr>
                <?php
                }
                ?>
            </tbody>
            
          
        </table>
        <a href="../SeleccionAdministradores.html">Volver atrás</a>
         
    </body>
</html>
<?php
$bd->close();
?>