<?php 
require_once '../Model/Persona.php';
require_once '../Connection/Connection.php';

$nombre = $_POST['nombre'];
$identificacion = $_POST['identificacion'];
$passwd = $_POST['password'];
$persona = new Persona();
$id = $persona->registrar($nombre, $identificacion, $passwd);
session_start();
$_SESSION['user'] = $arrayName = array('id' => $id, 'name' => $nombre);
header("Location: ../../user.php");
?>