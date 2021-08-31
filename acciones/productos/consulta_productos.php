<?php

require_once "../../config/database.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'estado',
    1 => 'producto', 
	2 => 'tipo',
	3 => 'distribuidor',
    4 => 'stock',
    5 => 'precio_venta' 
);

$sql = "SELECT id_producto, estado, producto, tipo, distribuidor, stock, precio_venta ";
$sql.=" FROM productos_db";
$query=mysqli_query($conn, $sql);
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT estado, producto, tipo, distribuidor, stock, precio_venta ";
	$sql.=" FROM productos_db";
	$sql.=" WHERE producto LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR tipo LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR distribuidor LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR stock LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR precio_venta LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql);
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql); // again run query with limit
	
} else {	

	$sql = "SELECT id_producto, estado, producto, tipo, distribuidor, stock, precio_venta ";
	$sql.=" FROM productos_db";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql);
	
}


$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
	
	if ($row["estado"] == 'ACTIVO'){
		$nestedData[] =  $row["estado"] = '<center><span class="label label-primary">Activo</span><center>';
	} else if ($row["estado"] == 'INACTIVO') {
		$nestedData[] =	$row["estado"] = '<center><span class="label label-success">Inactivo</span><center>';
	}
    $nestedData[] = $row["producto"];
	$nestedData[] = $row["tipo"];
	$nestedData[] = $row["distribuidor"];
    if ($row["stock"] >= 30){
		$nestedData[] = '<center><span class="label label-success">'.$row["stock"].'</span><center>';
	} else if ($row["stock"] > 10 && $row["stock"] <= 30) {
		$nestedData[] =	'<center><span class="label label-warning">'.$row["stock"].'</span><center>';
	}else if ($row["stock"] <= 10) {
		$nestedData[] =	'<center><span class="label label-danger">'.$row["stock"].'</span><center>';
	}
	$nestedData[] = number_format($row["precio_venta"],2);
	$nestedData[] = '<td><center>
                     <a href="editar_producto.php?id='.$row['id_producto'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-info btn-xs"><i class="fa fa-eye"></i>Ver</a>
				     </center></td>';	
	$data[] = $nestedData;
    
}



$json_data = array(
			// "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
