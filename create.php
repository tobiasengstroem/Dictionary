<?php
require_once 'dbconfig.php'; //Obligatorisk (endast om anslutningen är ny) anslutning till DB

	
	if($_POST)
	{//Variabler
		$english = $_POST['english'];
		$wordtype = $_POST['wordtype'];
		$definition = $_POST['definition'];
		$swedish = $_POST['swedish'];
			//PDO-sats, villkorlig.
		try{
			//Variabel till databasanslutning. Med förberett MySQL-statement
			$stmt = $db_con->prepare("INSERT INTO ords(english,wordtype,definition,swedish) VALUES(:ename, :edept, :esalary, :eswedish)");
			//Binds a parameter to the specified variable name
			$stmt->bindParam(":ename", $english);
			$stmt->bindParam(":edept", $wordtype);
			$stmt->bindParam(":esalary", $definition);
			$stmt->bindParam(":eswedish", $swedish);
			
			if($stmt->execute())
			{
				echo "Successfully Added";
			}
			else{
				echo "Query Problem";
			}	
		}
		catch(PDOException $e){
		//	echo $e->getMessage();	//
		}
	}

?>

		