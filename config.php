<?php
include("./template/header.php"); session_start();
?>
<script>
    $("#configurazione").addCalss("active");
</script>
				</head>
<?php
include("./template/navbar.php");
?>
    <body>
    <?php if($_SESSION["loggato"]!=true){
	if ($userFrom!="default"||$passFrom!="default"||$username != "default"){
      		header("location: ./index.php");
	}
    }  ?>
      
    <?php if($_GET['status'] == '1') { ?>
    <div class="container alert alert-success" role="alert" style="margin-top: 20px;">
    	<strong>Nuovo file generato con successo!</strong>
    </div>
    <?php } ?>
    <div class="container">
    	<div class="row">
        	<div class="col-sm-6">
            	<form method="post" action="access-details.php">
                	<div class="form-group">
                      <h2>Credenziali form di login</h2>
                      <input type="text" name="username_login_service" class="form-control" placeholder="Il tuo Username" required>
                      <input type="password" name="password_login_service" class="form-control" placeholder="La tua Password" required>
                    </div>
                    <div class="form-group">
                      <h2>Credenziali Database</h2>
                      <input type="text" name="username_login_db" class="form-control" placeholder="Username " required>
                      <input type="password" name="password_login_db" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <h2>Nome Database</h2>
                      <input type="text" name="db_name" class="form-control" placeholder="Il tuo database">
                    </div>
                    <button type="submit" class="btn btn-default">Crea file di configurazione</button>
                </form>
            </div>
            <div class="col-sm-6">
            	<h1>Pannelo di configurazione</h1>
                <p>Permette di creare nuovo file di configurazione e sostituirlo direttamente con quello già esistente.</p>
            </div>
        </div>
    </div>
  </body>
</html>
