<?php
session_start();
if (is_null($_POST['id_servc'])) {
	?>
	<script type="text/javascript">
		window.location.href='../index.php';
	</script>
<?php
}
if ($_POST['precio']=="") {
    $precio = 0;
    $precio_uni = 0;
}
else {
    $precio = ($_POST['precio'])*$_POST['cant'];
    $precio_uni = $_POST['precio'];
}

CrearPedido($_POST['usuario_d'], $_POST['id_servc'], $_POST['cant'], $precio, $precio_uni);
function CrearPedido($usuario_d, $id_servc, $cant, $precio_tot, $precio_un)
{
	include '../conexiones/conexion.php';

  	echo $sentencia= "INSERT INTO pedidos (user_doc, servicio, cantidad, precio, precio_unitario) VALUES ('".$usuario_d."','".$id_servc."','".$cant."','".$precio_tot."','".$precio_un."')";
  	$conexion->query($sentencia) or die ("error al actualizar los datos".mysqli_error($conexion));
}
?>

<script type="text/javascript">
alert("Pedido ingresado exitosamente");
window.location.href='index.php';
</script>