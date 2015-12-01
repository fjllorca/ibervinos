<?php

require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageVino($bd);

$id= Request::post("idvino");
$nombre= Request::post("nombre");
$variedad= Request::post("variedad");
$idorigen= Request::post("idorigen");
$idtipo= Request::post("idtipo");
$vino = new Vino($id, $nombre, $variedad, $idorigen, $idtipo);
$r = $gestor->insert($vino);
$bd->close();
header('Location:index.php?op=insert&r='.$r);
