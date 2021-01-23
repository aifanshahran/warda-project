<?php
session_start();
if(!isset($_SESSION["staffid"])){
header("location: loginadmin.php");
exit(); }
?>