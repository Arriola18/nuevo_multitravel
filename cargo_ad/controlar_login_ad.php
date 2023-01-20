<?php
include "../conexiones/conexion.php";
if (!empty($_POST['button'])) {
    if (empty($_POST['user']) or empty($_POST['clave_admin'])) {
        echo "<div style='vertical-align: middle; height: 40px; width: calc(30% - 8px); border: 4px solid #570000; border-radius: 10px; background-color: #d42929; color: #fff; align-content: center; font-size: 25px;'>Faltan datos por ingresar</div><p>";
    }
    else {
        include "../conexiones/conexion.php";
        $user=$_POST['user'];
        $clavead=$_POST['clave_admin'];
        $sql= $conexion->query("SELECT * FROM usuarios WHERE email='".$user."'");
        if ($datos=$sql->fetch_object()) {
            if ($clavead=="HE92K4FD08@YYI") {
                echo $sentencia_ad_cargo = "UPDATE usuarios SET cargo=1 WHERE email='".$_POST['user']."'";
                $conexion->query($sentencia_ad_cargo) or die ("error al actualizar los datos".mysqli_error($conexion));
                ?>
                <script type="text/javascript">
                    alert('Bienvenido');
                    window.location.href='../';
                </script>
            <?php
            }
            else {
                echo "<div style='vertical-align: middle; height: 40px; width: calc(30% - 8px); border: 4px solid #570000; border-radius: 10px; background-color: #d42929; color: #fff; align-content: center; font-size: 25px;'>Acceso denegado</div><p>";
                ?>
                <script type="text/javascript">
                    alert('Acceso denegado');
                    window.location.href='../';
                </script>
            <?php
            }
        }
    }
}
?>