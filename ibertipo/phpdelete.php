<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageTipo($bd);
$id= Request::get("idtipo");
$r = $gestor->delete($id);
$bd->close();
header('Location:index.php?op=delete&r='.$r);