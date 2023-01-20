<?php
session_start();
if ($_SESSION['cargo'] != 1) {
	?>
	<script type="text/javascript">
		window.location.href='../index.php';
	</script>
<?php
}

include '../conexiones/conexion.php';

if (empty($_POST['precio']) or empty($_POST['nombre_servicio'])) {
	?>
	<script type="text/javascript">
		alert ('Los campos de nombre y precio son obligatorios.');
		history.go(-1);
	</script>
<?php
}
else{

	if ($_FILES['imagen_inic']['size'] > 0) {
		$filename = basename($_FILES['imagen_inic']['name']);
		$explode = explode(".",$filename);
		$targetDir = "../multimedia/servicios/";
		$target_path = $targetDir . $filename;
		if (move_uploaded_file($_FILES['imagen_inic']['tmp_name'],$target_path)) {
		}
	}
	else {
		$filename = " ";
	}
	
	/*$target_dir = "../multimedia/servicios/";
	$dir = $target_dir;
	mkdir($dir, 0777, true);
	$target_dir = $dir . basename($_FILES["imagen_serv"]);

	if (move_uploaded_file($_FILES["imagen_serv"], $target_dir)) {
		$ruta_img_serv=$_FILES["imagen_serv"];

	}*/

	NuevoServicio($_POST['nombre_servicio'], $_POST['descripcion_servicio'], $_POST['precio'], $_POST['nombre_empresa'], $_POST['fecha_limite'], $filename, $_POST['categoria_serv'], $_POST['descuento_aplicable'], $_POST['subcategoria1'], $_POST['subcategoria2'], $_POST['subcategoria3']);
	function NuevoServicio($nombre_servicio, $descripcion_servicio, $precio, $nombre_empresa, $fecha_limite, $filename, $categoria_serv, $descuento_aplicable, $subcategoria1, $subcategoria2, $subcategoria3)
	{
		include '../conexiones/conexion.php';

		echo $sentencia= "INSERT INTO servicios (nombre_servicio, descripcion_servicio, precio, nombre_empresa, fecha_limite, imagen_serv, categoria_serv, descuento_aplicable, subcategoria1, subcategoria2, subcategoria3) VALUES ('".$nombre_servicio."','".$descripcion_servicio."','".$precio."','".$nombre_empresa."','".$fecha_limite."','".$filename."','".$categoria_serv."','".$descuento_aplicable."','".$subcategoria1."','".$subcategoria2."','".$subcategoria3."')";
		$conexion->query($sentencia) or die ("error al actualizar los datos".mysqli_error($conexion));
	}
}
?>

<script type="text/javascript">
alert("Producto ingresado exitosamente");
window.location.href='index.php';
</script>