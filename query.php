<?php

include("./template/header.php");
?>
				<style>
					div.ex3 {
				    overflow: auto;
						}
					</style>
				</head>
<?php
include("./template/navbar.php");
?>
				<body>
					<!--//autoresize-->
  <script src="./lib/jquery.autosize.js"></script>
                <script>
                             $( "#mostra" ).click(function() {
                            $( "#querySql" ).show( "fast"); 
                            $( "#mostrali" ).addClass( "active" );
                            $( "#nascondili" ).removeClass( "active" );
                            });
                            
                            $( "#nascondi" ).click(function() {
                            $( "#querySql" ).hide( "fast"); 
                           $( "#nascondili" ).addClass( "active" );
                            $( "#mostrali" ).removeClass( "active" );
                            });
				 $(function(){
					 $('textarea').autosize();
					 $("#scroll").css("height",$(window).height()+"px");
				 });
                            </script>
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-5" id="querySql" >
									<form action="" method="post">
										<div class="form-group">
											<label for="comment">SQL:</label>
											<textarea  id="tags" style="resize:none;" class='form-control'  placeholder='descrizione' name='descrizione' required></textarea>
										</div>
										<button id="buttonForm" type="submit" class="btn btn-default" >Invia</button>
									</form>

<?php
include("suggerimenti.php");
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
		mysqli_autocommit($conn,TRUE);
        	mysqli_query($conn,"START TRANSACTION");
		$struttura = $conn->query($sql);
		if (is_bool($struttura))
			{
			if ($struttura) { 
				echo "<p>Corretto - " . $conn->affected_rows . " righe alterate</p><br>";
				mysqli_query($conn,"COMMIT");
			    }
			  else {
				  echo $conn->error . "<br>ROLLBACK fatto!";
				  mysqli_query($conn,"ROLLBACK");
			  }
			}
		  else
			{
			mysqli_query($conn,"COMMIT");
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
		mysqli_autocommit($conn,TRUE);
		}

	catch(Exception $e){echo 'Message: ' . $e->getMessage();		}

	$conn->close();
}
?>
									<br><hr>
									<a href="./index.php?Logout=true">
										<button class='btn btn-secondary btn-sm' type="submit">Logout</button>
									</a>
									</div>
									<div class="col-sm-7">
										<div id="scroll" class="ex3" > 
										<?php include("./show.php"); ?>
										</div>
									</div>
								</div>
							</div>
                            <script>
                            function mostra(){
                            	$( '#querySql' ).show('fast');
                            }
                            function nascondi(){
                            $( '#querySql' ).hide('fast');
                            }
                            </script>
                  

						</body>
					</html>

