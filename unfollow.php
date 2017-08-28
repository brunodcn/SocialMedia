<?php

session_start();

if(!isset($_SESSION['user'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_user = $_SESSION['id_user'];
$unfollow_id_user = $_POST['unfollow_id_user'];

if ($id_user == '' || $unfollow_id_user == '') {
	die();
}

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " DELETE FROM users_followers WHERE id_user = $id_user AND following_id_user = $unfollow_id_user";

mysqli_query($link, $sql);


?>