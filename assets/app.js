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
				concatHTML += `<div class="col-4 classesCard">
									<div class="card bg-light mb-3" style="max-width: 20rem;">
									  <div class="card-body">
									    <h4 class="card-title"> ${data.class_name} </h4>
									    <a class="btn btn-primary" href="api.php?type=class&id=${data.class_id}">View class</a>
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
		success:function() {

			// re-update the DOM
		  	fetchClasses();
		
		}
	});

});

console.log($('.classesContainer'));

// DELETION OF A CLASS
$('.classesContainer').on('submit', function(event){
	event.preventDefault();	

	let form = event.target;

	$.ajax({
		type: $(form).attr('method'),
		url:  $(form).attr('action'),
		data: $(form).serialize(),
		success: function(data) {
			fetchClasses();
		}
	});

});


// $('.classesContainer').on('click', function(event) {

// 	event.stopPropagation();

// 	if(event.target.textContent == 'View class') {
// 		console.log("View");
// 		// redirect to another page
// 		// view the clicked class's students and other stuff
// 	}

// 	else if(event.target.textContent == 'Remove class') {
// 		// removed this class that just clicked bruhh!!

// 		$.ajax({
// 			type: 'POST',
// 			url: 'api.php',
// 			success: function() {

// 			}
// 		});


// 	}
// });


/******************************************************
					ClASSES PAGE
*******************************************************/


