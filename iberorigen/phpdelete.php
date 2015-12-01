<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageOrigen($bd);
$id= Request::get("idorigen");
$r = $gestor->delete($id);
$bd->close();
header('Location:index.php?op=delete&r='.$r);