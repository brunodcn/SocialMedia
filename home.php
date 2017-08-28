<?php

session_start();

if(!isset($_SESSION['user'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();

$id_user = $_SESSION['id_user'];


$sql= " SELECT COUNT(*) AS posts_qnt FROM posttext WHERE id_user = $id_user ";

$result_id = mysqli_query($link, $sql);

$posts_qnt = 0;

if($result_id){
$register = mysqli_fetch_array($result_id, MYSQLI_ASSOC);

$posts_qnt = $register['posts_qnt'];

}else{
	echo 'error';

}


$sql= " SELECT COUNT(*) AS followers_qnt FROM users_followers WHERE following_id_user = $id_user ";

$result_id = mysqli_query($link, $sql);

$followers_qnt = 0;

if($result_id){
$register = mysqli_fetch_array($result_id, MYSQLI_ASSOC);

$followers_qnt = $register['followers_qnt'];

}else{
	echo 'erro';

}

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

		<script type="text/javascript">
			
			$(document).ready(function(){

				$('#btn_text').click(function(){
					
					if ($('#post_text').val().length > 0) {

						$.ajax({
							url: 'post_text.php',
							method: 'post',
							data: $('#form_text').serialize(),
							success: function(data){
								$('#post_text').val('');
								updateText();
							}
						});
					}

				});

				function updateText(){
					$.ajax({
							url: 'get_text.php',
							success: function(data){
							$('#texts').html(data);	
							
							}
					});
				}

				updateText();

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
	          <img src="img/sm_icon.png" style="margin-left: 15px; margin-top: 5px;"" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="logout.php">Logout</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	<div class="col-md-3">
	    		<div class="panel panel-default">
	    			<div class="panel-body">
	    			<h4><?= $_SESSION['user']; ?></h4>
	    			<hr>
	    			<div class="col-md-6">
	    				POSTS <br> <?= $posts_qnt?>
	    			</div>
	    			<div class="col-md-6">
	    				FOLLOWERS <br> <?=$followers_qnt?>
	    			</div>	
	    			</div>
	    		</div>

	    	</div>
	    	<div class="col-md-6">
	    		<div class="panel panel-default">
	    			<div class="panel-body">
	    			<form id="form_text" class="input-group">
	    				<input type="text" id="post_text" name="post_text" class="form-control" placeholder="What's happening now?" maxlength="140">
	    				<span class="input-group-btn">
	    					<button class="btn btn-default" id="btn_text" type="button">Post</button>
	    				</span>
	    			</form>
	    				
	    			</div>
	    		</div>

	    		<div id="texts" class="list-group">
	    			
	    		</div>

			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h4><a href="people_search.php">Search people</a></h4>
					</div>
				</div>
			</div>

			

		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>