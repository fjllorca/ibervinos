 <?php
    require '../clases/AutoCarga.php';
    $bd = new DataBase();
    $gestor = new ManageVende($bd);
    $id = Request::get("idvende");
    $vende = $gestor->get($id);
    
 ?>
<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" type="text/css" href="../css/main.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Inserta Compra</h2>
        <form method="POST" action="phpinsert.php">           
            idvende: <input type="text" name="idvende" value="<?php echo $vende->getIdvende(); ?>" /><br/><br/>            
            idvino:&nbsp;&nbsp;&nbsp; <input type="text" name="idvino" value="<?php echo $vende->getIdvino(); ?>" /><br/><br/>           
            idorigen: <input type="text" name="idorigen" value="<?php echo $vende->getIdorigen(); ?>" /><br/><br/>
            idtipo: &nbsp;&nbsp;&nbsp; <input type="text" name="idtipo" value="<?php echo $vende->getIdtipo(); ?>" /><br/><br/>
            Precio: <input type="text" name="idorigen" value="<?php echo $vende->getPrecio(); ?>" /><br/><br/>           
            <input type="submit" value="Insertar"/>
        </form>
        <a href="index.php">Volver atrás</a>
    </body>
</html>
<?php
$bd->close();
?>