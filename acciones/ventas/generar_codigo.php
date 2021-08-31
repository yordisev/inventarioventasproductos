<?php 
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if ($_POST['action'] == 'generar_codigo_venta'){

    $estado = 'ACTIVO';
    $usuario = $_POST["usuario"];  

    require_once('../../config/database.php');
   try {

   // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ generar turno@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

   $query_id = mysqli_query($conn, "SELECT RIGHT(codigo_venta,9) as codigo_venta FROM codigos_db ORDER BY codigo_venta DESC LIMIT 1")
   or die('error '.mysqli_error($conn));

$contar = mysqli_num_rows($query_id);
if ($contar <> 0) {
$data_id = mysqli_fetch_assoc($query_id);
$codigo_venta    = $data_id['codigo_venta']+1;
} else {
$codigo_venta = 1;
}
$asignar_codigo   = str_pad($codigo_venta, 9, "0", STR_PAD_LEFT);
$codigo_venta = "V$asignar_codigo";
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ generar turno@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ insertarturno@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$ejecutar = $conn->prepare("INSERT INTO codigos_db (usuario, codigo_venta, estado, fecha_creacion) VALUES (?,?,?,NOW())");
$ejecutar->bind_param("sss", $usuario, $codigo_venta, $estado);
$ejecutar->execute();
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ sumar saldo en caja @@@@@@@@@@@@@@@@@@@@
$stmt = $conn->prepare("SELECT codigo_venta FROM codigos_db WHERE usuario = ? ORDER BY codigo_venta DESC LIMIT 1");
$stmt -> bind_param('s', $usuario);
$stmt -> execute();
$stmt -> store_result();
$stmt -> bind_result($codigo_asignado);
$stmt -> fetch();
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ sasignar turno numero @@@@@@@@@@@@@@@@@@
$id_registro = $ejecutar->id;
if ($id_registro > 0 ){
    $respuesta = array(
        'respuesta' => 'exito',
        'su_codigo_es' => $codigo_asignado
    );
}else{
     
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