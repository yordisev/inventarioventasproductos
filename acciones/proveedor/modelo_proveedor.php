<?php

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

if ($_POST['registro'] == 'nuevo'){

    // $respuesta = array(
    //     'post' => $_POST,
    //     'file' => $_FILES
    // );

    // die(json_encode($respuesta));

    $codigo = $_POST['codigo'];
    $proveedor = $_POST['proveedor'];
    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nit = $_POST['nit'];
    // $imagen = $_POST['imagen_p'];
    $estado = $_POST['estado'];

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
    
$ejecutar = $conn->prepare("INSERT INTO proveedor_db (codigo, proveedor, tipo, nombre, apellido, nit, imagen, estado) VALUES (?,?,?,?,?,?,?,?)");
$ejecutar->bind_param("ssssssss", $codigo, $proveedor, $tipo, $nombre, $apellido, $nit, $imagen_url,  $estado );
$ejecutar->execute();
$id_registro = $ejecutar->insert_id;
if ($id_registro > 0 ){
    $respuesta = array(
        'respuesta' => 'exito',
        'id_producto' => $id_registro,
        'imagen_resultado' => $imagen_resultado
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

   die(json_encode($respuesta));
}




if ($_POST['registro'] == 'actualizarimagen'){

    $codigo = $_POST['codigo'];
    

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
   
$ejecutar = $conn->prepare("UPDATE  proveedor_db  SET  imagen = ? WHERE codigo = ?");
$ejecutar->bind_param("ss",  $imagen_url, $codigo);
$ejecutar->execute();
if ($ejecutar-> affected_rows ){
    $respuesta = array(
        'respuesta' => 'exitoso',
        'id_actualizado' => $ejecutar->insert_id
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


if ($_POST['registro'] == 'actualizar'){

    $codigo = $_POST['codigo'];
    $proveedor = $_POST['proveedor'];
    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nit = $_POST['nit'];
    $estado = $_POST['estado'];

   
    require_once('../../config/database.php');

   try {
   
$ejecutar = $conn->prepare("UPDATE  proveedor_db  SET  proveedor = ?, tipo = ?, nombre = ?, apellido = ?, nit = ?, estado = ? WHERE codigo = ?");
$ejecutar->bind_param("sssssss",  $proveedor, $tipo, $nombre, $apellido, $nit, $estado, $codigo);
$ejecutar->execute();
if ($ejecutar-> affected_rows ){
    $respuesta = array(
        'respuesta' => 'exitoso',
        'id_actualizado' => $ejecutar->insert_id
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




if ($_POST['registro'] == 'eliminar'){

    $codigo = $_POST['codigo'];
 
   require_once('../../config/database.php');

  try {
  
$ejecutar = $conn->prepare("DELETE FROM   proveedor_db  WHERE codigo = ?");
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



?>