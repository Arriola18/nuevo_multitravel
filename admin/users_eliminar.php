<?php
session_start();
if ($_SESSION['cargo'] != 1) {
	?>
	<script type="text/javascript">
		window.location.href='../index.php';
	</script>
<?php
}
EliminarUsuario($_GET['documento']);

function EliminarUsuario($documento)
{
  include '../conexiones/conexion.php';
  $sentencia="DELETE FROM usuarios WHERE documento='".$documento."'";
  $conexion->query($sentencia) or die ("error al eliminar".mysqli_error($conexion));
}
?>
<script type="text/javascript">
alert("Usuario eliminado exitosamente");
window.location.href='users_admin.php';
</script>
