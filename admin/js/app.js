$(function () {
    $("#registro").DataTable({
        "responsive": true,
        "pageLength": 5,
        "lengthChange": false,
        "autoWidth": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "language": {
            paginate: {
                next: 'Siguiente',
                previous: 'Anterior',
                last: 'Último',
                first: 'Primero'
            },
            info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
            emptyTable: 'No hay resultados para mostrar',
            infoEmpty: 'No hay registros',
            search: 'Buscar:'
        }
    })
    .buttons()
    .container()
    .appendTo('#registro_wrapper .col-md-6:eq(0)');
});

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

$(function() {
    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Initialize Select2 Elements
    $('.select2').select2();

    //Timepicker
    $('#timepicker').datetimepicker({
        format: 'LT'
    });

    //Icon Picker
    // Default options
    IconPicker.Init({
        // Required: You have to set the path of IconPicker JSON file to "jsonUrl" option. e.g. '/content/plugins/IconPicker/dist/iconpicker-1.5.0.json'
        jsonUrl: 'js/iconpicker-1.5.0.json',
        // Optional: Change the buttons or search placeholder text according to the language.
        searchPlaceholder: 'Buscar Icono',
        showAllButton: 'Mostrar Todos',
        cancelButton: 'Cancelar',
        noResultsFound: 'No se encontraron resultados.', // v1.5.0 and the next versions
        borderRadius: '20px', // v1.5.0 and the next versions
    });

    IconPicker.Run('#GetIconPicker', function(){

    Swal.fire({
        icon: 'success',
        title: 'Perfecto!',
        text: 'Has seleccionado un icono!',
        timer: 1300
    })

    });

    //Input file
    bsCustomFileInput.init();

});

$(function () {

    $.getJSON('servicio_registrados.php', function(data) {
        //console.log(data)
        var fecha_registro=[];
        var cantidad_registro=[];

        for(var i=0; i< data.length; i++){
              fecha_registro[i]=data[i].fecha;
              cantidad_registro[i]=data[i].cantidad;
        }
        //console.log(fecha_registro);
        //console.log(cantidad_registro);

        // Get context with jQuery - using jQuery's .get() method.
        var lineChartCanvas = $('#lineChart').get(0).getContext('2d')

        var lineChartData = {
          labels  : fecha_registro,
          datasets: [
            {
              label               : 'Registrados',
              backgroundColor     : 'rgba(60,141,188,0.9)',
              borderColor         : 'rgba(60,141,188,0.8)',
              pointRadius         : '3',
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : cantidad_registro
            }
          ]
        }

        var lineChartOptions = {
          maintainAspectRatio : false,
          responsive : true,
          legend: {
            display: true
          },
          scales: {
            xAxes: [{
              gridLines : {
                display : false,
              }
            }],
            yAxes: [{
              gridLines : {
                display : true,
              }
            }]
          }
        }
        lineChartData.datasets[0].fill = false;
        //lineChartData.datasets[1].fill = false;
        lineChartOptions.datasetFill = false

        // This will get the first returned node in the jQuery collection.
        new Chart(lineChartCanvas, {
          type: 'line',
          data: lineChartData,
          options: lineChartOptions
        })
    })
})
