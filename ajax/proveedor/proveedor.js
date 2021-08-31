$(document).ready(function () {



    $('#crear-proveedor').on('submit', function (e) {
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
                console.log(data);
                if (resultado.respuesta == 'exito') {
                    $('#agregarproveedor').modal('hide');
                    swal(
                        'Correcto',
                        'El proveedor se creo correctamente',
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

    $('#editar-proveedor-imagen').on('submit', function (e) {
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
                    $('#editarproveedor').modal('hide');
                    swal(
                        'Correcto',
                        'la Imagen se Actualizo correctamente',
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
    $('#editar-proveedor').on('submit', function (e) {
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
                    $('#editarproveedor').modal('hide');
                    swal(
                        'Correcto',
                        'El Producto se Actualizo correctamente',
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

    $('.borrar_registro').on('click', function (e) {
        e.preventDefault();

        var codigo = $(this).attr('data-codigo');
        var proveedor = $(this).attr('data-proveedor');

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

                url: 'acciones/proveedor/modelo_proveedor.php',
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

    $('#editarproveedor').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Botón que activó el modal
        var proveedor = button.data('proveedor') // Extraer la información de atributos de datos
        var codigo = button.data('codigo') // Extraer la información de atributos de datos
        var tipo = button.data('tipo') // Extraer la información de atributos de datos
        var nombre = button.data('nombre') // Extraer la información de atributos de datos
        var apellido = button.data('apellido') // Extraer la información de atributos de datos
        var nit = button.data('nit') // Extraer la información de atributos de datos
        var estado = button.data('estado') // Extraer la información de atributos de datos

        var modal = $(this)
        modal.find('.modal-title').text('Modificar Proveedor: ' + proveedor)
        modal.find('.modal-body #proveedor').val(proveedor)
        modal.find('.modal-body #codigo').val(codigo)
        modal.find('.modal-body #tipo').val(tipo)
        modal.find('.modal-body #nombre').val(nombre)
        modal.find('.modal-body #apellido').val(apellido)
        modal.find('.modal-body #nit').val(nit)
        modal.find('.modal-body #estado').val(estado)
    })

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@





});