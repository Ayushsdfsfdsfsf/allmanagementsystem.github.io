<?php
 	//$conn = mysqli_connect("localhost","sayatech_sayatech","Sarfraz@786","sayatech_sms");
 	$conn = mysqli_connect("sql210.epizy.com","epiz_30460933","VDE5vBxN6DrI","epiz_30460933_sms");
	if (!$conn) 
	{
	die("Connection failed: " . mysqli_connect_error());
	}
?>