<?php

	// THIS DISPLAYS ALL DATA IN JSON FORMAT

	require 'include/functions.php';


	if($_SERVER['REQUEST_METHOD'] == 'GET') {

		if($_GET['type'] == 'classes') {
			echo getClasses();
		}

		else if($_GET['type'] == 'students') {
			// fetch the students in the database
		}

	}

	else if($_SERVER['REQUEST_METHOD'] == 'POST') {


		
		
		if($_POST['type'] == 'addClass') {

			$className = $_POST['className'];
			addClass($className);

		}
		
		else if($_POST['type'] == 'removeClass') {

			$classId = $_POST['classId'];
			removeClass($classId);

		}

		else if($_POST['type'] == 'addStudent') {
			$lastName = $_POST['lastName'];
			$firstName = $_POST['firstName'];
			$classId = $_POST['classId'];
			addStudent($lastName,$firstName,$_FILES,$classId);
		

		}

		else if($_POST['type'] == 'removeStudent') {
		
		}

	}


?>