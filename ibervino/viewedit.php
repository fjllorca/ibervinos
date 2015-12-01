 <?php
    require '../clases/AutoCarga.php';
    $bd = new DataBase();
    $gestor = new ManageVino($bd);
    $id = Request::get("idvino");
    $vino = $gestor->get($id);
    
 ?>
<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" type="text/css" href="../css/main.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Modificar Vino de la Tabla de Vinos</h2>
        <form method="POST" action="phpedit.php">           
            Nombre: <input type="text" name="nombre" value="<?php echo $vino->getNombre(); ?>" /><br/><br/>            
            Variedad: <input type="text" name="variedad" value="<?php echo $vino->getVariedad(); ?>" /><br/><br/>           
            idorigen: <input type="text" name="idorigen" value="<?php echo $vino->getIdorigen(); ?>" /><br/><br/>
            idtipo: <input type="text" name="idtipo" value="<?php echo $vino->getIdtipo(); ?>" /><br/><br/>
           
            <input type="hidden" name="idvino" value="<?php echo $vino->getIdvino(); ?>" /><br/>
            <input type="submit" value="Modificar"/>
        </form>
        <a href="index.php">Volver atrás</a>
    </body>
</html>
<?php
$bd->close();
?>