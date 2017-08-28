<?php

$erro_user = isset($_GET['erro_user']) ? $_GET['erro_user'] : 0;
$erro_email =isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;

?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">

		<title>Social Media</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img src="img/sm_icon.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="index.php">Back</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	<br /><br />

	    	<div class="col-md-4"></div>
	    	<div class="col-md-4">
	    		<h3>Sign up now!</h3>
	    		<br />
				<form method="post" action="user_register.php" id="registerForm">
					<div class="form-group">
						<input type="text" class="form-control" id="user" name="user" placeholder="User name" required="requiored">
						<?php
						if($erro_user){
							echo '<font style="color:#ff0000">User already exists</font>';					}
						?>
					</div>

					<div class="form-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="requiored">
					</div>

					<?php
						if($erro_email){
							echo '<font style="color:#ff0000">E-mail already exists</font>';
						}
						?>
					
					<div class="form-group">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" required="requiored">
					</div>
					
					<button type="submit" class="btn btn-primary form-control">Sign up</button>
				</form>
			</div>
			<div class="col-md-4"></div>

			<div class="clearfix"></div>
			<br />
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>

		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>