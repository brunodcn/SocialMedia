<?php

$erro = isset($_GET['erro']) ? $_GET['erro'] : 0; 


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
	
		<script>
			// código javascript
			$(document).ready(function(){

				var empty_field = false;

				$('#btn_login').click(function(){

					if($('#user_field').val() == ''){
						$('#user_field').css({'border-color': '#A94442'});
						empty_field = true;
					} else {
						$('#user_field').css({'border-color': '#CCC'});
					}

					if($('#password_field').val() == ''){
						$('#password_field').css({'border-color': '#A94442'});
						empty_field = true;
					} else {
						$('#password_field').css({'border-color': '#CCC'});
					}

					if(empty_field) return false;

				});
				});

		</script>
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
	          <img src="img/sm_icon.png" style="margin-left: 5px; margin-top: 5px;"" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="signup.php">Sign up</a></li>
	            <li class="<?= $erro == 1 ? 'open' : '' ?>">
	            	<a id="login" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Log in</a>
					<ul class="dropdown-menu" aria-labelledby="login">
						<div class="col-md-12">
				    		<p>Do you have an account?</h3>
				    		<br />
							<form method="post" action="access_validation.php" id="formLogin">
								<div class="form-group">
									<input type="text" class="form-control" id="user_field" name="user" placeholder="User name" />
								</div>
								
								<div class="form-group">
									<input type="password" class="form-control red" id="password_field" name="password" placeholder="Password" />
								</div>
								
								<button class="btn btn-primary" id="btn_login">login</button>

								<br /><br />
								
							</form>

							<?php
							if ($erro == 1) {
								echo '<font color="#FF0000">The username and/or password that you entered did not match our records.</font>';
							}
							?>

						</form>
				  	</ul>
	            </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	      <!-- Main component for a primary marketing message or call to action -->
	      <div class="jumbotron">
	        <h1>Welcome to Social Media</h1>
	        <p>See what's happening now...</p>
	      </div>

	      <div class="clearfix"></div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>