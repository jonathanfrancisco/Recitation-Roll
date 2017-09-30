

<?php

	$title = "Classes";
	require 'include/header.php';
	require 'include/functions.php';

?>


	<div class="container">

		
		<a href="index.html">Back</a>

		<div class="headerForm">
			<form id="addClassForm" method="POST" action="api.php">
				<input type="text" name="className" placeholder="Class name"> 
				<input type="submit" value="Add class">
				<input type="hidden" name="type" value="addClass">
			</form>
		</div>


		<!-- This is where the classes go -->
		<div class="row classesContainer">

			


		</div>

	</div>

	






<?php
	require_once 'include/footer.php';
?>