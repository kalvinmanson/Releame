$(document).ready(function() {
	var token = $('#token').val();
	$(".fancyb").fancybox();

	$.get('/admin/fields', function(data){
	    $(".typeahead").typeahead({ source:data });
	},'json');
});