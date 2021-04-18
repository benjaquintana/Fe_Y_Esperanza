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
                    location.reload();	
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

        var datos = new FormData(this);

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            success: function(data) {
              console.log(data);
                var resultado = data;
                if(resultado.respuesta == "exito") {
                    Swal.fire(
                        'Correcto',
                        'La publicación se guardo correctamente',
                        'success'
                    )
                    location.reload();
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

    //Editar Publicacion
    $('#editar_publicacion').on('submit', function(e) {
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
                    location.reload();
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

    //Editar Registro con Archivo
    $('#editar_publicacion_archivo').on('submit', function(e) {
        e.preventDefault();

        var datos = new FormData(this);

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            success: function(data) {
                console.log(data);
                var resultado = data;
                if(resultado.respuesta == "exito") {
                    Swal.fire(
                        'Correcto',
                        'La publicación se guardo correctamente',
                        'success'
                    )
                    location.reload();
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

    //Eliminar Publicacion
    $('.borrar_registro').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esto no se puede revertir",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, Eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    data: {
                        id: id,
                        publicacion: 'eliminar'
                    },
                    url: 'acciones_'+tipo+'.php',
                    success:function(data) {
                        var resultado = JSON.parse(data);
                        Swal.fire(
                            '¡Borrado!',
                            'El administrador ha sido eliminado',
                            'success'
                        )
                        console.log(resultado);
                        jQuery('[data-id="'+ resultado.id_eliminado +'"]').parents('div.pub').remove();
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo eliminar'
                });
            }
        });
    });
});
