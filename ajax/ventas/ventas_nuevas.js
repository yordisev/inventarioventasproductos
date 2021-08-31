$(document).ready(function () {
listar();
mostrar_items();  

$('#codigo_compra').attr('readonly') 
var codigo_compra = $('#codigo_compra').val();
if(codigo_compra != '') {
  $('#generar_codigo_venta').hide();
  
        } else {
          $('#generar_codigo_venta').show();
        }
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// generar turno triaje
$('#generar_codigo_venta').click(function(e) {
  e.preventDefault();
    var usuario = $('#usuario').val();
    var action = 'generar_codigo_venta';
    $.ajax({
      url: 'acciones/ventas/generar_codigo.php',
      type: 'POST',
      async: true,
      data: {action:action,usuario:usuario},
      dataType: 'json',
      success: function (data) {
        var resultado = data;
        if (resultado.respuesta == 'exito') {
            swal({
              title: 'Codigo de Venta es:',
              html:'<div class="btn btn-success">'+
              '<span  class="info-box-number"><h1>'+resultado.su_codigo_es+'</h1></span>'+
            '</div>'
            }).then(function(){ 
                location.reload();
                });
        } else {
            swal(
                'Error',
                'Turno no registrado',
                'error'
            )
        }

    }
      
    });
});
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// generar turno triaje
$('#finalizar_compra').click(function(e) {
  e.preventDefault();
    var usuario = $('#usuario').val();
    var action = 'finalizar_compra';
    console.log(usuario);
    $.ajax({
      url: 'acciones/ventas/modelo_finalizar_venta.php',
      type: 'POST',
      async: true,
      data: {action:action,usuario:usuario},
      dataType: 'json',
      success: function (data) {
        var resultado = data;
        if (resultado.respuesta == 'exito') {
            swal({
              type: 'success',
              title: 'Venta realizada:',
              html:'<div class="btn btn-primary">'+
              '<span  class="info-box-number"><h1>'+resultado.venta_realizada+'</h1></span>'+
            '</div>'
            }).then(function(){ 
                location.reload();
                });
        } else {
            swal(
                'Error',
                'Turno no registrado',
                'error'
            )
        }

    }
      
    });
});
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


  
  });
  
  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  var listar = function(){
    var table = $("#agregar_productos_ventas").DataTable({
        "ajax":{
            "method": "POST",
            "url": "acciones/ventas/ver_agregar_productos.php"
        },
        "columns":[
        //  numeracion de filas  
    //     {
    //     "searchable": false,
    //     "orderable": false,
    //     "targets": 0
    // },
        {"data":"producto"},
    //  numeracion de filas  
            {"data":"producto"},
            {"data":"tipo"},
            {
                "data":"stock",
                render: function (data, stock) {
                  if (stock === 'display') {
                    var label = 'label-primary';
                    if (data >= 30 ) {
                      label = 'label-success';
                    } else if (data > 10 && data <= 30) {
                      label = 'label-warning';
                    }else if (data <= 10) {
                      label = 'label-danger';
                    }
                    return '<span class="label ' + label + '">' + data + '</span>';
                  }
                  return data;
                }
              },
            {"data":"precio_venta"},
            {"defaultContent":"<button class='producto_registro btn btn-info btn-xs'><i class='fa fa-eye'></i>Agregar</button>"}
           
        ],
        //  numeracion de filas  
        "order": [[ 1, 'asc' ]]
        //  numeracion de filas  
        // lenguaje de data table
        
        // lenguaje de data table
    });
    //  numeracion de filas 
    table.on( 'order.dt search.dt', function () {
      table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
} ).draw();
//  numeracion de filas 
obtener_data_editar("#agregar_productos_ventas", table)


}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
var obtener_data_editar = function (tbody, table){
$(tbody).on("click", "button.producto_registro",function(){
var data1 = table.row($(this).parents("tr") ).data();
var codigo = data1.codigo;
var producto = data1.producto;
var tipo = data1.tipo;
var precio_venta = data1.precio_venta;
var usuario = $('#usuario').val();
var codigo_compra = $('#codigo_compra').val();
// console.log(precio_venta);
$.ajax({
  url: 'acciones/ventas/modelo_ventas.php',
  type: 'POST',
  async: true,
  data: {
    'codigo': codigo,
    'producto': producto,
      'tipo': tipo,
    'precio_venta': precio_venta,
      'usuario': usuario,
      'codigo_compra': codigo_compra,
      'registro' : 'agregar_producto_venta'
  }
  ,
  
  dataType: 'json',
  success: function (data) {
    var resultado = data;
    if (resultado.respuesta == 'exito') {
      mostrar_items();
        swal({
          type: 'success',
          title: 'Producto Agregado:'+resultado.producto_agregado+''
        })
    } else {
        swal(
            'Error',
            'Turno no registrado',
            'error'
        )
    }

}
  

});
             
             

});
}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function mostrar_items(){
  var parametros={"action":"ajax"};
  $.ajax({
      url:'acciones/ventas/ver_productos_ventas.php',
      data: parametros,
       beforeSend: function(objeto){
       $('.items').html('Cargando...');
    },
      success:function(data){
          $(".items").html(data).fadeIn('slow');
  }
  })
}

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
function enableClicks(id_venta) {

  console.log(id_venta);
    $.ajax({
      url: 'acciones/ventas/modelo_ventas.php',
      type: 'POST',
      data: {
        'id_venta': id_venta,
        'registro' : 'eliminar'
    },
      dataType: 'json',
      success: function (data) {
        var resultado = data;
        if (resultado.respuesta == 'exitoso') {
          mostrar_items();
            swal({
              type: 'success',
              title: 'Producto Quitado:'
            }).then(function(){ 
                location.reload();
                });
        } else {
            swal(
                'Error',
                'Turno no registrado',
                'error'
            )
        }

    }
      
    });
}