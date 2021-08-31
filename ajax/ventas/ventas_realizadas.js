$(document).ready(function () {
   
    ver_ventas_realizadas();  

});


function ver_ventas_realizadas(){
    var parametros={"action":"ver_tabla"};
    $.ajax({
        url:'acciones/ventas/ver_ventas_realizadas.php',
        data: parametros,
         beforeSend: function(objeto){
         $('.ventas_realizadas_tabla').html('Cargando...');
      },
        success:function(data){
            $(".ventas_realizadas_tabla").html(data).fadeIn('slow');
    }
    })
  }
  
  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//   function enableClicks(id_venta) {
  
//     console.log(id_venta);
//       $.ajax({
//         url: 'acciones/ventas/modelo_ventas.php',
//         type: 'POST',
//         data: {
//           'id_venta': id_venta,
//           'registro' : 'eliminar'
//       },
//         dataType: 'json',
//         success: function (data) {
//           var resultado = data;
//           if (resultado.respuesta == 'exitoso') {
//             mostrar_items();
//               swal({
//                 type: 'success',
//                 title: 'Producto Quitado:'
//               }).then(function(){ 
//                   location.reload();
//                   });
//           } else {
//               swal(
//                   'Error',
//                   'Turno no registrado',
//                   'error'
//               )
//           }
  
//       }
        
//       });
//   }

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@modal de cobros @@@@@@@@@@@@@@@@@@@@@@@
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

   function enableClicks(id_venta) {
    $.ajax({
      url: 'acciones/ventas/modelo_ventas.php',
      type: 'POST',
      data: {
        'id_venta': id_venta,
        'registro' : 'eliminar_venta'
    },
      dataType: 'json',
      success: function (data) {
        cargar_cobros($('#codigo_venta_realizada').html());//Cargas los pagos
        var resultado = data;
        if (resultado.respuesta == 'exitoso') {
            swal({
              type: 'success',
              title: 'Producto Quitado:'
            })
        } else {
            swal(
                'Error',
                'no se logro eliminar',
                'error'
            )
        }

    }
      
    });
}

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  $('#cobrosModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var codigo_venta = button.data('codigo_venta') // Extract info from data-* attributes
    cargar_cobros(codigo_venta);//Cargas los pagos	
      
  })


  function cargar_cobros(codigo_venta){
    var parametros = {"action":"ajax","codigo_venta":codigo_venta};
    console.log(codigo_venta);
   $.ajax({
       url:'acciones/ventas/ver_modal_cobro.php',
       data: parametros,
       beforeSend: function(objeto){
           $("#loader2").html("<img src='./img/ajax-loader.gif'>");
        },
       success:function(data){
           $(".ver_modal_cobro").html(data).fadeIn('slow');
           $("#loader2").html("");
       }
   });
}

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@modal de cobros @@@@@@@@@@@@@@@@@@@@@@@

$('#agregarCobroModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var parametros = {"action":"ajax","id":id};
      $.ajax({
          url:'modal/editar/agregar_cobro.php',
          data: parametros,
          beforeSend: function(objeto){
              $("#loader3").html("<img src='./img/ajax-loader.gif'>");
           },
          success:function(data){
              $(".outer_div3").html(data).fadeIn('slow');
              $("#loader3").html("");
          }
      });
  })

//   @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$("#agregar_cobro" ).submit(function(event) {
    var id=$("#sale_id").val();
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url:'ajax/registro/agregar_cobro.php',
        data: parametros,
         beforeSend: function(objeto){
            $("#loader_pago").html("<img src='./img/ajax-loader.gif'>");
          },
        success: function(data){
            removeElement();
            $("#loader_pago").html(data).fadeIn('slow');
            $('#agregarCobroModal').modal('hide');
            cargar_cobros(codigo_venta);
            
            
      }
    });
    event.preventDefault();
});