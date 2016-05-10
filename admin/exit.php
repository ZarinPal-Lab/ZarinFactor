<?php
session_start();
$_SESSION['logintemp'] = '0';
header("location: index.php");
?>
