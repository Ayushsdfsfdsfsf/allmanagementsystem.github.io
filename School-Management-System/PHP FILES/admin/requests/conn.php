<?php
	$conn = mysqli_connect("localhost","micasa_portal","Micasa@678123","micasa_portal");
	//$conn = mysqli_connect("localhost","root","","realestate_portal");
	if (!$conn)
	{
	die("Connection failed: " . mysqli_connect_error());
	}
?>