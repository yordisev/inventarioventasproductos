$(function () {

    // SELECT DE BUSQUEDA EN IMPUT
    $(".select2").select2();
// DATA TABLES CON BUSCADOR
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });


  jQuery(document).on('click', '#toggleButton', function() {
    jQuery('#div1, #div2').toggle(500);
  });

  

$('#actualizar_clave').attr('disabled',true);

  $('#repetir_password').on('blur',function(){
    var password_nuevo = $('#password').val();
    if ($(this).val() == password_nuevo){
      $('#resultado_password').text('correcto');
      $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
      $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
      $('#actualizar_clave').attr('disabled',false);
    } else{
      $('#resultado_password').text('No son iguales');
      $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
      $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
    }
  })
