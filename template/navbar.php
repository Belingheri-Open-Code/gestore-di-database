<?php 
include("credenziali.php");
$output = explode("/",$_SERVER['PHP_SELF']);
$page= $output[count($output)-1];
if ($page!="index.php"){
	if($_SESSION["loggato"]!=true){
		if ($userFrom!="default"||$passFrom!="default"||$username != "default"){
        		header("location: ./index.php");
		}
	}  
}
?>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="./query.php">Belingheri DB</a>
    </div>
    <ul class="nav navbar-nav">
      <li id="mostrali"><a id="mostra" href='<?php if ($page=='config.php') echo "./query.php"; else echo "#"?> '>Fai la query</a></li>
      <li id="nascondili"><a id="nascondi" href='<?php if ($page=='config.php') echo "./query.php"; else echo "#"?> '>Mostra DB</a></li>
      <li><a href="./index.php?Logout="  class="btn btn-primary " style="color: black;" >Logout</a></li>
      <li id="configurazione"><a href="./config.php">Modifica file di configurazione</a></li>
	<li>
	<a href="https://github.com/Belingheri-Open-Code/gestore-di-database" style="text-decoration: none;"><img src="https://camo.githubusercontent.com/7710b43d0476b6f6d4b4b2865e35c108f69991f3/68747470733a2f2f7777772e69636f6e66696e6465722e636f6d2f646174612f69636f6e732f6f637469636f6e732f313032342f6d61726b2d6769746875622d3235362e706e67" height="25" width="25" ></a>
	</li>
    </ul>
  </div>
</nav>
