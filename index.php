<?php
if(!isset($_COOKIE["log"])) {
    $cookie_name = "log";
	$cookie_value = "false";
	setcookie($cookie_name, $cookie_value);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Belingheri DB</title>
		<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				</head>
				<body>
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-5" style="position:relative">
									<form action="" method="post">
										<div class="form-group">
											<label for="password">Password :</label>
											<input type="password" class="form-control" placeholder='password' name="pass" <?php if(!$_COOKIE["log"]=="true") echo"required"; ?>>
											</div>
											<div class="form-group">
												<label for="comment">SQL:</label>
												<textarea style="resize:none;" class='form-control'  placeholder='descrizione' name='descrizione' required></textarea>
											</div>
											<button id="buttonForm" type="submit" class="btn btn-default" >Invia</button>
										</form>

<?php
if (isset($_POST["pass"])||$_COOKIE["log"])
	{
	if ($_POST["pass"] == "password"||$_COOKIE["log"]=="true")
		{
		$cookie_name = "log";
		$cookie_value = "true";
		setcookie($cookie_name, $cookie_value);
		include ("./credenziali.php");
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error)
			{
			die("Connection failed: " . $conn->connect_error);
			}
		$sql = $_POST["descrizione"];
		try
			{
			echo "<br><p>".$sql."</p><br>";
			$struttura = $conn->query($sql);
			if (is_bool($struttura))
				{
				if ($struttura) echo "<p>Corretto - " . $conn->affected_rows . " righe alterate</p><br>";
				  else echo $conn->error;
				}
			  else
				{
				$i = 0;
				while ($row = $struttura->fetch_assoc())
					{
					if ($i == 0)
						{
						echo "<table class='table table-striped'><thead><tr>";
						foreach($row as $key => $value)
							{
							echo "<th scope='col'>" . $key . "</th>";
							}

						echo "</tr></thead><tbody>";
						$i++;
						}

					echo "<tr>";
					foreach($row as $value)
						{
						echo "<td>" . $value . "</td>";
						}

					echo "</tr>";
					}

				echo "</tbody></table>";
				}
			}

		catch(Exception $e)
			{
			echo 'Message: ' . $e->getMessage();
			}

		$conn->close();
		}
		else{
		echo "<h2>Password errata<h2><small>non cancellare mai i cookie ;)</small>";}
	}
?>
									</div>
									<div class="col-sm-7">
										<?php include("./show.php"); ?>
									</div>
								</div>
							</div>
						</body>
					</html>

