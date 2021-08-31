<?php
include('config/database.php');



$query = "SELECT * FROM usuarios_db";
$resultado = mysqli_query($conn, $query);
if(!$resultado){
    die('La consulta fallo'. mysqli_error($conn));

}


$json = array();
while($row = mysqli_fetch_array($resultado)){
    $json[] = array(
        'nombre' => $row['nombre'],
        'usuario' => $row['usuario'],
        'id_admin' => $row['id_admin']
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;
?>