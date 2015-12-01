<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageProveedor($bd);
$id= Request::get("idproveedor");
$r = $gestor->delete($id);
$bd->close();
header('Location:index.php?op=delete&r='.$r);