<?php 

class Persona
{
	private $pdo;
    
    public $id;
    public $nombre;
    public $identification;  
    public $passwd;   

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
 	

	public function listar(){
		try{
			$query = "SELECT * FROM Personas";
			$response = $this->pdo->prepare($query);
			$response->execute();
			return $response->fetchall(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function login($identification, $passwd){
		try{
			$query = "SELECT * FROM Personas WHERE identification = ? AND passwd = ?";
			$response = $this->pdo->prepare($query);
			$response->execute(array($identification,$passwd));
			$personatmp = $response->fetch(PDO::FETCH_OBJ);
			if($personatmp){
	    		$this->nombre = $personatmp->nombre;
	    		$this->id = $personatmp->id;
	    		$this->identification = $personatmp->identification;
	    		$this->passwd = $personatmp->passwd;
	    		return true;
			}else{
				return false;
			}
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function registrar($nombre, $identification, $passwd)
	{
		try 
		{
		$sql = "INSERT INTO Personas (nombre,identification,passwd) 
		        VALUES (?, ?, ?)";
		$this->pdo->prepare($sql)
		     ->execute(
				array(
					 $nombre,
					 $identification,
					 $passwd
                )
			);
		 return $this->pdo->lastInsertId();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}

?>