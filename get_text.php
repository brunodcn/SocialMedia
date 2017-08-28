<?php

	session_start();

	if(!isset($_SESSION['user'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');
$id_user = $_SESSION['id_user'];
$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " SELECT DATE_FORMAT(t.insert_date, '%d %b %Y %T') AS formatted_insert_date, t.posttext, u.user"; 
$sql.= " FROM posttext AS t JOIN users AS u ON(t.id_user = u.id)";
$sql.= " WHERE id_user = $id_user";
$sql.= " OR id_user IN (SELECT following_id_user FROM users_followers WHERE id_user = $id_user)";
 $sql.= " ORDER BY insert_date DESC";

$result_id = mysqli_query($link, $sql);

if ($result_id) {
	while ($register = mysqli_fetch_array($result_id, MYSQLI_ASSOC)){
		echo '<a href="#" class="list-group-item">';
		echo '<h4 class=list-group-item-heading">'.$register['user'].' <small> - '.$register['formatted_insert_date'].'</small></h4>';
		echo '<p class="list-group-item-text">'.$register['posttext'].'</p>';
		echo '</a>';
	}
}else {
	echo 'Error in database query.';
}

?>