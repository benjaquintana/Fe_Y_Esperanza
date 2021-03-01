$(document).ready(function() {
    //Login User
    $('#login_social').on('submit', function(e) {
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
                        text: 'Bienvenido(a) '+resultado.usuario+''
                    })
                    setTimeout(function(){
                        window.location.href = 'principal.php';
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
