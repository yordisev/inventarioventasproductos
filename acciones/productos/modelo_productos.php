<?php
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

if ($_POST['registro'] == 'nuevo'){
if($producto = $_POST['producto'] == '' || $tipo = $_POST['tipo'] == '' || $distribuidor = $_POST['distribuidor'] == '' ||
$estado = $_POST['estado'] == '' || $stock = $_POST['stock'] == '' || $precio_venta = $_POST['precio_venta'] == '' || $precio_compra = $_POST['precio_compra'] == '' || $imagen_url = $_FILES['imagen_p']['name'] == '')
    {
        $respuesta = array(
            'campos_vacios' => 'vacios'
        );
    } else {
        $producto = $_POST['producto'];
        $tipo = $_POST['tipo'];
        $distribuidor = $_POST['distribuidor'];
        $estado = $_POST['estado'];
        $stock = $_POST['stock'];
        $precio_venta = $_POST['precio_venta'];
        $precio_compra = $_POST['precio_compra'];
        // $vendido = $_POST['vendido'];
        // $ganancias = $_POST['ganancias'];
    
        $directorio = "../../imagenes/";
        if(!is_dir($directorio)){
            mkdir($directorio, 0775, true);
        }
    
    if(move_uploaded_file($_FILES['imagen_p']['tmp_name'], $directorio . $_FILES['imagen_p']['name'])){
        $imagen_url = $_FILES['imagen_p']['name'];
        $imagen_resultado = "Se subio Correctamente";
    }else{
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }
        require_once('../../config/database.php');
        try {
         
               // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ generar CODIGO@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

   $query_id = mysqli_query($conn, "SELECT RIGHT(codigo,4) as codigo FROM productos_db ORDER BY codigo DESC LIMIT 1")
   or die('error '.mysqli_error($conn));

$contar = mysqli_num_rows($query_id);
if ($contar <> 0) {
$data_id = mysqli_fetch_assoc($query_id);
$codigo    = $data_id['codigo']+1;
} else {
$codigo = 1;
}
$asignar_codigo   = str_pad($codigo, 4, "0", STR_PAD_LEFT);
$codigo = "P$asignar_codigo";
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ generar turno@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
     $ejecutar = $conn->prepare("INSERT INTO productos_db (codigo, imagen, producto, tipo, distribuidor, estado, stock, precio_venta, precio_compra) VALUES (?,?,?,?,?,?,?,?,?)");
     $ejecutar->bind_param("sssssssss", $codigo,$imagen_url, $producto, $tipo, $distribuidor, $estado, $stock, $precio_venta, $precio_compra);
     $ejecutar->execute();
     // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ sumar saldo en caja @@@@@@@@@@@@@@@@@@@@
$stmt = $conn->prepare("SELECT codigo FROM productos_db  ORDER BY codigo DESC LIMIT 1");
// $stmt -> bind_param('s', $tipo_tramite);
$stmt -> execute();
$stmt -> store_result();
$stmt -> bind_result($codigo_asignado);
$stmt -> fetch();
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ sasignar turno numero @@@@@@@@@@@@@@@@@@
     $id_registro = $ejecutar->insert_id;
     if ($id_registro > 0 ){
         $respuesta = array(
             'respuesta' => 'exito',
             'id_producto' => $producto,
             'codigo_asignado' => $codigo_asignado
         );
     
     }else {
         $respuesta = array(
             'respuesta' => 'error',
         );
     }
     $ejecutar->close();
     $conn->close();
     
        } catch (Exception $e) {
            echo " Error " . $e->getMessage();
        }
    }
   

   die(json_encode($respuesta));
}



// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if ($_POST['registro'] == 'actualizar'){

 $id_producto = $_POST['id_producto'];
    $producto = $_POST['producto'];
    $tipo = $_POST['tipo'];
    $distribuidor = $_POST['distribuidor'];
    $estado = $_POST['estado'];
    $stock = $_POST['stock'];
    
    $precio_venta = $_POST['precio_venta'];
    $precio_compra = $_POST['precio_compra'];
    $vendido = $_POST['vendido'];
    $ganancias = $_POST['ganancias'];
    require_once('../../config/database.php');

   try {
   
$ejecutar = $conn->prepare("UPDATE  productos_db  SET producto = ?, tipo = ?, distribuidor = ?, estado = ?, stock = ?, precio_venta = ?, precio_compra = ?, vendido = ?, ganancias = ?, fecha_ingreso = NOW() WHERE id_producto = ?");
$ejecutar->bind_param("ssssssssss", $producto, $tipo, $distribuidor, $estado, $stock, $precio_venta, $precio_compra, $vendido, $ganancias, $id_producto);
$ejecutar->execute();
if ($ejecutar->affected_rows){
    $respuesta = array(
        'respuesta' => 'exitoso',
        'id_actualizado' => $producto
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

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if ($_POST['registro'] == 'eliminar'){

    $codigo = $_POST['codigo'];
 
   require_once('../../config/database.php');

  try {
  
$ejecutar = $conn->prepare("DELETE FROM   productos_db  WHERE codigo = ?");
$ejecutar->bind_param("s", $codigo);
$ejecutar->execute();
if ($ejecutar-> affected_rows ){
   $respuesta = array(
       'respuesta' => 'exitoso',
       'id_eliminado' => $codigo
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

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if ($_POST['registro'] == 'actualizarimagen'){

    $id_producto = $_POST['id_producto'];
    

    $directorio = "../../imagenes/";
    if(!is_dir($directorio)){
        mkdir($directorio, 0775, true);
    }

if(move_uploaded_file($_FILES['imagen_p']['tmp_name'], $directorio . $_FILES['imagen_p']['name'])){
    $imagen_url = $_FILES['imagen_p']['name'];
    $imagen_resultado = "Se subio Correctamente";
}else{
    $respuesta = array(
        'respuesta' => error_get_last()
    );
}
    require_once('../../config/database.php');

   try {
   
$ejecutar = $conn->prepare("UPDATE  productos_db  SET  imagen = ? WHERE id_producto = ?");
$ejecutar->bind_param("ss",  $imagen_url, $id_producto);
$ejecutar->execute();
if ($ejecutar-> affected_rows ){
    $respuesta = array(
        'respuesta' => 'exitoso',
        'id_actualizado' => $id_producto
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