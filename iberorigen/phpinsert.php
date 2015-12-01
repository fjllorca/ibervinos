<?php

require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageOrigen($bd);

$id=Request::post("idorigen");
$nombre= Request::post("nombre");
$origen = new Origen($id, $nombre);
$r = $gestor->insert($origen);
$bd->close();
header('Location:index.php?op=insert&r='.$r);
