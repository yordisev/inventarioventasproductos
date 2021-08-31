$(document).ready(function(){
    
    

$('#crear-administrador').on('submit', function(e){
    e.preventDefault();

var datos = $(this).serializeArray();

$.ajax({
    type: $(this).attr('method'),
    data: datos,
    url: $(this).attr('action'),
    dataType: 'json',
    success: function(data){
        var resultado = data;
        if (resultado.respuesta == 'exito'){
            $('#agregarusuarios').modal('hide');
            optenertarea(); // ejecuta la funcion
    swal(
        'Correcto',
        'El administrador se creo correctamente',
        'success'
    )
}   else {
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

$('#editar-administrador').on('submit', function(e){
    e.preventDefault();

var datos = $(this).serializeArray();

$.ajax({
    type: $(this).attr('method'),
    data: datos,
    url: $(this).attr('action'),
    dataType: 'json',
    success: function(data){
        var resultado = data;
        if (resultado.respuesta == 'exitoso'){
            $('#editarusuario').modal('hide');
            optenertarea(); // ejecuta la funcion
    swal(
        'Correcto',
        'El administrador se Actualizo correctamente',
        'success'
    )
}   else {
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
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

$('#editar-password').on('submit', function(e){
    e.preventDefault();

var datos = $(this).serializeArray();

$.ajax({
    type: $(this).attr('method'),
    data: datos,
    url: $(this).attr('action'),
    dataType: 'json',
    success: function(data){
        var resultado = data;
        if (resultado.respuesta == 'exitoso'){
    swal(
        'Correcto',
        'Clave Actualizada correctamente',
        'success'
    )
}   else {
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






// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
optenertarea(); // ejecuta la funcion
function optenertarea() { // funcion optenertarea
    $.ajax({ // se ejecuta apenas la aplicacion inica
        url: 'listadeusuarios.php', // direccion de donde se va a pedir algo
        type: 'GET', // el metodo es post
        success: function(response) { // se recibe la respuesta se maneja desde esta funcion
            let tasks = JSON.parse(response); // la convierto con JSON.parse en un objeto y se guardan en esta misma variable
            let = template = '';
            tasks.forEach(task => { // se recorren las tareas una a una y por cada tarea vamos a retornar una
                template += `
<tr seleccionarid="${task.id_admin}">
<td>${task.id_admin}</td>
<td>
<a href="#" class="task-eliminar">${task.nombre}</a>
</td>
<td>${task.usuario}</td>
<td>
<a href="#" data-toggle="modal" data-target="#editarusuario" class='task-item btn btn-success btn-xs'>
<i class="fa fa-edit"></i>
</a>
<a href="#" data-toggle="modal" data-target="#editarusuario" class='task-item btn btn-danger btn-xs'>
<i class="fa fa-trash"></i>
</a>
</td>
</tr>
`
            });
            $('#lista_usuarios').html(template); // se selecciona el elemento task del tbody y le insertamos la plantilla creada con el javascrip
        }
    });

}


// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

$(document).on('click', '.task-item', function() { //se escucha la clase task-item y se maneja por una funcion 
    let elemento = $(this)[0].parentElement.parentElement; // se optiene el elemento seleccionado
    let id_admin = $(elemento).attr('seleccionarid'); // se guarda en una variable ID el elemento con atributo que tenga la clase taskid
    $.post('seleccionarusuario.php', { id_admin }, function(response) {
        const task = JSON.parse(response);
        $('#nombre').val(task.nombre);
        $('#usuario').val(task.usuario);
        $('#id_admin').val(task.id_admin);

        edit = true;

    });
});
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


});