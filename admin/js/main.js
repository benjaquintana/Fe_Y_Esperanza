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
});