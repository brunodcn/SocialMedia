<?php

session_start();

require_once('db.class.php');


$user = $_POST['user'];
$password = md5($_POST['password']);

$sql = " SELECT id, user, email FROM users WHERE user = '$user' AND password = '$password'";

$objDb = new db();
$link = $objDb->conecta_mysql();

$result_id = mysqli_query($link, $sql);

if($result_id) {

$user_data = mysqli_fetch_array($result_id);

if(isset($user_data)){

	$_SESSION['id_user'] = $user_data["id"];
	$_SESSION['user'] = $user_data["user"];
	$_SESSION['email'] = $user_data["email"];

	header('Location: home.php');

}else {
	header('Location: index.php?erro=1');
}

}else {
	echo 'Erro';
}



?>