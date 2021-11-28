<?php
include("conn.php");
session_start();

unset($_SESSION['student']);
header("Location: ../index.php");
exit;
?>