$(document).ready(function() {
    //Guardar Registro
    $('#comentar_publicacion').on('keypress', function(e) {
        if(e.which == 13) {
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
        }
    });

    //Editar Comentario
    $('#editar_comentario').on('submit', function(e) {
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

    //Eliminar Comentario
    $('.borrar_comentario').on('click', function(e) {
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
                        comentario: 'eliminar'
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
                        jQuery('[data-id="'+ resultado.id_eliminado +'"]').parents('div.card-comment').remove();
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