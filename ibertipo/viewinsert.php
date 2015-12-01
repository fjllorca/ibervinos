<?php
    require '../clases/AutoCarga.php';
    $bd = new DataBase();
    $gestor = new ManageVino($bd);
    $id = Request::get("idvino");
    $vino = $gestor->get($id);
    $gestorVino = new ManageVino($bd);
 ?>
<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" type="text/css" href="../css/main.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" action="phpinsert.php">
            idtipo: &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="idtipo" value="<?php echo $vino->getIdtipo(); ?>" /><br/><br/> 
            Nombre: <input type="text" name="nombre" value="<?php echo $vino->getNombre(); ?>" /><br/><br/>
            <input type="submit" value="Insertar"/>
        </form>
        <a href="index.php">Volver atrás</a>
    </body>
</html>
<?php
$bd->close();
?>