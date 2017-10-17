<?php

	require 'include/Database.php';



	function addClass($className) {

		try {
			$connection = Database::connect();
		} catch(PDOExcetion $e) {
			echo $e;
		}

		$query = $connection->prepare("INSERT INTO classes VALUES(NULL,:className)");
		$query->bindParam(':className',$className,PDO::PARAM_STR);
		$query->execute();
		Database::disconnect();

	}


	function removeClass($id) {
		try {
			$connection = Database::connect();
		} catch(PDOExcetion $e) {
			echo $e;
		}
		$query = $connection->prepare("DELETE FROM classes WHERE class_id = :id");
		$query->bindParam(':id',$id,PDO::PARAM_STR);
		$query->execute();
		Database::disconnect();
	}

	function getClasses() {

		try {
			$connection = Database::connect();
		} catch(PDOExcetion $e) {
			echo $e;
		}
		$query = $connection->prepare("SELECT * FROM classes");
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		
		return json_encode($results);
	}


	function getClass($id) {

		try {
			$connection = Database::connect();
		} catch(PDOExcetion $e) {
			echo $e;
		}
		$query = $connection->prepare("SELECT * FROM classes WHERE class_id = :id");
		$query->bindParam(":id",$id,PDO::PARAM_STR);
		$query->execute();
		

		return $query->fetch();

	}	

	function addStudent($lastName, $firstName,$files,$classId) {

		$currentDirectory = getcwd();
		$uploadDirectory = $currentDirectory."../uploads/";
		$fileName = $files["image"]["name"];
		$fileTmpName = $files["image"]["tmp_name"]; 
		$uploadPath = $uploadDirectory.basename($fileName);
		move_uploaded_file($fileTmpName, $uploadPath);
		$imagePathURL = "/uploads/".basename($fileName);
		
		try {
			$connection = Database::connect();
		} catch(PDOExcetion $e) {
			echo $e;
		}

		$query = $connection->prepare("INSERT INTO students VALUES(NULL,:lastName,:firstName,:imagePath,:classId)");
		$query->bindParam(":lastName",$lastName,PDO::PARAM_STR);
		$query->bindParam(":firstName",$firstName,PDO::PARAM_STR);
		$query->bindParam(":imagePath",$imagePathURL,PDO::PARAM_STR);
		$query->bindParam(":classId",$classId,PDO::PARAM_STR);
		$query->execute();
		
	}


?>