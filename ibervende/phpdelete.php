<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageVende($bd);
$id= Request::get("idvende");
$r=$gestor->delete($id);
$bd->close();
header('Location:index.php?op=delete&r='.$r);