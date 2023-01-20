<?php
include '../conexiones/conexion.php';
$n = 0;
$n = $_POST['cargo'];

if ($n == 0) {
    ?>
    <script type="text/javascript">
        window.location.href='../index.php';
    </script>
<?php
}
else {
    if (empty($_POST['documento']) or empty($_POST['nombre1']) or empty($_POST['apellido1']) or empty($_POST['apellido2']) or empty($_POST['pais_na']) or empty($_POST['ciudad_na']) or empty($_POST['fecha_nacimiento']) or empty($_POST['pais_resi']) or empty($_POST['ciudad_resi']) or empty($_POST['direccion_resi']) or empty($_POST['telefono']) or empty($_POST['email']) or empty($_POST['username']) or empty($_POST['clave']) or empty($_POST['clave2'])) {
        ?>
        <script type="text/javascript">
            alert ('Por favor ingrese todos los campos');
            history.go(-1);
        </script>
    <?php
    }
    else {
        $sentencia_rept="SELECT * FROM usuarios WHERE documento='".$_POST['documento']."'";
        $resultado_rept= mysqli_query($conexion,$sentencia_rept);
    
        if (mysqli_num_rows($resultado_rept) > 0) {
            ?>
            <script type="text/javascript">
                alert ('Ya hay una cuenta registrada con el documento ingresado');
                history.go(-1);
            </script>
        <?php
        }
        else {
            $sentencia_rept="SELECT * FROM usuarios WHERE email='".$_POST['email']."'";
            $resultado_rept= mysqli_query($conexion,$sentencia_rept);
    
            if (mysqli_num_rows($resultado_rept) > 0) {
                ?>
                <script type="text/javascript">
                    alert ('Ya hay una cuenta registrada con este email');
                    history.go(-1);
                </script>
            <?php
            }
            else {
    
                $sentencia_rept="SELECT * FROM usuarios WHERE user='".$_POST['username']."'";
                $resultado_rept= mysqli_query($conexion,$sentencia_rept);
            
                if (mysqli_num_rows($resultado_rept) > 0) {
                    ?>
                    <script type="text/javascript">
                        alert ('Ya hay una cuenta registrada con este nombre de usuario');
                        history.go(-1);
                    </script>
                <?php
                }
                else {
                    if ($_POST['clave'] == $_POST['clave2']) {
                        function Usuarios($documento,$tipo_documento,$nombre1,$nombre2,$apellido1,$apellido2,$pais_na,$ciudad_na,$fecha_nacimiento,$pais_resi,$ciudad_resi,$direccion_resi,$telefono,$email,$user,$clave, $cargo) {
                            include '../conexiones/conexion.php';
                            $sentencia ="INSERT INTO usuarios (documento, tipo_documento, nombre1, nombre2, apellido1, apellido2, pais_na, ciudad_na, fecha_nacimiento, pais_resi, ciudad_resi, direccion_resi, telefono, email, user, clave, cargo) VALUES ('".$documento."','".$tipo_documento."','".$nombre1."','".$nombre2."','".$apellido1."','".$apellido2."','".$pais_na."','".$ciudad_na."','".$fecha_nacimiento."','".$pais_resi."','".$ciudad_resi."','".$direccion_resi."','".$telefono."','".$email."','".$user."','".MD5($clave)."', '".$cargo."')";
                            $conexion ->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
                        }
                        Usuarios($_POST['documento'], $_POST['tipo_documento'], $_POST['nombre1'], $_POST['nombre2'] , $_POST['apellido1'], $_POST['apellido2'], $_POST['pais_na'], $_POST['ciudad_na'], $_POST['fecha_nacimiento'], $_POST['pais_resi'], $_POST['ciudad_resi'], $_POST['direccion_resi'], $_POST['telefono'], $_POST['email'], $_POST['username'], $_POST['clave'], $_POST['cargo']);
                        ?>
                        <script type="text/javascript">
                            alert("Registrado exitosamente");
                            window.location.href='../index.php';
                        </script>
                    <?php
                    }
                    else {
                        ?>
                        <script type="text/javascript">
                            alert ('Las claves deben ser iguales, por favor intentalo de nuevo');
                            history.go(-1);
                        </script>
                    <?php
                    }
                }
            }
        }
    }
}
?>