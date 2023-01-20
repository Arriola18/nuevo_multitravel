<?php
session_start();
if ($_SESSION['cargo'] != 1) {
	?>
	<script type="text/javascript">
		window.location.href='../index.php';
	</script>
<?php
}
Eliminarcategoria($_GET['id_categoria']);

function Eliminarcategoria($id_categoria)
{
  include '../conexiones/conexion.php';
  $sentencia="DELETE FROM categorias WHERE id_categoria='".$id_categoria."'";
  $conexion->query($sentencia) or die ("error al eliminar".mysqli_error($conexion));
}
?>
<script type="text/javascript">
alert("Subcategoria eliminada exitosamente");
window.location.href='subcateg_admin.php';
</script>
