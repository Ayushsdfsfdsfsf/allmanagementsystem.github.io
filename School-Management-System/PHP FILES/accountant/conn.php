<?php
 	//$conn = mysqli_connect("localhost","sayatech_sayatech","Sarfraz@786","sayatech_sms");
 	$conn = mysqli_connect("localhost","root","","sms");
	if (!$conn) 
	{
	die("Connection failed: " . mysqli_connect_error());
	}
?>