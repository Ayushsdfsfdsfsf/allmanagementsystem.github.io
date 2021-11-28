<?php
include("conn.php");
session_start();

unset($_SESSION['teacher']);
header("Location: ../index.php");
exit;
?>