<?php 
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if ($_POST['registro'] == 'agregar_producto_venta'){
    $cantidad = 1; 
    $codigo = $_POST["codigo"]; 
    $producto = $_POST["producto"]; 
    $tipo = $_POST["tipo"]; 
    $precio_venta = $_POST["precio_venta"];
    $usuario = $_POST["usuario"];  
    $codigo_compra = $_POST["codigo_compra"]; 
    require_once('../../config/database.php');
   try {

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ sumar saldo en caja @@@@@@@@@@@@@@@@@@@@
$stmt = $conn->prepare("SELECT cantidad FROM venta_tmp_db WHERE codigo = ? AND codigo_venta = ?");
$stmt -> bind_param('ss', $codigo, $codigo_compra);
$stmt -> execute();
$stmt -> store_result();
$stmt -> bind_result($cantidad_vender1);
$stmt -> fetch();

$cantidad_vender = $cantidad + $cantidad_vender1;
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ sasignar turno numero @@@@@@@@@@@@@@@@@@
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ sumar saldo en caja @@@@@@@@@@@@@@@@@@@@
    $sqlsmtm = $conn->prepare("SELECT usuario_venta FROM venta_tmp_db WHERE codigo_venta != ?");
    $sqlsmtm -> bind_param('s', $codigo_compra);
    $sqlsmtm -> execute();
    $sqlsmtm -> store_result();
    $sqlsmtm -> bind_result($usuario_venta);
    $sqlsmtm -> fetch();
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ sasignar turno numero @@@@@@@@@@@@@@@@@@
     // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ sumar saldo en caja @@@@@@@@@@@@@@@@@@@@
 $sqlsmtm1 = $conn->prepare("SELECT codigo, usuario_venta FROM venta_tmp_db WHERE codigo_venta != ?");
 $sqlsmtm1 -> bind_param('s', $codigo_compra);
 $sqlsmtm1 -> execute();
 $sqlsmtm1 -> store_result();
 $sqlsmtm1 -> bind_result($codigo_nuevo, $usuario_venta1);
 $sqlsmtm1 -> fetch();
 // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ sasignar turno numero @@@@@@@@@@@@@@@@@@
if ($cantidad_vender1 >= 1) {
    $ejecutar1 = $conn->prepare("UPDATE  venta_tmp_db  SET cantidad = ? WHERE codigo = ? AND usuario_venta = ? AND codigo_venta = ?");
$ejecutar1->bind_param("ssss", $cantidad_vender, $codigo, $usuario, $codigo_compra);
$ejecutar1->execute();
if ($ejecutar1->affected_rows){
    $respuesta = array(
        'respuesta' => 'exito',
        'producto_agregado' => $producto
    );
}else {
    $respuesta = array(
        'respuesta' => 'error'
    );
}
$ejecutar1->close();
$conn->close();
} else if ($usuario != $usuario_venta1) {
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ insertarturno@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$ejecutar = $conn->prepare("INSERT INTO venta_tmp_db (codigo,codigo_venta,producto,tipo,cantidad,precio,usuario_venta,fecha_venta) VALUES (?,?,?,?,?,?,?,NOW())");
$ejecutar->bind_param("sssssss",$codigo,$codigo_compra, $producto,$tipo,$cantidad,$precio_venta,$usuario);
$ejecutar->execute();

// print_r($ejecutar);
$id_registro = $ejecutar->id;
if ($id_registro > 0 ){
    $respuesta = array(
        'respuesta' => 'exito',
        'producto_agregado' => $producto
    );
}else{
     
    $respuesta = array(
        'respuesta' => 'error',
    );

}
$ejecutar->close();
$conn->close();
}
else
{
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ insertarturno@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$ejecutar = $conn->prepare("INSERT INTO venta_tmp_db (codigo,codigo_venta,producto,tipo,cantidad,precio,usuario_venta,fecha_venta) VALUES (?,?,?,?,?,?,?,NOW())");
$ejecutar->bind_param("sssssss",$codigo,$codigo_compra, $producto,$tipo,$cantidad,$precio_venta,$usuario);
$ejecutar->execute();

// print_r($ejecutar);
$id_registro = $ejecutar->id;
if ($id_registro > 0 ){
    $respuesta = array(
        'respuesta' => 'exito',
        'producto_agregado' => $producto
    );
}else{
     
    $respuesta = array(
        'respuesta' => 'error',
    );

}
$ejecutar->close();
$conn->close();
}




   } catch (Exception $e) {
       echo " Error " . $e->getMessage();
   }

   die(json_encode($respuesta));
}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if ($_POST['registro'] == 'eliminar'){

    $id_venta = $_POST['id_venta'];
 
   require_once('../../config/database.php');

  try {
  
$ejecutar = $conn->prepare("DELETE FROM   venta_tmp_db  WHERE id_venta = ?");
$ejecutar->bind_param("s", $id_venta);
$ejecutar->execute();
if ($ejecutar-> affected_rows ){
   $respuesta = array(
       'respuesta' => 'exitoso',
       'id_eliminado' => $id_venta
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



// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if ($_POST['registro'] == 'eliminar_venta'){

    $id_venta = $_POST['id_venta'];
 
   require_once('../../config/database.php');

  try {
  
$ejecutar = $conn->prepare("DELETE FROM  ventas_realizadas  WHERE id_venta = ?");
$ejecutar->bind_param("s", $id_venta);
$ejecutar->execute();
if ($ejecutar-> affected_rows ){
   $respuesta = array(
       'respuesta' => 'exitoso',
       'id_eliminado' => $id_venta
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