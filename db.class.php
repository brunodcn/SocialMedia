<?php

class db {

	private $host = 'localhost';

	private $user = 'root'; 

	private $password = ''; 

	private $database = 'social_media';

	public function conecta_mysql(){

		$con = mysqli_connect($this->host, $this->user, $this->password, $this->database);

		mysqli_set_charset($con, 'utf8');

		
		if(mysqli_connect_errno()){
			echo 'Erro'.mysqli_connect_error();
		}

		return $con;

	}

}

?>