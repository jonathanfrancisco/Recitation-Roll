/******************************************************
					ClASSES PAGE
*******************************************************/


$('.classesContainer').ready(function() {
	fetchClasses();
	console.log("clasesContainer is ready");
});

// GETS ALL THE CLASSES FROM classesAPI.php
function fetchClasses() {
	$.ajax({
		type: 'GET',
		url: 'api.php?data=classes',
		success:function(data){	
			data = JSON.parse(data);
			let concatHTML = "";
			data.forEach(function(data){
				concatHTML += `<div class="col-4">
									<div class="card bg-light mb-3" style="max-width: 20rem;">
									  <div class="card-body">
									    <h4 class="card-title"> ${data.class_name} </h4>
										<button type="button" class="btn btn-primary">Add students</button>
										<button type="button" class="btn btn-danger">Remove class</button>
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
		success:function() {
			// re-update the DOM
		  	fetchClasses();
		
		}
	});



});


/******************************************************
					ClASSES PAGE
*******************************************************/


