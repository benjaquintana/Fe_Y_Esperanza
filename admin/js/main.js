$(function() {
    //Menu Responsive
    $('#pushmenu').on('click', function() {
        $('.main-sidebar').slideToggle();
    });

	//Quitar Menu
	var anchoVentana = window.innerWidth
	const funcion1 = () => {
		$('.content-wrapper').click(function() {
			$('.main-sidebar').fadeOut();
		});
	}
	window.onresize = function() {
		anchoVentana = window.innerWidth;
	};
	if(992 > anchoVentana){
		funcion1();
	}

    //Clase del menu
    $('body.principal .wrapper .navegacion .navegacion_center .nav-item .icono .fa-home').addClass('activo');
    $('body.contactos .wrapper .navegacion .navegacion_center .nav-item .icono .fa-user-circle').addClass('activo');
    $('body.mensajes .wrapper .navegacion .navegacion_center .nav-item .icono .fa-comments').addClass('activo');
    $('body.notificaciones .wrapper .navegacion .navegacion_center .nav-item .icono .fa-bell').addClass('activo');
});