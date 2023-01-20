<?php
session_start();
if ($_SESSION['cargo'] != 1) {
	?>
	<script type="text/javascript">
		window.location.href='../index.php';
	</script>
<?php
}
CrearCategoria($_POST['nombre_categoria'],$_POST['categoria_p']);
function CrearCategoria($nombre_categoria, $categoria_p)
{
  include '../conexiones/conexion.php';

  echo $sentencia= "INSERT INTO categorias (nombre_categoria, categoria_p) VALUES ('".$nombre_categoria."','".$categoria_p."')";
  $conexion->query($sentencia) or die ("error al actualizar los datos".mysqli_error($conexion));
}
?>

<script type="text/javascript">
alert("Categoría creada exitosamente");
window.location.href='subcateg_admin.php';
</script>
