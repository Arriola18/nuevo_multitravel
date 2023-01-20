<?php
include "../conexiones/conexion.php";
?>
<html>
    <head><title>Crear Servicio</title></head>
    <meta http-equiv="content-type" content="text/html; charset-a"/>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../estilo.css">
    <body>
        <?php
            include ('../includes/barra_izq.php');
            if ($_SESSION['cargo'] != 1) {
                ?>
                <script type="text/javascript">
                    window.location.href='../index.php';
                </script>
            <?php
            }
            include ('../includes/opciones_admin.php');
        ?>
        </div>
        <?php
            include('../includes/encabezado.php');
        ?>
        <a href="index.php"><div id="inicio_sesion">INICIO</div></a>
        </div>
        <div id="principal">
            <!--<div id="espacio_superior"></div>-->
        
            <form action="subcateg_crear2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
            <center><table align="center" width="90%" class="form_reg">
                <tr>
                        <td align="center"><label>Nombre de la nueva subcategoría</label></th>
                        <td align="center"><input type="text" id="nombre_categoria" name="nombre_categoria" ><br></td>
                </tr>
                <tr>
                        <td align="center"><label>Categoria perteneciente</label></th>
                        <td align="center">
                        <select type="text" id="categoria_p" name="categoria_p" ><br>
                            <option name="hoteleria">Hotelería</option>
                            <option name="vuelos">Vuelos</option>
                            <option name="restaurantes">Restaurantes</option>
                            <option name="renta">Renta de vehículo</option>
                        </select></td>
                </tr>
                <tr>
                    <td align="center" colspan="2"><button type="submit" class="btn btn-success">Publicar</button></td>
                </tr>
            </table></center>
            </form>
        </div>
    </body>
</html>