<?php 
require_once '../Model/Posibilidad.php';
require_once '../Connection/Connection.php';

$descripcion = $_POST['descripcion'];
$nombre = $_POST['nombre'];
$posibilidad = new Posibilidad();
session_start();
$persona = $_SESSION['user'];
$res = $posibilidad->registrar($nombre, $descripcion,$persona['id']);
if($res){
	header("Location: ../../user.php?msg=1");
}else{
	header("Location: ../../user.php?msg=2");
}
/*
if($res){
	session_start();
	$_SESSION['user'] = $arrayName = array('id' => $persona->id, 'name' => $persona->nombre);
	
}else{
	header("Location: ../../index.php?msg=2");
}
*/
?>
