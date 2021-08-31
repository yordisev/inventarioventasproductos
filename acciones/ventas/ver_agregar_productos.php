<?php
session_start();
require_once "../../config/database.php";

$query = "SELECT * FROM productos_db";
$resultado = mysqli_query($conn, $query);

if (!$resultado) {
	die("error");
} else {
	while ($data = mysqli_fetch_assoc($resultado)) {
		$arreglo["data"][] = $data;
       
	}

	echo json_encode($arreglo);
}

mysqli_free_result($resultado);
mysqli_close($conn);

