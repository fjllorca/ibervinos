<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageOrigen($bd);
$page = Request::get('page');
if ($page === null || $page === "") {
    $page = 1;
}
$registros = $gestor->count();
$paginas = ceil($registros / Contants::NRPP); //ceil devuelve el primer entero >= que el numero que tengo
$order = Request::get("order");
$sort = Request::get("sort");
$orden = "$order $sort";

//La pagina ordena bien, pero cuando pasamos de pagina ya no lo hace. Es decir, sí lo hace por el campo que le hayamos dicho,
//pero no mantiene un segundo orden lógico (que debería ser el nombre de la ciudad, por ejemplo), lo mezcla todo
$trozoEnlace = "";
if (trim($orden) != "") {
    $trozoEnlace = "&order=$order&sort=$sort";
}
$origenes = $gestor->getList($page, trim($orden));
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
        <h3><a href="viewinsert.php">Insertar Origen nuevo</a></h3>
        <table border="1">
            <thead>
                <tr>

                    <!-- Aqui mandamos order, campo x el que queremos ordenar, y sort, de qué modo queremos hacerlo !-->
                    <th>
                        <a href="?order=idorigen&sort=asc">&Delta; </a>
                        idorigen                       
                        <a href="?order=idorigen&sort=desc">&Del; </a>

                    </th>
                    <th>
                        <a href="?order=nombre&sort=asc">&Delta; </a>
                        nombre 
                        <a href="?order=nombre&sort=desc">&Del; </a>                        
                    </th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="7">
                        <a href='?page=1<?= $trozoEnlace ?>'>Primero</a>
                        <a href="?page=<?php echo max(1, $page - 1) . $trozoEnlace ?>">Anterior</a>
                        <a href="?page=<?php echo min($page + 1, $paginas) . $trozoEnlace ?>">Siguiente </a>
                        <a href="?page=<?php echo $paginas . $trozoEnlace ?>">Última </a>               
                    </td>
                </tr>
            </tfoot>
            <tbody>

                <?php
                if ($op != null) {
                    echo "<h1>La operacion $op ha dado como resultado $r</h1>";
                }
                foreach ($origenes as $indice => $origen) {
                    ?>

                    <tr>

                        <td><?php echo $origen->getIdorigen() ?></td>
                        <td><?php echo $origen->getNombre(); ?></td>                    
                        <td>
                            <a class='borrar' href='phpdelete.php?idorigen=<?php echo $origen->getIdorigen(); ?>'>Borrar</a>
                            <a href='viewedit.php?idorigen=<?php echo $origen->getIdorigen(); ?>'>Editar</a><br/>
                        </td>

                    </tr>
                    <?php }  ?>
            </tbody>
        </table>
        <a href="../SeleccionAdministradores.html">Volver atrás</a>
    </body>
</html>
<?php
$bd->close();
?>