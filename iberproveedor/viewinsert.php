<?php
    require '../clases/AutoCarga.php';
    $bd = new DataBase();
    $gestor = new ManageProveedor($bd);
    $id = Request::get("idproveedor");
    $proveedor = $gestor->get($id);
    $gestorProveedor = new ManageProveedor($bd);
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <title></title>
    </head>
    <body>
        <form method="POST" action="phpinsert.php">
            Idproveedor: <input type="text" name="idproveedor" value="<?php echo $proveedor->getIdproveedor(); ?>" /><br/><br/>
            Nombre: <input type="text" name="nombre" value="<?php echo $proveedor->getNombre(); ?>" /><br/><br/>                     
            Ciudad: <input type="text" name="ciudad" value="<?php echo $proveedor->getCiudad(); ?>" /><br/><br/>
            Direccion: <input type="text" name="direccion" value="<?php echo $proveedor->getDireccion(); ?>" /><br/><br/>
            Telefono: <input type="text" name="telefono" value="<?php echo $proveedor->getTelefono(); ?>" /><br/><br/>
            E-mail: <input type="text" name="email" value="<?php echo $proveedor->getEmail(); ?>" /><br/><br/>
            <input type="submit" value="Insertar"/>
        </form>
        <a href="index.php">Volver atrás</a>
    </body>
</html>
<?php
$bd->close();
?>