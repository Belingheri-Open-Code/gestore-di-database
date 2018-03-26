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
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "dbname";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SHOW TABLES";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $i=0;
   $tablename=$row['Tables_in_'.$dbname];
   echo "<h2>Nome: <b>$tablename</b></h2>
        <table class='table table-striped'>";
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
    echo "<tr><th  scope='col'> Dati:</th></tr><tr>";
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
    echo "</table><hr>";
}
$conn->close();
?>
