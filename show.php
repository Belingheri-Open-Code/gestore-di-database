
<?php include("./template/header.php");?>

</head>

<body>

<?php

include ("./credenziali.php");

$conn1 = new mysqli($servername, $username, $password);

$sql = "SHOW DATABASES";

$result = $conn1->query($sql);

if ($result->num_rows > 0) {

    // output data of each row

	echo "<h2>database: $dbname</h2>";

	echo "<label for='selDB'>Seleziona il DB:</label><select class='form-control' onchange='cambiaDB(this.value)' id='selDB'><option selected disabled value=''>Seleziona un DB</option>";

    while($row = $result->fetch_assoc()) {

        foreach ($row as $value) {

                echo "<option value='".$value."'>".$value."</option>";

                if ($_SESSION['dbname']==""){

                	$_SESSION['dbname']=$value;

                }

        }

    }

	echo "</select>";

} else {

    echo "0 results";

}

$conn1->close();

	

	

?>

<script>

	function cambiaDB(t){

	console.log(t);

	if (window.XMLHttpRequest) {

            // code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp = new XMLHttpRequest();

        } else {

            // code for IE6, IE5

            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

        }

        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                //alert(this.responseText);

                location.reload();

            }

        };

		var param="dbname="+ t;

        xmlhttp.open("POST","./credenziali.php",true);

        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xmlhttp.send(param);

    }

</script>

<?php

include ("./credenziali.php");

if($_SESSION["loggato"]!=true)

	header("location: ./index.php");

try{

	

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {

		die("Connection failed: " . $conn->connect_error);

	}

	$sql = "SHOW TABLES";

	$result = $conn->query($sql);

	$mn=0;

	while($row = $result->fetch_assoc()) {

		$i=0;

	   $tablename=$row['Tables_in_'.$dbname];

	   echo "<h4>Nome tabella: <b>$tablename</b></h4>

			<button id='dati$mn' type='button' class='btn'>Dati</button>

			<button id='strutt$mn' type='button' class='btn'>Struttura</button>

			<div>

			<table class='table table-hover'>

			<thead id='$mn' style='display: none;'><tr><th  scope='col'> Struttura:</th></tr>";

	   $richiedistruttura="SHOW COLUMNS FROM $tablename";

	   $struttura = $conn->query($richiedistruttura);

	   while($row = $struttura->fetch_assoc()) {

			if($i==0){

			echo "<tr>";

			foreach ($row as $key=>$value) {

					echo "<th scope='col'>".$key."</th>";

			}

			echo "</tr>";

			$i++;

			}

			echo "<tr>";

			foreach ($row as $value) {

					echo "<td>".$value."</td>";

			}

			echo "</tr>";

		}

		$datisql="SELECT * FROM $tablename";

		$dati = $conn->query($datisql);

		echo "</thead>

				<tbody id='tb$mn' style='display: none;'><tr><th  scope='col'> Dati:</th></tr><tr>";

		$i=0;

		while($row = $dati->fetch_assoc()) {

			if($i==0){

				echo "<tr>";

				foreach ($row as $key=>$value) {

					echo "<th scope='col' >".$key."</th>";

				}

				echo "</tr>";

				$i++;

			}

			echo "<tr>";

				foreach ($row as  $value) {

					echo "<td>".$value."</td>";

				}

			echo "</tr>";

		}

		echo "</tbody></table></div><hr>

		<script>

		$( '#dati$mn' ).click(function() {

		  $( '#tb$mn' ).toggle( 'fast');

		});

		$( '#strutt$mn' ).click(function() {

		  $( 'thead#$mn' ).toggle('fast');

		});

		</script>";

		$mn++;

	}

	$conn->close();

	}catch(Exception $e)

			{

			echo 'Seleziona un database';

			}

	echo "<form action='./index.php?Logout=true'><button class='btn btn-secondary btn-sm' type='submit'>Logout</button></form>";

?>

=======
<?php include("./template/header.php");?>

</head>

<body>

<?php

include ("./credenziali.php");

$conn1 = new mysqli($servername, $username, $password);

$sql = "SHOW DATABASES";

$result = $conn1->query($sql);

if ($result->num_rows > 0) {

    // output data of each row

	echo "<h2>database: $dbname</h2>";

	echo "<label for='selDB'>Seleziona il DB:</label><select class='form-control' onchange='cambiaDB(this.value)' id='selDB'><option selected disabled value=''>Seleziona un DB</option>";

    while($row = $result->fetch_assoc()) {

        foreach ($row as $value) {

                echo "<option value='".$value."'>".$value."</option>";

                if ($_SESSION['dbname']==""){

                	$_SESSION['dbname']=$value;

                }

        }

    }

	echo "</select>";

} else {

    echo "0 results";

}

$conn1->close();

	

	

?>

<script>

	function cambiaDB(t){

	console.log(t);

	if (window.XMLHttpRequest) {

            // code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp = new XMLHttpRequest();

        } else {

            // code for IE6, IE5

            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

        }

        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                //alert(this.responseText);

                location.reload();

            }

        };

		var param="dbname="+ t;

        xmlhttp.open("POST","./credenziali.php",true);

        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xmlhttp.send(param);

    }

</script>

<?php

include ("./credenziali.php");

if($_SESSION["loggato"]!=true)

	header("location: ./index.php");

try{

	

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {

		die("Connection failed: " . $conn->connect_error);

	}

	$sql = "SHOW TABLES";

	$result = $conn->query($sql);

	$mn=0;

	while($row = $result->fetch_assoc()) {

		$i=0;

	   $tablename=$row['Tables_in_'.$dbname];

	   echo "<h4>Nome tabella: <b>$tablename</b></h4>

			<button id='dati$mn' type='button' class='btn'onclick='struttToggle(\"tb$mn\")'>Dati</button>
			
			<button id='strutt$mn' type='button' class='btn' onclick='struttToggle(\"th$mn\")'>Struttura</button>

			<div>

			<table class='table table-hover'>

			<thead id='th$mn' style='display: none;'><tr><th  scope='col'> Struttura:</th></tr>";

	   $richiedistruttura="SHOW COLUMNS FROM $tablename";

	   $struttura = $conn->query($richiedistruttura);

	   while($row = $struttura->fetch_assoc()) {

			if($i==0){

			echo "<tr>";

			foreach ($row as $key=>$value) {

					echo "<th scope='col'>".$key."</th>";

			}

			echo "</tr>";

			$i++;

			}

			echo "<tr>";

			foreach ($row as $value) {

					echo "<td>".$value."</td>";

			}

			echo "</tr>";

		}

		$datisql="SELECT * FROM $tablename";

		$dati = $conn->query($datisql);

		echo "</thead>

				<tbody id='tb$mn' style='display: none;'><tr><th  scope='col'> Dati:</th></tr><tr>";

		$i=0;

		while($row = $dati->fetch_assoc()) {

			if($i==0){

				echo "<tr>";

				foreach ($row as $key=>$value) {

					echo "<th scope='col' >".$key."</th>";

				}

				echo "</tr>";

				$i++;

			}

			echo "<tr>";

				foreach ($row as  $value) {

					echo "<td>".$value."</td>";

				}

			echo "</tr>";

		}

		echo "</tbody></table></div><hr>";

		$mn++;

	}

	$conn->close();

	}catch(Exception $e)

			{

			echo 'Seleziona un database';

			}
