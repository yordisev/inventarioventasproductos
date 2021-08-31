
<?php

$conn = new mysqli('localhost', 'root', '', 'db_ventas_productos');

if($conn->connect_error){
	echo $error -> $conn->connect_error;
}

?>