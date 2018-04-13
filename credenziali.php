<?php
session_start();
//credenziali per il form di login	 
$userFrom="default";
$passFrom="default";
// credenziali per il DataBase	 
$servername = "localhost";	
$username = "default";	
$password = "";

if (isset($_POST['dbname'])) 
{
	$_SESSION['dbname']=$_POST['dbname'];
	echo "scelto ".$_SESSION['dbname'];
}else{
	$dbname = "";//si può lasciare vuoto
}
if (isset($_SESSION['dbname']))
{
	$dbname=$_SESSION['dbname'];
}
?>
