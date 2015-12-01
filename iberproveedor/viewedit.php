 <?php
    require '../clases/AutoCarga.php';
    $bd = new DataBase();
    $gestor = new ManageProveedor($bd);
    $id = Request::get("idproveedor");
    $proveedor = $gestor->get($id);
    /*$gestorProveedor = new ManageProveedor($bd);*/
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <title></title>
    </head>
    <body>
        <form method="POST" action="phpedit.php">
            
            Nombre:&nbsp;&nbsp;&nbsp; <input type="text" required name="nombre" value="<?php echo $proveedor->getNombre(); ?>" /><br/><br/>                     
            Ciudad:&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" required name="ciudad" value="<?php echo $proveedor->getCiudad(); ?>" /><br/><br/>
            Direccion: <input type="text" required name="direccion" value="<?php echo $proveedor->getDireccion(); ?>" /><br/><br/>
            Telefono: &nbsp;<input type="text" name="telefono" value="<?php echo $proveedor->getTelefono(); ?>" /><br/><br/>
            E-mail:&nbsp;&nbsp; &nbsp;&nbsp;<input type="text" required name="email" value="<?php echo $proveedor->getEmail(); ?>" /><br/><br/>
            <!-- EL id siempre oculto ya que hace falta en la siguiente página -->
            <input type="hidden" name="idproveedor" value="<?php echo $proveedor->getIdproveedor(); ?>" /><br/><br/>
            <input type="submit" value="Editar"/>
        </form>
        <a href="index.php">Volver atrás</a>
    </body>
</html>
<?php
$bd->close();
?>