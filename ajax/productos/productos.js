$(document).ready(function () {

    $('#crear-productos').on('submit', function (e) {
        e.preventDefault();
        var datos = new FormData(this);
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            processData: false,
            contentType: false,
            async: true,
            cache: false,
            success: function (data) {
                var resultado = data;
                if (resultado.campos_vacios == 'vacios'){
                    swal("Atención", "Todos los campos son obligatorios." , "error");
                } else {
                    if (resultado.respuesta == 'exito') {
                        $('#agregarproductos').modal('hide');
                        swal(
                            'Correcto',
                            'El Producto '+resultado.codigo_asignado+' se agrego correctamente',
                            'success'
                        ).then(function(){ 
                            location.reload();
                            });
                    } else {
                        swal(
                            'Error',
                            'Hubo un error',
                            'error'
                        )
                    }
                }
               

            }
        })

    });
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    $('#editar-productos').on('submit', function (e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function (data) {
                var resultado = data;
                if (resultado.respuesta == 'exitoso') {
                    $('#editarproducto').modal('hide');
                    swal(
                        'Correcto',
                        'El Producto'+resultado.id_actualizado+' se Actualizo correctamente',
                        'success' 
                    ).then(function(){ 
                        location.reload();
                        });
                    
                } else {
                    swal(
                        'Error',
                        'Hubo un error',
                        'error'
                    )
                }

            }
        })



    });

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    $('#editar-imagen').on('submit', function (e) {
        e.preventDefault();
        var datos = new FormData(this);
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            processData: false,
            contentType: false,
            async: true,
            cache: false,
            success: function (data) {
                var resultado = data;
                if (resultado.respuesta == 'exitoso') {
                    $('#editarimagen').modal('hide');
                    swal(
                        'Correcto',
                        'El Producto '+resultado.id_actualizado+' se agrego correctamente',
                        'success'
                    ).then(function(){ 
                        location.reload();
                        });
                } else {
                    swal(
                        'Error',
                        'Hubo un error',
                        'error'
                    )
                }

            }
        })

    });
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    $('.borrar_registro').on('click', function (e) {
        e.preventDefault();

        var codigo = $(this).attr('data-codigo');
        var producto = $(this).attr('data-producto');

        swal({
            title: 'Esta seguro?',
            text: "Un registro eliminado no se puede recuperar",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3885d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'Cancelar'
        }).then(function (res) {
            if (res) {
                  $.ajax({
                type: 'post',
                data: {
                    'codigo': codigo,
                    'registro' : 'eliminar'
                },

                url: 'acciones/productos/modelo_productos.php',
                success:function(data){
                    var  resultado = JSON.parse(data);
                    if (resultado.respuesta == 'exitoso'){
                        swal(
                            'Eliminado',
                            'El Producto se elimino correctamente',
                            'success'
                        )
                        jQuery('[data-codigo="'+ resultado.id_eliminado +'"]').parents('tr').remove();
                    } else{
                        swal(
                            'Error',
                            'Hubo un error',
                            'error'
                        )
                    }

                }

            })
            }
        });

    });

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    var dataTable = $('#tabla_productos').DataTable( {
    
        "language":	{
         "sProcessing":     "Procesando...",
         "sLengthMenu":     "Mostrar _MENU_ registros",
         "sZeroRecords":    "No se encontraron resultados",
         "sEmptyTable":     "Ningún dato disponible en esta tabla",
         "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
         "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
         "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
         "sInfoPostFix":    "",
         "sSearch":         "Buscar:",
         "sUrl":            "",
         "sInfoThousands":  ",",
         "sLoadingRecords": "Cargando...",
         "oPaginate": {
           "sFirst":    "Primero",
           "sLast":     "Último",
           "sNext":     "Siguiente",
           "sPrevious": "Anterior"
         },
         "oAria": {
           "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
           "sSortDescending": ": Activar para ordenar la columna de manera descendente"
         }
       },
     
         "processing": true,
         "serverSide": true,
         "ajax":{
           url :"acciones/productos/consulta_productos.php", // json datasource
           type: "post",  // method  , by default get
           error: function(){  // error handling
             $(".lookup-error").html("");
             $("#tabla_productos").append('<tbody class="employee-grid-error"><tr><th colspan="3">No hay datos en el servidor</th></tr></tbody>');
             $("#lookup_processing").css("display","none");
             
           }
         }
       } );

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@





});