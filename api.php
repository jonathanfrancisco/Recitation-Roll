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

		else if($_GET['type'] == 'class') {
			// fetch one class 
			echo "Hello there";
		}

	}

	else if($_SERVER['REQUEST_METHOD'] == 'POST') {

		if($_POST['type'] == 'addClass') {
			addClass($_POST['className']);
		}
		else if($_POST['type'] == 'removeClass') {
			removeClass($_POST['classId']);
		}

		else if($_POST['type'] == 'addStudent') {
			// add student ot the database
		}

		else if($_POST['type'] == 'removeStudent') {
			// remove studnent in the database
		}

	}


?>