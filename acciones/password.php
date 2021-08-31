<?php
if ($_POST['registro'] == 'actualizar_pass'){

    $password = $_POST['password'];
    $usuario = $_POST['usuario'];
    require_once('../config/database.php');
    $opciones = array(
        'cost' => 12
    );

   try {
    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

$ejecutar = $conn->prepare("UPDATE  usuarios_db  SET  password = ?, editado = NOW() WHERE usuario = ?");
$ejecutar->bind_param("ss", $password_hashed, $usuario);
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