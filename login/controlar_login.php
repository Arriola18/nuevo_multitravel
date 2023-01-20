<?php
include "../conexiones/conexion.php";
if (!empty($_POST['button'])) {
    if (empty($_POST['user']) or empty($_POST['clave'])) {
        echo "<div style='vertical-align: middle; height: 40px; width: calc(30% - 8px); border: 4px solid #570000; border-radius: 10px; background-color: #d42929; color: #fff; align-content: center; font-size: 25px;'>Faltan datos por ingresar</div><p>";
    }
    else {
        include "../conexiones/conexion.php";
        $user=$_POST['user'];
        $clave=$_POST['clave'];
        $sql= $conexion->query("SELECT * FROM usuarios WHERE email='".$user."' AND clave='".MD5($clave)."'");
        if ($datos=$sql->fetch_object()) {
            
            $_SESSION['documento'] = $datos->documento;
            $_SESSION['tipo_documento'] = $datos->tipo_documento;
            $_SESSION['nombre1'] = $datos->nombre1;
            $_SESSION['nombre2'] = $datos->nombre2;
            $_SESSION['apellido1'] = $datos->apellido1;
            $_SESSION['apellido2'] = $datos->apellido2;
            $_SESSION['pais_na'] = $datos->pais_na;
            $_SESSION['ciudad_na'] = $datos->ciudad_na;
            $_SESSION['fecha_nacimiento'] = $datos->fecha_nacimiento;
            $_SESSION['pais_resi'] = $datos->pais_resi;
            $_SESSION['ciudad_resi'] = $datos->ciudad_resi;
            $_SESSION['direccion_resi'] = $datos->direccion_resi;
            $_SESSION['telefono'] = $datos->telefono;
            $_SESSION['email'] = $datos->email;
            $_SESSION['username'] = $datos->user;
            $_SESSION['clave'] = $datos->clave;
            $_SESSION['cargo'] = $datos->cargo;

            $documento = $_SESSION['documento'];
            $tipo_documento = $_SESSION['tipo_documento'];
            $nombre1 = $_SESSION['nombre1'];
            $nombre2 = $_SESSION['nombre2'];
            $apellido1 = $_SESSION['apellido1'];
            $apellido2 = $_SESSION['apellido2'];
            $pais_na = $_SESSION['pais_na'];
            $ciudad_na = $_SESSION['ciudad_na'];
            $fecha_nacimiento = $_SESSION['fecha_nacimiento'];
            $pais_resi = $_SESSION['pais_resi'];
            $ciudad_resi = $_SESSION['ciudad_resi'];
            $direccion_resi = $_SESSION['direccion_resi'];
            $telefono = $_SESSION['telefono'];
            $email = $_SESSION['email'];
            $username = $_SESSION['username'];
            $clave = $_SESSION['clave'];
            $cargo = $_SESSION['cargo'];
            
            echo "<div style='vertical-align: middle; height: 40px; width: calc(30% - 8px); border: 4px solid #570000; border-radius: 10px; background-color: #fff; color: #000; align-content: center; font-size: 25px;'>Bienvenido ".$nombre1."</div><p>";

            $a = 0;
            while ($a < 300000000) {
                $a++;
            }

            if($cargo == 1){
                ?>
                <script type="text/javascript">
                    window.location.href='../admin/';
                </script>
            <?php
            }
            else {
                if($cargo == 2){
                    ?>
                    <script type="text/javascript">
                        window.location.href='../user/';
                    </script>
                <?php
                }
                else {
                    if($cargo == 3){
                        ?>
                        <script type="text/javascript">
                            window.location.href='../empresa/';
                        </script>
                    <?php
                    }
                }
            }
                
        }
        else {
            echo "<div style='vertical-align: middle; height: 40px; width: calc(30% - 8px); border: 4px solid #570000; border-radius: 10px; background-color: #d42929; color: #fff; align-content: center; font-size: 25px;'>Acceso denegado</div><p>";
        }
    }
}
?>