<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageTipo($bd);

//¿Quién es el usuario que quiere insertar?
//Validación de datos (en servidor y cliente)
$id= Request::post("idtipo");
$nombre= Request::post("nombre");
$tipo = new Tipo($id, $nombre);
$r = $gestor->set($tipo);
$bd->close();
header('Location:index.php?op=edit&r='.$r);
