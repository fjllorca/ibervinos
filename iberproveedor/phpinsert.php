<?php

require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageProveedor($bd);

$id= Request::post("idproveedor");
$nombre= Request::post("nombre");
$ciudad= Request::post("ciudad");
$direccion= Request::post("direccion");
$telefono= Request::post("telefono");
$email= Request::post("email");
$proveedor = new Proveedor($id, $nombre, $ciudad, $direccion, $telefono, $email);
$r = $gestor->insert($proveedor);
$bd->close();
header('Location:index.php?op=insert&r='.$r);
