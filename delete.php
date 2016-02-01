<?php
//DELETE-script (PHP)
include_once 'dbconfig.php';  //Anslutning till DB 
//POST-VARIABEL med värde 
if($_POST['del_id'])
{
	$id = $_POST['del_id']; //... deklarerad för variabeln $id, vilket sedan kopplas till SQL-SATSEN	
	$stmt=$db_con->prepare("DELETE FROM ords WHERE ordid=:id"); //filtrering efter ID-värden (Auto Increment)
	$stmt->execute(array(':id'=>$id));	//?
}
?>