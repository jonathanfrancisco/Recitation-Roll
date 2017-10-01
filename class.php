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
	</div>







		




	</div>



	



<?php
	require 'include/footer.php';
?>