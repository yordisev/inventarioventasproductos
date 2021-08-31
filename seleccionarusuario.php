<?php
include('config/database.php');



    $id_admin = $_POST['id_admin'];

$query = "SELECT * FROM usuarios_db WHERE id_admin = $id_admin";
$resultado = mysqli_query($conn, $query);

if (!$resultado){
    die('Nose pudo EDITAR el archivo');
}

$json = array();
while($row = mysqli_fetch_array($resultado)){
    $json[] = array(
        'nombre' => $row['nombre'],
        'usuario' => $row['usuario'],
        'id_admin' => $row['id_admin']
    );
}

$jsonstring = json_encode($json[0]);
echo $jsonstring;


?>