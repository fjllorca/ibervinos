<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageOrigen($bd);

//¿Quién es el usuario que quiere insertar?
//Validación de datos (en servidor y cliente)
$id= Request::post("idorigen");
$nombre= Request::post("nombre");
$origen = new Origen($id, $nombre);
$r = $gestor->set($origen);
$bd->close();
header('Location:index.php?op=edit&r='.$r);
