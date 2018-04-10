<?php

include("./template/header.php");
?>

				</head>
				<body>
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-5" >
									<form action="" method="post">
										<div class="form-group">
											<label for="comment">SQL:</label>
											<textarea style="resize:none;" class='form-control'  placeholder='descrizione' name='descrizione' required></textarea>
										</div>
										<button id="buttonForm" type="submit" class="btn btn-default" >Invia</button>
									</form>

<?php
if (isset($_POST["descrizione"]))
{
	include ("./credenziali.php");
	if($_SESSION["loggato"]!=true){
		header("location: ./index.php");
	}

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error)
		{die("Connection failed: " . $conn->connect_error);}
	$sql = $_POST["descrizione"];
	try
		{
		echo "<br><code>".$sql."</code><br>";
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

	catch(Exception $e){echo 'Message: ' . $e->getMessage();		}

	$conn->close();
}
?>
									<br><hr>
									<form action="./index.php?Logout=true">
										<button class='btn btn-secondary btn-sm' type="submit">Logout</button>
									</form>
									</div>
									<div class="col-sm-7">
										<?php include("./show.php"); ?>
									</div>
								</div>
							</div>
						</body>
					</html>

