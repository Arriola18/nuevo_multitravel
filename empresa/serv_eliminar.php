<?php
session_start();
if ($_SESSION['cargo'] == 2 or $_SESSION['cargo'] == 0) {
    ?>
    <script type="text/javascript">
        window.location.href='../index.php';
    </script>
<?php
}

EliminarServicio($_GET['id_servicio']);

function EliminarServicio($id_servicio)
{
  include '../conexiones/conexion.php';
  $sentencia="DELETE FROM servicios WHERE id_servicio='".$id_servicio."'";
  $conexion->query($sentencia) or die ("error al eliminar".mysqli_error($conexion));
}
?>
<script type="text/javascript">
alert("Servicio eliminado exitosamente");
window.location.href='index.php';
</script>
