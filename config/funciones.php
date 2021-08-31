<?php
function db(){

    return $conn = new mysqli('localhost', 'root', '', 'db_ventas_productos');
}

function productos(){
    $conn = db();
    $ejecutar = "SELECT * FROM productos_db";
    $resultado = $conn->query($ejecutar);
    $datos = array();

    while ($row = $resultado->fetch_assoc()) {
      $datos[]= $row;
    }
    return $datos;
  }

  function proveedor(){
    $conn = db();
    $ejecutar = "SELECT * FROM proveedor_db";
    $resultado = $conn->query($ejecutar);
    $datos = array();

    while ($row = $resultado->fetch_assoc()) {
      $datos[]= $row;
    }
    return $datos;
  }

?>