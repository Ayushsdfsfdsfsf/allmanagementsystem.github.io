<?php
include("conn.php");
session_start();

unset($_SESSION['librarian']);
header("Location: ../index.php");
exit;
?>