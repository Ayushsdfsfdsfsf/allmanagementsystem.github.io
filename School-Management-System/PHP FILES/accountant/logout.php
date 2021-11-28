<?php
include("conn.php");
session_start();

unset($_SESSION['accountant']);
header("Location: ../index.php");
exit;
?>