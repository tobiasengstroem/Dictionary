<?php
require_once 'dbconfig.php';  //Obligatorisk (endast om anslutningen är ny) anslutning till DB

	//IF-sats för MySQL-uppdateringsats i edit_form.php
	if($_POST)
	{//POST-variabler (med $-variabeler och databaskolumner) 
		$id = $_POST['ordid'];
		$english = $_POST['english'];
		$wordtype = $_POST['wordtype'];
		$definition = $_POST['definition'];
		$swedish = $_POST['swedish'];
		
		//Variabel till databasanslutning. Med förberett MySQL-statement
		$stmt = $db_con->prepare("UPDATE ords SET english=:en, wordtype=:ed, definition=:es,swedish=:sv WHERE ordid=:id");
			//Binds a parameter to the specified variable name
		$stmt->bindParam(":en", $english);	 
		$stmt->bindParam(":ed", $wordtype);
		$stmt->bindParam(":es", $definition);
		$stmt->bindParam(":sv", $definition);
		$stmt->bindParam(":id", $id);
		//IF-sats
			//...med ELSE
		if($stmt->execute())
		{
			echo "Successfully updated";
		}
		else{
			echo "Query Problem";
		}
	}

?>