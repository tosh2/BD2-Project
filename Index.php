<?php
session_start();
$_SESSION['usuario']="admin";
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

		<br>

		<div class="container">
		    <div class="row">
	          	<div class="col-lg-12">
	           
	            	<div class="jumbotron">
	                	<center>
	                		<h1 class="display-3">Proyecto Bases 2</h1>
	                	</center>
	                	<center>
	                		<p class="lead">CRUD en Mongo DB, con PHP 7.x Primer Semestre 2018 Bases de Datos 2 - 201318613.</p>
	                	</center>
	                	<center>
	                		<p class="lead">
	                  			<a class="btn btn-primary btn-lg" href="Login.php" role="button">Login</a>
	                		</p>	
	                	</center>
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