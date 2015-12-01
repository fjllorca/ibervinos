 <?php
    require '../clases/AutoCarga.php';
    $bd = new DataBase();
    $gestor = new ManageOrigen($bd);
    $id = Request::get("idorigen");
    $origen = $gestor->get($id);
    
 ?>
<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" type="text/css" href="../css/main.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Modificar Vino</h2>
        <form method="POST" action="phpedit.php"> 
             idorigen: <input type="number" name="idorigen" value="<?php echo $origen->getIdorigen(); ?>" /><br/><br/>
            Nombre: <input type="text" name="nombre" value="<?php echo $origen->getNombre(); ?>" /><br/><br/>
           
        
         
            <!-- EL id siempre oculto ya que hace falta en la siguiente página -->
            <input type="hidden" name="idorigen" value="<?php echo $origen->getIdorigen(); ?>" /><br/>
            <input type="submit" value="Modificar"/>
        </form>
        <a href="index.php">Volver atrás</a>
    </body>
</html>
<?php
$bd->close();
?>