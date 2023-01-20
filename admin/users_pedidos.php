<?php
include "../conexiones/conexion.php";
?>
<html>
    <head><title>Pedidos de usuarios</title></head>
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
            $sentencia2="SELECT * FROM usuarios";
            $resultado2= $conexion->query($sentencia2) or die (mysqli_error($conexion));
            while($fila2=$resultado2->fetch_assoc()) {
                if ($fila2['documento'] == $_GET['documento']){
                    $nombre = $fila2['nombre1']." ".$fila2['nombre2']." ".$fila2['apellido1']." ".$fila2['apellido2'];
                    $nombre = strtoupper($nombre);
        ?>
        </div>
        <div id="encabezado">
            <div class="subcateg_tittle">
                <table width='100%' align="center">
                    <tr>
                        <th><font size="5">PEDIDOS DE<font color="003e75"><?php echo " " . $nombre; }}?></font></font></th>
                    </tr>
                </table>
            </div>
        </div>
        <!--<a href="index.php"><div id="inicio_sesion">INICIO</div></a>-->
        <div id="principal">
            <!--<div id="espacio_superior"></div>-->
            <div id="espacio_superior_s"></div>
            <?php
            $sentencia1="SELECT * FROM pedidos";
            $resultado1= $conexion->query($sentencia1) or die (mysqli_error($conexion));
            while($fila1=$resultado1->fetch_assoc()) {
                $sentencia="SELECT * FROM servicios";
                $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
                while($fila=$resultado->fetch_assoc()) {
                    if ($fila1['user_doc']==$_GET['documento']) {
                        if ($fila1['servicio']==$fila['id_servicio']) {
                            echo "<div style='height: 200px;' class='service_box'>";
                            echo "<center><table id='contenido'>";
                            echo "<thead class='alto_lim'>";
                            echo "<th align='center' colspan='3'><a style='text-decoration: none;' href='../user/servicio.php?id_servicio=".$fila['id_servicio']."'><font size='4.5' color='0d1f47'>"; echo $fila['nombre_servicio']; echo "</font></a></th>";
                            echo "</thead>";
                            echo "<tr class='alto_lim'>";
                            echo "<td align='left'><font face='arial'><b>Empresa: </b>"; echo $fila['nombre_empresa']; echo "</font></td>";
                            echo "</tr>";
                            echo "<tr class='alto_lim'>";
                            echo "<td align='left' colspan='2'><b>Categoría: </b>"; echo $fila['categoria_serv']; echo "</font></td>";
                            echo "</tr>";
                            echo "<tr class='alto_lim'>";
                            echo "<td align='left'><font face='arial'><b>Cantidad: </b>"; echo $fila1['cantidad']; echo "</font></td>";
                            echo "</tr>";
                            echo "<tr class='alto_lim'>";
                            echo "<td align='left'><font face='arial'><b>Precio: US$ </b>"; echo $fila1['precio_unitario']; echo "</font></td>";
                            echo "</tr>";
                            echo "<tr class='alto_lim'>";
                            echo "<td align='left'><font face='arial'><b>Descuento: </b>"; echo $fila['descuento_aplicable']; echo "%</font></td>";
                            echo "</tr>";
                            echo "<tr class='alto_lim'>";
                            echo "<td align='left'><font face='arial'><b>Precio total: </b>"; echo $fila1['precio']; echo "</font></td>";
                            echo "</tr>";
                            echo "</table></center>";
                            echo "</div>";
                        }
                    }
                }
            }
            ?>
        </div>
    </body>
</html>