<?php 
session_start();
require_once '../Model/Sorteo.php';
require_once '../Model/Persona.php';
require_once '../Connection/Connection.php';

if(isset($_SESSION['user'])){
	$persona = $_SESSION['user'];
	if($persona['id'] == 3){
		$sorteo = new Sorteo();
		$sorteo->sortearAmigos();
		var_dump($sorteo->listar());
	}
}else{
	header("Location: index.php?msg=3");
}
?>