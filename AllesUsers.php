<?php
	session_start();
	require 'vendor/autoload.php'; // include Composer's autoloader
	use MongoDB\Client as Mongo;
	$client = new Mongo();
	$result = $client->Proyecto->usuarios->find();
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
	              <a class="nav-link" href="MongoActions.php" target="_blank">CRUD</a>
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


		<center>
			<h1>Proyecto 1</h1>
		</center>

		<div class="container">
		<div class="row">
			<div class="col-lg-12">
			<table class="table table-hover">
				<thead>
				    <tr class="table-info">
					    <th scope="col">Id</th>
				    	<th scope="col">Nombres</th>
				    	<th scope="col">Apellidos</th>
				    	<th scope="col">Edad</th>
				    	<th scope="col">Usuario</th>
				    	</tr>
				</thead>
				<tbody>
				    <?php
				    	
						foreach ($result as $entry) {
							echo '<tr class="table-light">';
						    	echo '<th scope="row">'.$entry['Id'].'</th>';
						    	echo "<td>".$entry['Nombres']."</td>";
						    	echo "<td>".$entry['Apellidos']."</td>";
						    	echo "<td>".$entry['Edad']."</td>";
						    	echo "<td>".$entry['Usuario']."</td>";
							echo '</tr>';
						}
						
					?>
				</tbody>
			</table> 

			</div>
		</div>
		</div>
		<script src="https://bootswatch.com/_vendor/jquery/dist/jquery.min.js"></script>
	    <script src="https://bootswatch.com/_vendor/popper.js/dist/umd/popper.min.js"></script>
	    <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
	    <script src="https://bootswatch.com/_assets/js/custom.js"></script>

	</body>
</html>