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
        <h2>Insertar nuevo Vino en la Tabla de Vinos</h2>
        <form method="POST" action="phpinsert.php">
            Idtipo:&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<input type="text" required name="idvino" value="<?php echo $vino->getIdvino(); ?>" /><br/><br/>
            Nombre:&nbsp; <input type="text" required name="nombre" value="<?php echo $vino->getNombre(); ?>" /><br/><br/>
            Variedad:   <input type="text" required name="variedad" value="<?php echo $vino->getVariedad(); ?>" /><br/><br/>
            Idorigen:&nbsp;   <input type="text" required name="idorigen" value="<?php echo $vino->getIdorigen(); ?>" /><br/><br/>
            Idtipo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" required name="idtipo" value="<?php echo $vino->getIdtipo(); ?>" /><br/><br/>                      
            <input type="submit" value="Insertar"/>
        </form>
        <a href="index.php">Volver atrás</a>
    </body>
</html>
<?php
$bd->close();
?>