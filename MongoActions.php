<?php
	
	if( isset($_POST["guardar"]) ){
		$nombres 	= $_POST["txt_nombres"];
		$apellidos 	= $_POST["txt_apellidos"];
		$usuario 	= $_POST["txt_usuario"];
		$password 	= $_POST["txt_password"];
		$edad 		= $_POST["txt_edad"];
		$id 		= $_POST["txt_id"];

		echo $nombres."-".$apellidos."-".$usuario."-".$password."-".$edad."-".$id;

	}else if( isset($_POST["actualizar"]) ){
		$nombres 	= $_POST["txt_nombres"];
		$apellidos 	= $_POST["txt_apellidos"];
		$usuario 	= $_POST["txt_usuario"];
		$password 	= $_POST["txt_password"];
		$edad 		= $_POST["txt_edad"];
		$id 		= $_POST["txt_id"];

		echo $nombres."-".$apellidos."-".$usuario."-".$password."-".$edad."-".$id;
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
	              <a class="nav-link" href="Login.php" target="_blank">Login</a>
	            </li>
	          </ul>
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
		            	<form>
			                <fieldset>
			                	<div class="form-group row">
			                    	<label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
			                    	<div class="col-sm-2">
			                      		<input class="form-control" id="disabledInput" type="text" disabled="" name="txt_id">
			                    	</div>
			                  	</div>
			                  	<div class="form-group">
			                    	<label>Nombres</label>
			                    	<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mis Nombres" name="txt_nombres">
			                  	</div>
			                  	<div class="form-group">
			                    	<label>Apellidos</label>
			                    	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mis Apellidos" name="txt_apellidos">
			                  	</div>
			                  	<div class="form-group">
			                    	<label>Usuario</label>
				                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Elige un nombre de usuario" name="txt_usuario">
			                  	</div>
			                  	<div class="form-group row">
			                    	<label for="staticEmail" class="col-sm-2 col-form-label">Edad</label>
			                    	<div class="col-sm-4">
			                      		<input type="number" class="form-control" placeholder="Mi Edad" name="txt_edad">
			                    	</div>

			                    	<label for="staticEmail" class="col-sm-2 col-form-label">Contraseña</label>
			                    	<div class="col-sm-4">
			                      		<input type="password" class="form-control" placeholder="***" name="txt_password">
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

				        <form>
					       	<div class="form-group">
					           	<label class="col-form-label" for="inputDefault">Ingresa un Id:</label>
					           	<input type="text" class="form-control" id="inputDefault">
					       	</div>

					       	<div class="form-group row">
					        	<div class="col-sm-5">
								    	<button type="submit" class="btn btn-primary" name="actualizar">Editar</button>
								</div>
								<div class="col-sm-5">
								    	<button type="submit" class="btn btn-primary" name="actualizar">Eliminar</button>
								</div>								
					        </div>
					        <div class="col-sm-5">
								    	<button type="submit" class="btn btn-primary" name="actualizar">Actualizar</button>
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