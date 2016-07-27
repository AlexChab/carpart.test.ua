$(document).ready(function(){
	$('#collapseOne').on('hidden.bs.collapse', function () {
		$("#my-garage").removeClass("fa-chevron-up");
	  $("#my-garage").addClass("fa-chevron-down");
	});
	$('#collapseOne').on('shown.bs.collapse', function () {
		$("#my-garage").removeClass("fa-chevron-down");
	  $("#my-garage").addClass("fa-chevron-up");
	})

	// delete my-car garage
	$('.del-my-car').on('click',function(){
		
		$('#smallModal').modal('toggle');
		
		console.log(this.id);

		console.log('del car');
		$('#form-'+this.id).remove();
	})


	// -- Hover на изменение вида 
	$('.category').hover(function(){
		console.log();

		// this.('i').addClass('fa-spin');
	},
	function(){
		console.log('by');
	}
	)
});
$(window).load(function(){
	console.log('onload');

});