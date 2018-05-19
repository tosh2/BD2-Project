<?php
	session_start();
	require 'vendor/autoload.php'; // include Composer's autoloader
	use MongoDB\Client as Mongo;
	$client = new Mongo();

	$usuarios = $client->Proyecto->usuarios;
	$id = $client->Proyecto->id_autoincremental->findOne(['valor' => "index"]);
	$nuevoid = $id['id'] + 1;

	$nombres 	=	"";
	$apellidos 	=	"";
	$usuario 	=	"";
	$password 	=	"";
	$edad 		=	"";

	if( isset($_POST["guardar"]) ){
		$nombres 	= $_POST["txt_nombres"];
		$apellidos 	= $_POST["txt_apellidos"];
		$usuario 	= $_POST["txt_usuario"];
		$password 	= $_POST["txt_password"];
		$edad 		= $_POST["txt_edad"];

		$nuevoUsuario = array(
							'Id' => $nuevoid, 
							'Nombres' => $nombres, 
							'Apellidos' => $apellidos, 
							'Edad' => $edad, 
							'Usuario' => $usuario, 
							'Password' => $password, 
						);

		$usuarios->insertOne($nuevoUsuario);
		$client->Proyecto->id_autoincremental->updateOne(['valor' => "index"],['$set' => ['id' => $nuevoid]]);
		$nuevoid = $nuevoid + 1;

	}else if( isset($_POST["actualizar"]) ){
		$nombres 	= $_POST["txt_nombres"];
		$apellidos 	= $_POST["txt_apellidos"];
		$usuario 	= $_POST["txt_usuario"];
		$password 	= $_POST["txt_password"];
		$edad 		= $_POST["txt_edad"];
		$nuevoid 	= $_POST["txt_id"];

		$usuarios->updateOne(['Id' => (int)$nuevoid],['$set' => [
							'Nombres' => $nombres, 
							'Apellidos' => $apellidos, 
							'Edad' => $edad, 
							'Usuario' => $usuario, 
							'Password' => $password,]]);
		$nuevoid = $id['id'] + 1;
		$nombres 	= "";
		$apellidos 	= "";
		$usuario 	= "";
		$password 	= "";
		$edad 		= 0;

	}

	if( isset($_POST["editar"]) ){

		$result = $usuarios->findOne(['Id' => (int)$_POST["txt_action_id"]]);

		$nombres 	=  $result["Nombres"];
		$apellidos 	= $result["Apellidos"];
		$usuario 	= $result["Usuario"];
		$password 	= $result["Password"];
		$edad 		=$result["Edad"];
		
		$nuevoid	= $result["Id"];

	}elseif ( isset($_POST["eliminar"]) ){
		
		$result = $usuarios->deleteOne(['Id' => (int)$_POST["txt_action_id"]]);

		$nombres 	=  $result["Nombres"];
		$apellidos 	= $result["Apellidos"];
		$usuario 	= $result["Usuario"];
		$password 	= $result["Password"];
		$edad 		=$result["Edad"];
		
		$nuevoid	= $result["Id"];
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
	              	<a class="nav-link" href="AllesUsers.php" target="_blank">Ver Todos</a>
	            </li>
	            <li class="nav-item">
	              	<a class="nav-link" href="Index.php?logout=true" target="_blank">LogOut</a>
	            </li>	           
	        </ul>
	        <form class="form-inline my-2 my-lg-0">
		      	<input class="form-control mr-sm-2" type="text" value="<?=$_SESSION['usuario']?>" readonly>		      	
		    </form>
		  </div>
		</nav>

		<div class="container">

	      	<div class="bs-docs-section">
		        <div class="row">
		          	<div class="col-lg-12">
		            	<div class="page-header">
		              	<h1 id="forms">Usuario</h1>
		            	</div>
		          	</div>
		        </div>

		        <div class="row">
		        	<div class="col-lg-6">
		            	<form method="POST">
			                <fieldset>
			                	<div class="form-group row">
			                    	<label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
			                    	<div class="col-sm-2">
			                      		<input class="form-control" id="txt_id" type="text" readonly name="txt_id" value="<?= $nuevoid ?>">
			                    	</div>
			                  	</div>
			                  	<div class="form-group">
			                    	<label>Nombres</label>
			                    	<input type="text" class="form-control" id="txt_nombres" placeholder="Mis Nombres" name="txt_nombres" value="<?=$nombres?>">
			                  	</div>
			                  	<div class="form-group">
			                    	<label>Apellidos</label>
			                    	<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Mis Apellidos" name="txt_apellidos" value="<?=$apellidos?>">
			                  	</div>
			                  	<div class="form-group">
			                    	<label>Usuario</label>
				                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Elige un nombre de usuario" name="txt_usuario" value="<?=$usuario?>">
			                  	</div>
			                  	<div class="form-group row">
			                    	<label for="staticEmail" class="col-sm-2 col-form-label">Edad</label>
			                    	<div class="col-sm-4">
			                      		<input type="number" class="form-control" placeholder="Mi Edad" name="txt_edad" value="<?=$edad?>">
			                    	</div>

			                    	<label for="staticEmail" class="col-sm-2 col-form-label">Contraseña</label>
			                    	<div class="col-sm-4">
			                      		<input type="password" class="form-control" placeholder="***" name="txt_password" value="<?=$password?>">
			                    	</div>
			                  	</div>
			               
			               		<div class="form-group row">
			               			<div class="col-sm-4">
								    	<button type="submit" class="btn btn-primary" name="guardar">Crear</button>
								    </div>

								    <div class="col-sm-5">
								    	<button type="submit" class="btn btn-primary" name="actualizar">Actualizar</button>
								    </div>
								</div>
			                  
		                	</fieldset>
		              	</form>
		            
		         	</div>

			        <div class="col-lg-4 offset-lg-1">

				        <form method="POST">
					       	<div class="form-group">
					           	<label class="col-form-label" for="inputDefault">Ingresa un Id:</label>
					           	<input type="number" class="form-control" id="inputDefault" name="txt_action_id">
					       	</div>

					       	<div class="form-group row">
					        	<div class="col-sm-5">
								    	<button type="submit" class="btn btn-primary" name="editar">Editar</button>
								</div>
								<div class="col-sm-5">
								    	<button type="submit" class="btn btn-primary" name="eliminar">Eliminar</button>
								</div>								
					        </div>
					        <div class="col-sm-5">
								<button type="submit" class="btn btn-primary" name="">Buscar</button>
							</div>
					    </form>
		          	</div>
	        	</div>
	    	</div>
				
		</div>

		<script src="https://bootswatch.com/_vendor/jquery/dist/jquery.min.js"></script>
	    <script src="https://bootswatch.com/_vendor/popper.js/dist/umd/popper.min.js"></script>
	    <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
	    <script src="https://bootswatch.com/_assets/js/custom.js"></script>

	</body>
</html>