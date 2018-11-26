<?php 
require_once '../Model/Persona.php';
require_once '../Connection/Connection.php';

if(isset($_GET['msg'])){
	if($_GET['msg'] == '1'){
  		echo "SALIENDO";
  		session_start();
  		unset($_SESSION['user']);
  		session_destroy();
  		header("Location: ../../index.php?msg=1");
	}else if($_GET['msg'] == '2'){
  		$identificacion = $_POST['identificacion'];
		$passwd = $_POST['password'];
		$persona = new Persona();
		$res = $persona->login($identificacion, $passwd);
		if($res){
			session_start();
			$_SESSION['user'] = $arrayName = array('id' => $persona->id, 'name' => $persona->nombre);
			header("Location: ../../user.php");
		}else{
			header("Location: ../../index.php?msg=2");
		}
	}
}
?>
