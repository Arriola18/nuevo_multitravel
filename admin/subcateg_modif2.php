<?php
session_start();
if ($_SESSION['cargo'] != 1) {
	?>
	<script type="text/javascript">
		window.location.href='../index.php';
	</script>
<?php
}
ModificarCategoria($_POST['id_categoria'], $_POST['nombre_categoria'], $_POST['categoria_p']);
function ModificarCategoria($id_categoria, $nombre_categoria, $categoria_p)
{
  include '../conexiones/conexion.php';

  echo $sentencia= "UPDATE categorias SET nombre_categoria='".$nombre_categoria."', categoria_p='".$categoria_p."' WHERE id_categoria='".$id_categoria."'";
  $conexion->query($sentencia) or die ("error al actualizar la categoria".mysqli_error($conexion));
}
?>

<script type="text/javascript">
alert("Subcategoria modificada exitosamente");
window.location.href='subcateg_admin.php';
</script>