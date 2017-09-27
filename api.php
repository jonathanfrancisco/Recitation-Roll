<?php

	// THIS DISPLAYS ALL DATA IN JSON FORMAT

	require 'include/functions.php';


	if($_SERVER['REQUEST_METHOD'] == 'GET') {

		if($_GET['data'] == 'classes') {
			echo getClasses();
		}

		else if($_GET['data'] == 'student') {
			// fetch the students in the database
		}

	}

	else if($_SERVER['REQUEST_METHOD'] == 'POST') {

		if($_POST['data'] == 'class') {
			addClass($_POST['className']);
		}
		else if($_POST['data'] == 'student') {
			// add student to the database
		}

	}


?>