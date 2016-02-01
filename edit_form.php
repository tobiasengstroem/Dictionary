<?php
include_once 'dbconfig.php';  //Anslutning till DB

if($_GET['edit_id']) //GET (input)-variabel
{
	$id = $_GET['edit_id'];	
	$stmt=$db_con->prepare("SELECT * FROM ords WHERE ordid=:id"); //Deklarerar värden från databastabellen. Se 'name' () och 'value' () i input-elementen
	$stmt->execute(array(':id'=>$id));	//?
	$row=$stmt->fetch(PDO::FETCH_ASSOC); //?
}

?>
<style type="text/css">
#dis{
	display:none;
}
</style>
    
    <div id="dis">
    
	</div>
        
 	
	 <form method='post' id='emp-UpdateForm' action='#'>
 
    <table class='table table-bordered'>
 		<input type='hidden' name='ordid' value='<?php echo $row['ordid']; ?>' />
        <tr>
            <td>English</td>
            <td><input type='text' name='english' class='form-control' value='<?php echo $row['english']; ?>' required></td>
        </tr>
 
        <tr>
            <td>Wordtype</td>
            <td><input type='text' name='wordtype' class='form-control' value='<?php echo $row['wordtype']; ?>' required></td>
        </tr>
 
        <tr>
            <td>Definition</td>
            <td><input type='text' name='definition' class='form-control' value='<?php echo $row['definition']; ?>' required></td>
        </tr>
		
		<tr>
            <td>Swedish</td>
            <td><input type='text' name='swedish' class='form-control' value='<?php echo $row['swedish']; ?>' required></td>
        </tr>
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-update" id="btn-update">
    		<span class="glyphicon glyphicon-plus"></span> Save Updates
			</button>
            </td>
        </tr>
 
    </table>
</form>
     
