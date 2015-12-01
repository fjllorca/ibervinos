<?php

require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageTipo($bd);

$id= Request::post("idtipo");
$nombre= Request::post("nombre");
$tipo = new Tipo($id, $nombre);
$r = $gestor->insert($tipo);
$bd->close();
header('Location:index.php?op=insert&r='.$r);
