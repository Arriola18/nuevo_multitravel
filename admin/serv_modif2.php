<?php
session_start();
if ($_SESSION['cargo'] != 1) {
	?>
	<script type="text/javascript">
		window.location.href='../index.php';
	</script>
<?php
}

if (empty($_POST['precio']) or empty($_POST['nombre_servicio'])) {
	?>
	<script type="text/javascript">
		alert ('Los campos de nombre y precio son obligatorios');
		history.go(-1);
	</script>
<?php
}
else{

	if ($_FILES['imagen_inic_modif']['size'] > 0) {
		$filename = basename($_FILES['imagen_inic_modif']['name']);
		$explode = explode(".",$filename);
		$targetDir = "../multimedia/servicios/";
		$target_path = $targetDir . $filename;
		if (move_uploaded_file($_FILES['imagen_inic_modif']['tmp_name'],$target_path)) {
		}
	}
	else {
		$filename = " ";
	}

	function ModificarProducto($id_servicio, $nombre_servicio, $descripcion_servicio, $precio, $nombre_empresa, $fecha_limite, $filename, $categoria_serv, $descuento_aplicable, $subcategoria1, $subcategoria2, $subcategoria3)
	{
	include '../conexiones/conexion.php';

	echo $sentencia= "UPDATE servicios SET id_servicio='".$id_servicio."', nombre_servicio='".$nombre_servicio."', descripcion_servicio='".$descripcion_servicio."', precio='".$precio."', nombre_empresa='".$nombre_empresa."', fecha_limite='".$fecha_limite."', imagen_serv='".$filename."', categoria_serv='".$categoria_serv."', descuento_aplicable='".$descuento_aplicable."', subcategoria1='".$subcategoria1."', subcategoria2='".$subcategoria2."', subcategoria3='".$subcategoria3."' WHERE id_servicio='".$id_servicio."'";
	$conexion->query($sentencia) or die ("error al actualizar los datos".mysqli_error($conexion));
	}
	ModificarProducto($_POST['id_servicio'], $_POST['nombre_servicio'], $_POST['descripcion_servicio'], $_POST['precio'], $_POST['nombre_empresa'], $_POST['fecha_limite'], $filename, $_POST['categoria_serv'], $_POST['descuento_aplicable'], $_POST['subcategoria1'], $_POST['subcategoria2'], $_POST['subcategoria3']);
}
?>

<script type="text/javascript">
alert("datos actualizados exitosamente");
window.location.href='index.php';
</script>