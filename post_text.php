<?php

session_start();

if(!isset($_SESSION['user'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$post_text = $_POST['post_text'];
$id_user = $_SESSION['id_user'];

if ($post_text == '' || $id_user == '') {
	die();
}

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " INSERT INTO posttext(id_user, posttext)VALUES($id_user, '$post_text')";

mysqli_query($link, $sql);


?>