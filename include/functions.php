<?php

	require 'include/Database.php';



	function addClass($className) {

		$connection = Database::connect();
		$query = $connection->prepare("INSERT INTO classes VALUES(NULL,:className)");
		$query->bindParam(':className',$className,PDO::PARAM_STR);
		$query->execute();
		Database::disconnect();

	}

	function getClasses() {

		$connection = Database::connect();
		$query = $connection->prepare("SELECT * FROM classes");
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		
		return $results = json_encode($results);
	}


?>