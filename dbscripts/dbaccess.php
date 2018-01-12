<?php
	

	/*--- Using the database  ---*/
	/*------------------------------------------------------------------*/
	


	$connection= new mysqli("localhost:3306", "root", "Umar@295","merkezalisbaah");
	//$connection= new mysqli("localhost", "onlineis_umar", "Umar@295","onlineis_merkezalisbaah");
	if($connection->connect_error){
		die('Could not connect :'.$connection->connect_error);
		exit();
	}else{
		echo "<p><b> We have successfully connected </b></p>";
		echo "<p><b> We are now using cleaners review database.</b></p>";
	}

			

?>




