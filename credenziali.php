<?php
session_start();
//credenziali per il form di login	 
$userFrom="your_username_for_the_Form";
$passFrom="your_password_for_the_Form";
// credenziali per il DataBase	 
$servername = "localhost";	
$username = "your_username";	
$password = "your_password";

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
