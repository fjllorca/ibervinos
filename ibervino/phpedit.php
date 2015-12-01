<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageVino($bd);

//¿Quién es el usuario que quiere insertar?
//Validación de datos (en servidor y cliente)
$id= Request::post("idvino");
$nombre= Request::post("nombre");
$variedad= Request::post("variedad");
$idorigen= Request::post("idorigen");
$idtipo= Request::post("idtipo");
$vino = new Vino($id, $nombre, $variedad, $idorigen, $idtipo);
$r = $gestor->set($vino);
$bd->close();
header('Location:index.php?op=edit&r='.$r);
