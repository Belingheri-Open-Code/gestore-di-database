<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Pannello di configurazione</title>
  </head>
  <body>
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