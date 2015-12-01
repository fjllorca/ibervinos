<?php
    require '../clases/AutoCarga.php';
    $bd = new DataBase();
    $gestor = new ManageOrigen($bd);
    $id = Request::get("idorigen");
    $origen = $gestor->get($id);
    $gestorOrigen = new ManageOrigen($bd);
 ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Insertar nuevo Origen</h2>
        <form method="POST" action="phpinsert.php">
            idorigen:&nbsp;&nbsp; <input type="text" name="idorigen" value="<?php echo $origen->getIdorigen(); ?>" /><br/><br/>
            Nombre: &nbsp;&nbsp;<input type="text" name="nombre" value="<?php echo $origen->getNombre(); ?>" /><br/><br/>
            <input type="submit" value="Insertar"/>
        </form>
    </body>
    <a href="index.php">Volver atrás</a>
</html>
<?php
$bd->close();
?>