<?php
include "../conexiones/conexion.php";
?>
<html>
    <head><title>Inicio</title></head>
    <meta http-equiv="content-type" content="text/html; charset-a"/>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../estilo.css">
    <body>
        <?php
            include ('../includes//barra_izq.php');
            if ($_SESSION['cargo'] == 2 or $_SESSION['cargo'] == 0) {
                ?>
                <script type="text/javascript">
                    window.location.href='../index.php';
                </script>
            <?php
            }
            include ('../includes/opciones_empresa.php');
        ?>
        </div>
        <?php
            include('../includes/encabezado.php');
        ?>
        <div id="encabezado">
            <div class="subcateg_tittle">
                <table width='100%' align="center">
                    <tr>
                        <th><font size="5">busqueda</font></th>
                    </tr>
                </table>
            </div>
        </div>
        <!--<a href="index.php"><div id="inicio_sesion">INICIO</div></a>-->
        <div id="principal">
            <!--<div id="espacio_superior"></div>-->
            <div id="espacio_superior_s"></div>

            <?php
            if(isset($_POST['btnbuscar'])) {
                $buscar = $_POST['txtbuscar'];
                $queryservicios = mysqli_query($conexion, "SELECT * FROM servicios WHERE nombre_servicio LIKE'" . $buscar . "%'");
            }
            else {
                $queryservicios = mysqli_query($conexion, "SELECT * FROM servicios ORDER BY id_servicio asc");
            ?>
            <?php
            }
            while ($fila = mysqli_fetch_array($queryservicios)) {
                echo "<div class='service_box'>";
                echo "<center><table id='contenido'>";
                echo "<thead class='alto_lim'>";
                echo "<th align='center' colspan='3'><a style='text-decoration: none;' href='../user/servicio.php?id_servicio=".$fila['id_servicio']."'><font size='4.5' color='0d1f47'>"; echo $fila['nombre_servicio']; echo "</font></a></th>";
                echo "</thead>";
                echo "<tr class='alto_lim'>";
                echo "<td width='50%' align='center'><font face='arial'>Por: "; echo $fila['nombre_empresa']; echo "</font></td>";
                echo "<td align='center' colspan='2'>"; echo $fila['categoria_serv']; echo "</font></td>";
                echo "</tr>";
                echo "<tr class='alto_lim'>";
                echo "<td rowspan='2' align='center'><font face='arial'>Precio: US$ "; echo $fila['precio']; echo "</font></td>";
                echo "<td align='center'><font face='arial'>Descuento: "; echo $fila['descuento_aplicable']; echo "%</font></td>";
                echo "</tr>";
                echo "<tr class='alto_lim'>";
                echo "<td align='center'><font face='arial'>Expira: "; echo $fila['fecha_limite']; echo "</font></td>";
                echo "</tr>";
                echo "<tr class='alto_desc'>";
                echo "<td align='center'><div class='overflow'><font face='arial'>"; echo $fila['descripcion_servicio']; echo "</font></div></td>";
                echo "<td align='center' colspan='2'><div class='overflow'><font face='arial'>"; echo "<img class='img_serv' src='../multimedia/servicios/"; echo $fila['imagen_serv']; echo "'></font></div></td>";
                echo "</tr>";
                if ($fila['nombre_empresa']==$_SESSION['username']) {
                    echo "<tr class='alto_lim'>";
                    echo "<td align='center' colspan='3'><font face='arial'>"; echo "Id servicio: ".$fila['id_servicio']; echo "</font></td>";
                    echo "</tr>";
                    echo "<tr class='alto_lim'>";
                    echo "<td align='center'><font face='arial'><a href='serv_modif1.php?id_servicio=".$fila['id_servicio']."'<button type='button' class='btn btn-success'>Modificar</button></font></a></td>";
                    echo "<td align='center' colspan='2'><font face='arial'><a href='serv_eliminar.php?id_servicio=".$fila['id_servicio']."'<button type='button' class='btn btn-danger'>Eliminar</button></font></a></td>";
                    echo "</tr>";
                }
                echo "</table></center>";
                echo "</div>";
            }
            ?>
        </div>
    </body>
</html>