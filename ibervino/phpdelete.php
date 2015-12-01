<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageVino($bd);
$id= Request::get("idvino");
$r = $gestor->delete($id);
$bd->close();
header('Location:index.php?op=delete&r='.$r);