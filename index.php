<?php

include("./credenziali.php");

if (isset($_GET["Logout"])){session_unset(); session_destroy();}

include("./template/header.php");

if(isset($_POST["id"])&&isset($_POST["pwd"]))

{

	if($_POST["id"]==$userFrom && $_POST["pwd"]==$passFrom){

		$_SESSION["loggato"]=true;

		header("location: ./query.php");

	}

	else{

		$_SESSION["loggato"]=false;

		echo "<h2>Password o id sbagliato riprova!</h2><hr>";

	}

}

?>

</head>

<body>

	<?php

	if (!isset($_SESSION["loggato"])){

		$_SESSION["loggato"]=false;

	}

	?>

	<div class="container">

		<div class="row">

			<div class="col-sm-6" >

				<form action="" method="post">

				    <div class="form-group">

				      <label for="id">Nome:</label>

				      <input name="id" type="text" class="form-control" id="id" placeholder="userFrom" required="required" >

				    </div>

				    <div class="form-group">

				      <label for="pwd">Password:</label>

				      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="passFrom" required="required">

				    </div>

				    <button id="buttonForm" type="submit" class="btn btn-default" >Invia</button>

				</form>

			</div>

			<div class="col-sm-6" >

				<h1>Ciao! Benvenuto in in questo gestionale di DB</h1>

				<p>Se vuoi contribuire allo sviluppo del codice visita il repository su gitHub e contribusci</p>

				<a href="https://github.com/Belingheri-Open-Code/gestore-di-database">Vai su GitHub</a>

			</div>

		</div>

	</div>

</body>

</html>
