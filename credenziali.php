<?php
session_start();
	$servername = "localhost";
	$username = "tuo_username";
	$password = "tua_passwd";
	if (isset($_POST['dbname'])) 
	{
    	$_SESSION['dbname']=$_POST['dbname'];
		echo "scelto ".$_SESSION['dbname'];
	}else{
		$dbname = "";//si pu� lasciare vuoto
	}
	if (isset($_SESSION['dbname']))
	{
		$dbname=$_SESSION['dbname'];
	}
?>