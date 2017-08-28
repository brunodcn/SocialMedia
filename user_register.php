<?php

require_once('db.class.php');

$user = $_POST['user'];
$email = $_POST['email'];
$password = md5($_POST['password']);

//instanciando a classe e criando um objeto de conexão com o banco de dados
$objDb = new db();
$link = $objDb->conecta_mysql(); //essa função retorna o link de conexão, então tem que criar uma variável que recupera esse return, no caso, $link

$user_exists = false;
$email_exists = false;

$sql = " select * from users where user = '$user' ";
if($result_id = mysqli_query($link, $sql)) {

	$user_data = mysqli_fetch_array($result_id);

	if(isset($user_data['user'])){
		$user_exists = true;
	}	
} else {
	echo 'error';
}

$sql = " select * from users where email = '$email' ";
if($result_id = mysqli_query($link, $sql)) {

	$user_data = mysqli_fetch_array($result_id);

	if(isset($user_data['email'])){
		$email_exists = true;
	}	
	} else {
	echo 'error';
}

if ($user_exists || $email_exists) {

	$return_get = '';

	if ($user_exists) {
		$return_get.= "erro_user=1&";
	}

		if ($email_exists) {
		$return_get.= "erro_email=1&";
	}

	header('Location: signup.php?'.$return_get);
	die();
}


$sql = "insert into users(user, email, password) values ('$user','$email','$password') ";

if(mysqli_query($link, $sql)){
	echo 'Register done';
} else {
	echo 'Error';
}

?>