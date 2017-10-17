/******************************************************
					ClASSES PAGE
*******************************************************/

// WHEN DOCUMEN IS READY
// LOAD ALL CLASSES ON THIS PAGE
$('.classesContainer').ready(function() {
	fetchClasses();
});

// GETS ALL THE CLASSES FROM API.php
function fetchClasses() {
	$.ajax({
		type: 'GET',
		url: 'api.php?type=classes',
		success:function(data){	
			data = JSON.parse(data);
			let concatHTML = "";
			data.forEach(function(data){
				concatHTML += `<div class="col-md-3 classesCard text-center">
									<div class="card bg-light mb-3">
									  <div class="card-body">
									    <h4 class="card-title"> ${data.class_name} </h4>
									    <a class="btn btn-primary" href="class.php?type=class&id=${data.class_id}">View class</a>
									    <form method="POST" action="api.php">
									    	<input type="hidden" name="type" value="removeClass">
									    	<input type="hidden" name="classId" value="${data.class_id}">
											<input type="submit" class="btn btn-danger removeBtn" value="Remove class">
										</form>
									  </div>
									</div>
							</div>`;
			});
			$('.classesContainer').html(concatHTML);
		}
	});
};

// ON SUBMIT FORM
// FOR ADDING A CLASS
$('#addClassForm').on('submit',function(event) {

	event.preventDefault();
	
	$.ajax({
		type: $(this).attr('method'),
		url:  $(this).attr('action'),
		data: $(this).serialize(),
		success: function() {
			// re-update the DOM
		  	fetchClasses();
		}
	});

});

// DELETION OF A CLASS
$('.classesContainer').on('submit', function(event){
	event.preventDefault();	

	let form = event.target;
	console.log($(form).attr('method'));
	console.log($(form).attr('action'));

	$.ajax({
		type: $(form).attr('method'),
		url:  $(form).attr('action'),
		data: $(form).serialize(),
		success: function(data) {
			fetchClasses();
		}
	});

});

// FOR ADDING A STUDENT

$('#addStudentForm').on('submit', function(event){

	event.preventDefault();

	let form = event.target;
	let formSerializeArrayData = $(form).serializeArray();
	let imageFile = document.querySelector('input[type=file]').files[0];
	let formData = new FormData(form);	

	// append lastname, firstname, and the image.
	$.each(formSerializeArrayData, () => {
		formData.append($(this).name,$(this).value);
	});
	formData.append('image',imageFile);


	$.ajax({
		type: $(this).attr('method'),
		url: $(this).attr('action'),
		data: formData,
		processData: false,
		contentType: false,
		success: function(data) {
			// DEBUGGING GPURPOSES
			console.log("Success adding a student");
			console.log(data);
		}
	});
	
});




