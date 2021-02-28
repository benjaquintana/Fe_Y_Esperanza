$(document).ready(function() {
    //Login User
    $('#login_sesion').on('submit', function(e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                var resultado = data;
                if(resultado.respuesta == "exitoso") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Correcto',
                        text: 'Bienvenido(a) '+resultado.usuario+'',
                        timer: 1300
                    })
                    setTimeout(function(){
                        window.location.href = 'admin_area.php';
                    }, 1000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Usuario o Password Incorrectos'
                    })
                }
            }
        })

    });
});
