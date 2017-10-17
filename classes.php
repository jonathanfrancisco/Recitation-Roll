

<?php

	$title = "Classes";
	require 'include/header.php';
	require 'include/functions.php';

?>


	<div class="mt-5 container">

		

		
		<a href="index.html">Back</a>


		<form id="addClassForm" method="POST" action="api.php">
		  <div class="form-group">
		    <label for="className">Class name:</label>
		    <input required type="text" class="form-control" id="className" name="className" placeholder="Class name">
		    <input type="hidden" name="type" value="addClass">
		  </div>
		  <button type="submit" class="btn btn-primary">Add</button>
		</form>

		<!-- This is where the classes go -->
		<div class="row classesContainer">

			


		</div>

	</div>

	






<?php
	require 'include/footer.php';
?>