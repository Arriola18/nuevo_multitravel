<?php
include "../conexiones/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        <!-- Sweet Alert: alertas JavaScript presentables para el usuario (más bonitas que el alert) -->
        <link rel="stylesheet" href="css/sweetalert.css">

        <link rel="stylesheet" href="../estilo.css">
    </head>
    <body>
        <?php
            include('../includes/barra_izq.php');
            if($_SESSION['cargo']>0) {
                ?>
                <script type="text/javascript">
                    window.location.href='../user/index.php';
                </script>
            <?php
            }
          
        ?>
        </div>
        <?php
            include('../includes/encabezado.php');
        ?>
            <a href="registrar.php"><div id="inicio_sesion">Iniciar sesión</div></a>
        </div>
        <div id="principal">
            <div class="cabecera">
                <center><h1>Iniciar sesión</h1>
                <form method="post">
                    <?php include "controlar_login_ad.php";?>
                </center>
                    <table align="center" width="30%" class="form_reg">
                        <tr>
                            <td>Usuario</td>
                            <td>
                                <input type="text" name="user" size="25" maxlength="50" id="user" placeholder="Ingresa tu email">
                            </td>
                        </tr>
                        <tr>
                            <td>Contraseña</td>
                            <td>
                                <input type="password" autocomplete="off" id="clave" name="clave_admin" placeholder="Ingresa tu contraseña" size="25" maxlength="50">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="button" id="login" value="Iniciar sesion">
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" class="nobackground"></th>
                        </tr>
                    </table>
                </form>
            </div>
            <!-- SweetAlert js -->
            <script src="js/sweetalert.min.js"></script>
        </div>
    </body>
</html>