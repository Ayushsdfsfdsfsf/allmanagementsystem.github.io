<?php
include("conn.php");
session_start();

unset($_SESSION['parent']);
header("Location: ../index.php");
exit;
?>