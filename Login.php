<?php
require 'vendor/autoload.php'; // include Composer's autoloader
use MongoDB\Client as Mongo;

$client = new Mongo();
$collection = $client->Proyecto->usuarios;


	if( isset($_POST["iniciarSesion"]) ){
		
		$usuario 	= $_POST["txt_usuario"];
		$password 	= $_POST["txt_password"];

		try{
			$result = $collection->find(['Usuario' => $usuario,'Password' => $password]);
			
			
			if($result){
				foreach ($result as $entry) {
			    	echo $entry['Id'], ': ', $entry['Usuario'], "\n";
			    	session_start();
			    	$_SESSION['usuario'] = $entry['Usuario'];
			    	header("Location: MongoActions.php");
			    	exit();
				}
			}else{
				echo "No existe el usuario :(";
			}

		}catch(Exception $e){
			echo "Error";

		}

		

	}else if( isset($_POST["iniciarSesion2"]) ){
		echo "no inicio sesion";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>BD2 - 201318613</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css" media="screen">
</head>
	<body>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">BD2</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarColor03">
		    <ul class="nav navbar-nav ml-auto">		 
	            <li class="nav-item">
	              <a class="nav-link" href="Index.php" target="_blank">Inicio</a>
	            </li>
	          </ul>
		  </div>
		</nav>


		<center>
			<h1>Proyecto 1</h1>
		</center>

		<form action="<?php $_PHP_SELF ?>" method="POST">
			<fieldset>

			    <div class="form-group">
			      <label class="col-sm-2 col-form-label" >Usuario</label>
			      <div class="col-sm-4">
			      	<input type="text" class="form-control" placeholder="Mi Usuario" required="true" name="txt_usuario">
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="col-sm-2 col-form-label" >Contraseña</label>
				     <div class="col-sm-4">
					   	<input type="password" class="form-control" placeholder="***" required="true" name="txt_password">
				    </div>
			    </div>
				    

			    <div class="col-sm">
			    	<button type="submit" class="btn btn-primary" name="iniciarSesion">Iniciar Sesion</button>
			    </div>

			</fieldset>
		</form>
			


		<script src="https://bootswatch.com/_vendor/jquery/dist/jquery.min.js"></script>
	    <script src="https://bootswatch.com/_vendor/popper.js/dist/umd/popper.min.js"></script>
	    <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
	    <script src="https://bootswatch.com/_assets/js/custom.js"></script>

	</body>
</html>