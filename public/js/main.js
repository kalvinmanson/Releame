$(document).ready(function() {
	var token = $('#token').val();
	$(".fancyb").fancybox();
	$('.froala').froalaEditor({
		imageUploadParam: 'picture',
		imageUploadURL: '/admin/pictures',
		imageUploadParams: {
	        froala: 'true', 
            name:   'floala upload' + Math.random(),
	        _token: token
	    },
		imageUploadMethod: 'post',
		imageAllowedTypes: ['jpeg', 'jpg', 'png', 'gif', 'svg'],
		imageManagerLoadURL: "/admin/pictures/manager",
		imageManagerLoadMethod: "GET",
		imageManagerDeleteURL: 	"/admin/pictures/"+this.id,
		imageManagerDeleteMethod: 	"POST",
		imageManagerDeleteParams: {
	        froala: 'true', 
	        id: 	this.id,
            _method:   'delete',
	        _token: token
	    }
	}).on('froalaEditor.imageManager.beforeDeleteImage', function (e, editor, $img) {
        // Do something before deleting an image from the image manager.
        console.log($img.data('id'));
      })
	.on('froalaEditor.imageManager.imageDeleted', function (e, editor, data) {
        // Do something after the image was deleted from the image manager.
        console.log(data);
      });
});