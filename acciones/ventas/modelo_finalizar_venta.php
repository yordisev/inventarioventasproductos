<?php
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if ($_POST['action'] == 'finalizar_compra'){

    $usuario = $_POST['usuario'];
 
   require_once('../../config/database.php');

  try {


$ejecutar = $conn->prepare("CALL finalizar_venta (?);");
$ejecutar->bind_param("s", $usuario);
$ejecutar->execute();
   

$id_registro = $ejecutar->id;
if ($id_registro > 0 ){
   $respuesta = array(
       'respuesta' => 'exito',
       'venta_realizada' => $usuario
   );

}else {
   $respuesta = array(
       'respuesta' => 'error'
   );
}
$ejecutar->close();
$conn->close();

  } catch (Exception $e) {
      echo " Error " . $e->getMessage();
  }

  die(json_encode($respuesta));

}



?>