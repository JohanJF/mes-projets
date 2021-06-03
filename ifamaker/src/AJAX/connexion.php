<?php 
	
	function connexion()
	{
		$conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $conn;
	}
	
 ?>