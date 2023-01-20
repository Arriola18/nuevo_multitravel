<?php
include "../conexiones/conexion.php";
?>
<html>
    <head><title>Servicio</title></head>
    <meta http-equiv="content-type" content="text/html; charset-a"/>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../estilo.css">
    <body>
        <?php
            include ('../includes/barra_izq.php');
            if (is_null($_SESSION['cargo'])) {
                ?>
                <script type="text/javascript">
                    window.location.href='../index.php';
                </script>
            <?php
            }
            include ('../includes/opciones_usuario.php')
        ?>
        </div>
        <?php
            include('../includes/encabezado.php');
        ?>
        <a href="index.php"><div id="inicio_sesion">INICIO</div></a>
        </div>
        <div id="principal">
            <?php
            $consulta=ConsultarProducto($_GET['id_servicio']);

            function ConsultarProducto($id_servicio)
            {
            include "../conexiones/conexion.php";
            $sentencia ="SELECT * FROM servicios WHERE id_servicio='".$id_servicio."'";
            $resultado= $conexion->query($sentencia) or die ("Error al consultar servicios".mysqli_error($conexion));
            $fila=$resultado->fetch_assoc();

            return [
            $fila['id_servicio'],
            $fila['nombre_servicio'],
            $fila['descripcion_servicio'],
            $fila['precio'],
            $fila['nombre_empresa'],
            $fila['fecha_limite'],
            $fila['imagen_serv'],
            $fila['categoria_serv'],
            $fila['descuento_aplicable'],
            $fila['subcategoria1'],
            $fila['subcategoria2'],
            $fila['subcategoria3'],
            ];
            }
            echo "<div class='service'>";
            echo "<center><table width='100%' id='service_big'>";
            echo "<thead class='alto_lim'>";
            echo "<th align='center' colspan='3'><font face='arial' size='5'>"; echo $consulta[1]; echo "</font></th>"; 
            echo "</thead>";
            echo "<tr class='alto_lim'>";
            echo "<td width='50%' align='center'><font face='arial' size='4.5'>Por: "; echo $consulta[4]; echo "</font></td>";
            echo "<td align='center' colspan='2'><font face='arial' size='4.5'>"; echo $consulta[7]; echo "</font></td>";
            echo "</tr>";
            echo "<tr class='alto_lim'>";
            echo "<td rowspan='2' align='center'><font face='arial' size='4.5'>Precio: US$ "; echo $consulta[3]; echo "</font></td>";
            echo "<td align='center'><font face='arial' size='4.5'>Descuento: "; echo $consulta[8]; echo "%</font></td>";
            echo "</tr>";
            echo "<tr class='alto_lim'>";
            echo "<td align='center'><font face='arial' size='4.5'>Expira: "; echo $consulta[5]; echo "</font></td>";
            echo "</tr>";
            echo "<tr class='alto_desc'>";
            echo "<td align='center'><font face='arial' size='4.5'>"; echo $consulta[2]; echo "</font></td>";
            echo "<td align='center' colspan='2'><font face='arial' size='4.5'>"; echo "<img class='img_servic' src='../multimedia/servicios/"; echo $consulta[6]; echo "'></font></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td align='left' colspan='2' align='center'><font face='arial' size='4.5'><pre>Filtros:<br>      ".$consulta[9]."<br>      ".$consulta[10]."<br>      ".$consulta[11]."</font></pre></font></td>";
            echo "</tr>";
            if ($_SESSION['cargo']>0) {
                echo "<tr>";
                echo "<td align='left' colspan='2' align='center'>
                <center><a href='carrito.php?id_servicio=".$consulta[0]."'><button type='button'>agregar</button></a></center>
                </td></tr></table>";
            }
            ?>
        </div>
    </body>
</html>