<?php

session_start();

if(!isset($_SESSION['user'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_user = $_SESSION['id_user'];
$follow_id_user = $_POST['follow_id_user'];

if ($id_user == '' || $follow_id_user == '') {
	die();
}

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " INSERT INTO users_followers(id_user, following_id_user)VALUES($id_user, $follow_id_user)";

mysqli_query($link, $sql);


?>