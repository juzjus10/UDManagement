<?php
ob_start();
session_start();  
$_SESSION["employeeNo"] = $_GET['employeeNo'];
header('Location: profile.php');
exit();

?>