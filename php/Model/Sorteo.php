<?php 

class Sorteo
{
	private $pdo;
    
    public $jugadorRecibe;
    public $jugadorEntrega;  

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

	public function sortearAmigos() {
		$persona = new Persona();
		$array = $persona->listar();
		shuffle($array);
		for ($i=0; $i < count($array) -1 ; $i++) { 
			$amigoEntega = $array[$i];
			$secretoRecibe = $array[$i+1];
			$this->registrar($secretoRecibe->id, $amigoEntega->id);
		}
		$amigoEntega = $array[count($array) -1];
		$secretoRecibe = $array[0];
		$this->registrar($secretoRecibe->id, $amigoEntega->id);
	}

	public function listar(){
		try{
			$query = "SELECT * FROM JuegosPersonas";
			$response = $this->pdo->prepare($query);
			$response->execute();
			return $response->fetchall(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	private function registrar($jugadorRecibe,$jugadorEntrega)
	{
		try 
		{
		$sql = "INSERT INTO JuegosPersonas (jugadorRecibe,jugadorEntrega) 
		        VALUES (?, ?)";
		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$jugadorRecibe,
					$jugadorEntrega
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