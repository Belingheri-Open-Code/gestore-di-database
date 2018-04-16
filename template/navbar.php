<?php
session_start();
if($_SESSION["loggato"]!=true){
	header("location: ./index.php");
}
?>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="./query.php">Belingheri DB</a>
    </div>
    <ul class="nav navbar-nav">
    <?php  
    $output = explode("/",$_SERVER['PHP_SELF']);
	$page= $output[count($output)-1];
    ?>
      <li id="mostrali"><a id="mostra" href='<?php if ($page=='config.php') echo "./query.php"; else echo "#"?> '>Fai la query</a></li>
      <li id="nascondili"><a id="nascondi" href='<?php if ($page=='config.php') echo "./query.php"; else echo "#"?> '>Mostra DB</a></li>
      <li><a href="./index.php?Logout="  class="btn btn-primary " style="color: black;" >Logout</a></li>
      <li id="configurazione"><a href="./config.php">Modifica file di configurazione</a></li>
    </ul>
  </div>
</nav>
