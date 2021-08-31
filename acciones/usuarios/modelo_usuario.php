<?php

if ($_POST['registro'] == 'nuevo'){
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    require_once('../../config/database.php');
    $opciones = array(
        'cost' => 12
    );

    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

   try {
    
$ejecutar = $conn->prepare("INSERT INTO usuarios_db (usuario, nombre, password) VALUES (?,?,?)");
$ejecutar->bind_param("sss", $usuario, $nombre, $password_hashed);
$ejecutar->execute();
$id_registro = $ejecutar->insert_id;
if ($id_registro > 0 ){
    $respuesta = array(
        'respuesta' => 'exito',
        'id_admin' => $id_registro
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


if ($_POST['registro'] == 'actualizar'){

    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    // $password = $_POST['password'];
    $id_admin = $_POST['id_admin'];
    require_once('../../config/database.php');
    // $opciones = array(
    //     'cost' => 12
    // );

   try {
    // $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

$ejecutar = $conn->prepare("UPDATE  usuarios_db  SET usuario = ?, nombre = ?, editado = NOW() WHERE id_admin = ?");
$ejecutar->bind_param("ssi", $usuario, $nombre, $id_admin);
$ejecutar->execute();
if ($ejecutar-> affected_rows ){
    $respuesta = array(
        'respuesta' => 'exitoso',
        'id_actualizado' => $ejecutar->insert_id
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





?>