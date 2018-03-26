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
            <div class="col-sm-5">
                <form action="" method="post">
                    <div class="form-group">
                    <label for="password">Password :</label>
                    <input type="password" class="form-control" placeholder='password' name="pass" required>
                    </div>
                    <div class="form-group">
                    <label for="comment">SQL:</label>
                    <textarea style="resize:none;" class='form-control'  placeholder='descrizione' name='descrizione' required></textarea>
                    </div>
                    <button id="buttonForm" type="submit" class="btn btn-default" >Invia</button>
                </form>
                <?php
if (isset($_POST["pass"])){
    if($_POST["pass"]=="password"){
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "dbname";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql=$_POST["descrizione"];
        try{
            $struttura = $conn->query($sql);
            if (is_bool($struttura))
            {
                if ($struttura)
                    echo "Corretto - ".$conn->affected_rows;
                else 
                    echo $conn->error;
            }else{
            $i=0;
            while($row = $struttura->fetch_assoc()) {
                if($i==0){
                echo "<table class='table table-striped'><thead><tr>";
                foreach ($row as $key=>$value) {
                        echo "<th scope='col'>".$key."</th>";
                }
                echo "</tr></thead><tbody>";
                $i++;
                }
                echo "<tr>";
                foreach ($row as $value) {
                        echo "<td>".$value."</td>";
                }
                echo "</tr>";
            }
            echo "</tbody></table>";
        }}
        catch(Exception $e) {
          echo 'Message: ' .$e->getMessage();
        }
        $conn->close();
    }
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
