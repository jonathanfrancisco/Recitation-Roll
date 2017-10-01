<?php

	require 'include/Database.php';



	function addClass($className) {

		$connection = Database::connect();
		$query = $connection->prepare("INSERT INTO classes VALUES(NULL,:className)");
		$query->bindParam(':className',$className,PDO::PARAM_STR);
		$query->execute();
		Database::disconnect();

	}


	function removeClass($id) {
		$connection = Database::connect();
		$query = $connection->prepare("DELETE FROM classes WHERE class_id = :id");
		$query->bindParam(':id',$id,PDO::PARAM_STR);
		$query->execute();
		Database::disconnect();
	}

	function getClasses() {

		$connection = Database::connect();
		$query = $connection->prepare("SELECT * FROM classes");
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		
		return json_encode($results);
	}


	function getClass($id) {

		$connection = Database::connect();
		$query = $connection->prepare("SELECT * FROM classes WHERE class_id = :id");
		$query->bindParam(":id",$id,PDO::PARAM_STR);
		$query->execute();
		

		return $query->fetch();


	}	


?>