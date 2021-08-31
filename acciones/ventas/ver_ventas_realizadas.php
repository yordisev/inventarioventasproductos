<?php
require_once('../../config/database.php');
include_once '../sessiones.php';
$action = (isset($_REQUEST['action']));
if ($action == 'ver_tabla') {


	$query = "SELECT * FROM codigos_db";
	$resultado = mysqli_query($conn, $query);
	if (!$resultado) {
		die('La consulta fallo' . mysqli_error($conn));
	}

	$items = 1;
	$suma = 0;
	while ($row = mysqli_fetch_array($resultado)) {
?>

		<tr>
			<th><?php echo $items; ?></th>
			<th class="text-center"><?php echo $row['usuario']; ?></th>
			<th class="text-center"><?php echo $row['codigo_venta']; ?></th>
			<td class="text-center">
                  <?php 
      if ($row['estado'] == 'ACTIVO') {
        echo '<span class="label label-success">Activo</span>';
      } else if ($row['estado'] == 'INACTIVO') {
        echo '<span class="label label-danger">Inactivo</span>';
      } 
      ?>
                </td>
			<td class="text-center"><button data-target="#cobrosModal" data-toggle="modal" type="button" data-codigo_venta="<?php echo $row['codigo_venta'];?>" class="eliminar_producto_venta btn btn-success btn-xs"><i class="fa  fa-navicon"></i></button></td>


		</tr>
	<?php
		$items++;
	}
	?>
	
	
<?php

}
?>