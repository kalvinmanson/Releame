$(document).ready(function() {
	var token = $('#token').val();
	$(".fancyb").fancybox();
	$(".fancya").fancybox({
		type: "ajax"
	});

	$.get('/admin/fields', function(data){
	    $(".typeahead").typeahead({ source:data });
	},'json');
});