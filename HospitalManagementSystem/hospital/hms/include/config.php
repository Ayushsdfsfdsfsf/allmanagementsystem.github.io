<?php
define('DB_SERVER','sql210.epizy.com');
define('DB_USER','epiz_30460933');
define('DB_PASS' ,'VDE5vBxN6DrI');
define('DB_NAME', 'epiz_30460933_hms');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>