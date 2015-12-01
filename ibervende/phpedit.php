<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageVende($bd);

$id=  Request::post('idvende');
$idvino= Request::post("idvino");
$idtipo= Request::post("idtipo");
$idorigen= Request::post("idorigen");
$precio= Request::post("precio");
$vende= new Vende($id,$idvino,$idtipo,$idorigen,$precio);
$r=$gestor->set($vende);

$bd->close();
header('Location:index.php?op=edit&r='.$r);
