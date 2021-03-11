$(document).ready(function() {
    //Guardar Registro
    $('#guardar_publicacion').on('submit', function(e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
              console.log(data);
                var resultado = data;
                if(resultado.respuesta == "exito") {
                    Swal.fire(
                        'Correcto',
                        'La publicación se guardo correctamente',
                        'success'
                    )
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un error'
                    })
                }
            }
        })
    });

    //Guardar Registro con Archivo
     $('#guardar_publicacion_archivo').on('submit', function(e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
              console.log(data);
                /*var resultado = data;
                if(resultado.respuesta == "exito") {
                    Swal.fire(
                        'Correcto',
                        'El miembro se guardo correctamente',
                        'success'
                    )
                    setTimeout(function(){
                        window.location.href = 'login.php';
                    }, 1000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un error'
                    })
                }*/
            }
        })
    });
});
