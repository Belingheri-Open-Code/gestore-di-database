<?php 

	$db_name = "information_schema";
    if($_POST['db_name'] != null){
    	$db_name = $_POST['db_name'];
    }

    $new_config_file_style = '<?php
  session_start();
  //credenziali per il form di login	 
  $userFrom="'.$_POST['username_login_service'].'";
  $passFrom="'.$_POST['password_login_service'].'";
  // credenziali per il DataBase	 
  $servername = "localhost";	
  $username = "'.$_POST['username_login_db'].'";	
  $password = "'.$_POST['password_login_db'].'";
  if (isset($_POST["dbname"])) 
  {
	  $_SESSION["dbname"]=$_POST["dbname"];
	  echo "scelto ".$_SESSION["dbname"];
  }else{
	  $dbname = "'.$db_name.'";//si può lasciare vuoto
  }
  if (isset($_SESSION["dbname"]))
  {
	  $dbname=$_SESSION["dbname"];
  }
?>';

    $credentials_file = fopen('credenziali.php', 'w') or die("Errore nell'apertura del file");
    fwrite($credentials_file, $new_config_file_style);
    fclose($credentials_file);
    header('Location: index.php');
?>
