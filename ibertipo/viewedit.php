 <?php
    require '../clases/AutoCarga.php';
    $bd = new DataBase();
    $gestor = new ManageTipo($bd);
    $id = Request::get("idtipo");
    $tipo = $gestor->get($id);
    
 ?>
<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" type="text/css" href="../css/main.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" action="phpedit.php">  
             idtipo<input type="text" name="idtipo" value="<?php echo $tipo->getIdtipo(); ?>" /><br/><br/> 
            Nombre<input type="text" name="nombre" value="<?php echo $tipo->getNombre(); ?>" /><br/><br/>
            <br/>
            <!-- EL id siempre oculto ya que hace falta en la siguiente página -->
            <input type="hidden" name="idvino" value="<?php echo $tipo->getIdtipo(); ?>" /><br/>
            <input type="submit" value="Modificar"/>
        </form>
        <a href="index.php">Volver atrás</a>
    </body>
</html>
<?php
$bd->close();
?>