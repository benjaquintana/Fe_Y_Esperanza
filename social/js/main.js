$(function() {
    //Menu Responsive
    $('#pushmenu').on('click', function() {
        $('.main-sidebar').slideToggle();
    });

    //Clase del menu
    $('body.principal .wrapper .navegacion .navegacion_center .nav-item .icono .fa-home').addClass('activo');
    $('body.contactos .wrapper .navegacion .navegacion_center .nav-item .icono .fa-user-circle').addClass('activo');
    $('body.mensajes .wrapper .navegacion .navegacion_center .nav-item .icono .fa-comments').addClass('activo');
    $('body.notificaciones .wrapper .navegacion .navegacion_center .nav-item .icono .fa-bell').addClass('activo');

    //Repetir Password
    $('#crear_registro').attr('disabled', true);
    $('#repetir_password').on('input', function() {
        var password_nuevo = $('#password').val();
        if($(this).val() == password_nuevo ) {
            $('#resultado_password').text('Correcto');
            $('#repetir_password').parents('.form-group').addClass('text-success').removeClass('text-danger');
            $('input#password').parents('.form-group').addClass('text-success').removeClass('text-danger');
            $('#repetir_password').addClass('is-valid').removeClass('is-invalid');
            $('input#password').addClass('is-valid').removeClass('is-invalid');
            $('#crear_registro').attr('disabled', false);
        } else {
            $('#resultado_password').text('No son iguales!');
            $('#repetir_password').parents('.form-group').addClass('text-danger').removeClass('text-success');
            $('input#password').parents('.form-group').addClass('text-danger').removeClass('text-success');
            $('#repetir_password').addClass('is-invalid').removeClass('is-valid');
            $('input#password').addClass('is-invalid').removeClass('is-valid');
        }
    });

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    
    //Input file
    bsCustomFileInput.init();

    

});

//Upload Image
$(document).ready(function(){

	var $modal = $('#modal');

	var image = document.getElementById('sample_image');

	var cropper;

	$('#upload_image').change(function(event){
		var files = event.target.files;

		var done = function(url){
			image.src = url;
			$modal.modal('show');
		};

		if(files && files.length > 0)
		{
			reader = new FileReader();
			reader.onload = function(event)
			{
				done(reader.result);
			};
			reader.readAsDataURL(files[0]);
		}
	});

	$modal.on('shown.bs.modal', function() {
		cropper = new Cropper(image, {
			aspectRatio: 1,
			viewMode: 3,
			preview:'.preview'
		});
	}).on('hidden.bs.modal', function(){
		cropper.destroy();
   		cropper = null;
	});

	$('#crop').click(function(){
		canvas = cropper.getCroppedCanvas({
			width:200,
			height:200
		});

		canvas.toBlob(function(blob){
			url = URL.createObjectURL(blob);
			var reader = new FileReader();
			reader.readAsDataURL(blob);
			reader.onloadend = function(){
				var base64data = reader.result;
				$.ajax({
					url:'upload.php',
					method:'POST',
					data:{image:base64data},
					success: function(data) {
                        console.log(data);
                        $modal.modal('hide');
						$('.uploaded_image').attr('src', data);
					}
				});
			};
		});
	});
	
});