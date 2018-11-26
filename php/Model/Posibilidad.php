<?php 

class Posibilidad
{
	private $pdo;
    
    public $nombre;
    public $descripcion;  

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Connection::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function getFriend($id){
		try{
			$query = "SELECT * FROM Personas WHERE id = (SELECT JuegosPersonas.jugadorRecibe FROM JuegosPersonas WHERE JuegosPersonas.jugadorEntrega = ?)";
			$response = $this->pdo->prepare($query);
			$response->execute(array($id));
			return $response->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}		
	}

	public function listar($id){
		try{
			$query = "SELECT * FROM Posibilidades WHERE idPersona = ?";
			$response = $this->pdo->prepare($query);
			$response->execute(array($id));
			return $response->fetchall(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function listarPosibilidadesAmigo($id){
		try{
			$query = "SELECT * FROM Posibilidades INNER JOIN JuegosPersonas ON Posibilidades.idPersona = JuegosPersonas.jugadorRecibe WHERE JuegosPersonas.jugadorEntrega = ?";
			$response = $this->pdo->prepare($query);
			$response->execute(array($id));
			return $response->fetchall(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function registrar($nombre, $descripcion, $idPersona)
	{
		try 
		{
		$sql = "INSERT INTO Posibilidades (nombre,descripcion,idPersona) 
		        VALUES (?, ?, ?)";
		$this->pdo->prepare($sql)
		     ->execute(
				array(
					 $nombre,
					 $descripcion,
					 $idPersona
                )
			);
		 return true;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}

?>