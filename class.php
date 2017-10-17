<?php

	$title = "Class";
	require 'include/header.php';
	require 'include/functions.php';

	$data = getClass($_GET['id']);

?>
	


	<div class="container classContainer mt-5">
	<a href="classes.php">Back</a>

	<div class="alert alert-success" role="alert">
	  <h4 class="alert-heading">Class "<?php echo $data['class_name']; ?>"</h4>
	  <hr>
	  <p class="mb-0">You may add or remove students as you please.</p>


		<form id="addStudentForm" method="POST" action="api.php" enctype="multipart/form-data">
		  <div class="form-group">

		    <input type="text" class="form-control" name="lastName" placeholder="Last name">
		    <input type="text" class="form-control" name="firstName" placeholder="First name">
		    <input type="file" class="form-control" name="image">
		    <input type="hidden" name="type" value="addStudent">
		    <input type="hidden" name="classId" value="<?php echo $data['class_id']; ?>">
		  </div>
		  <button type="submit" class="btn btn-primary">Add</button>
		</form>


	</div>







		




	</div>



	



<?php
	require 'include/footer.php';
?>