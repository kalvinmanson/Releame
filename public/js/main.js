$(document).ready(function() {
	var token = $('#token').val();
	$(".fancyb").fancybox();
	$(".fancya").fancybox({
		type: "ajax"
	});

	if($(".typeahead").lenght > 0) {
		$.get('/admin/fields', function(data){
		    $(".typeahead").typeahead({ source:data });
		},'json');
	}

	$('#flash-overlay-modal').modal();
	$('div.alert').not('.alert-important').delay(50000).fadeOut(350);

	$(".tr_toggle").click( function() {
		var target = $(this).data("target");
		$("."+target).toggle("slow");
	});

	$( ".file_upload" ).change(function() {
		var filename = $(this).val().split('\\').pop();
		$('.file-text').text(" : " + filename);
		$('.file-lavel').removeClass("btn-default");
		$('.file-lavel').addClass("btn-info");
	});
});