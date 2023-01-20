<?php
include('../conexiones/conexion.php');

$nom_cat=$_POST['subcbarizq'];

if ($nom_cat=="../user/ct_hoteleria.php") {
    ?>
    <script type="text/javascript">
    window.location.href='../user/ct_hoteleria.php';
    </script>
    <?php
}
else {
    if ($nom_cat=="../user/ct_vuelos.php") {
        ?>
        <script type="text/javascript">
        window.location.href='../user/ct_vuelos.php';
        </script>
        <?php
    }
    else {
        if ($nom_cat=="../user/ct_restaurantes.php") {
            ?>
            <script type="text/javascript">
            window.location.href='../user/ct_restaurantes.php';
            </script>
            <?php
        }
        else {
            if ($nom_cat=="../user/ct_rent_vehi.php") {
                ?>
                <script type="text/javascript">
                window.location.href='../user/ct_rent_vehi.php';
                </script>
                <?php
            }
            else {
?>
<html>
    <head><title>Subcategoria</title></head>
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
        </div>
        <?php
            include('../includes/subcateg/encabezado.php');
        ?>
        <!--<a href="index.php"><div id="inicio_sesion">INICIO</div></a>-->
        <div id="principal">
            <!--<div id="espacio_superior"></div>-->
            <div id="espacio_superior_s"></div>
            <?php
            $sentencia="SELECT * FROM servicios";
            $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
            while($fila=$resultado->fetch_assoc()) {
                if (($fila['subcategoria1'] == $nom_cat) or ($fila['subcategoria2'] == $nom_cat) or ($fila['subcategoria3'] == $nom_cat)) {
                    if ($fila['categoria_serv'] == $_POST['p_categ']) {
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
                        echo "</table></center>";
                        echo "</div>";
                    }
                    else {
                        
                    }
                }
                else {
                    
                }
            }
            ?>
<?php    
            }
        }
    }
}
?>
        </div>
    </body>
</html>