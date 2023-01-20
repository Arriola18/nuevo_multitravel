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
            
    <form action="serv_nuevo2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;" enctype="multipart/form-data">

<center><table align="center" width="90%" class="form_reg">
        <tr>
            <td align="center"><label>Nombre</label></td>
                <td align="center"><input type="text" id="nombre_servicio" name="nombre_servicio" ><pre>
                </pre></td>
        </tr>

        <tr>
            <td align="center"><label>Descripición</label></td>
                <td align="center"><textarea class="descrip" id="descripcion_servicio" name="descripcion_servicio"></textarea><pre>
                </pre></td>
        </tr>   

        <tr>
            <td align="center"><label>Precio<br>(En dolares)</label></td>
                <td align="center"><input type="number" id="precio" name="precio" ><pre>
                </pre></td>
        </tr>  

        <tr>
            <td align="center"><label>Empresa</label></td>
                <td align="center"><input type="text" id="nombre_empresa" name="nombre_empresa"><pre>
                </pre></td>
        </tr>   

        <tr>
            <td align="center"><label>Fecha disponibilidad</label></td>
                <td align="center"><input type="date" id="fecha_limite" name="fecha_limite"><pre>
                </pre></td>
        </tr>

        <tr>
            <td align="center"><label>Imagen</label></td>
            <td align="center"><input class='file_sel' type="file" id="imagen_inic" name="imagen_inic"><pre>
            </pre></td>
        </tr>

        <tr>
            <td align="center"><label>Categoría</label></td>
            <td align="center">
                <select type="text" id="categoria_serv" name="categoria_serv"><br>
                    <option name="1">Hotelería</option>
                    <option name="2">Vuelos</option>
                    <option name="3">Restaurantes</option>
                    <option name="4">Renta de vehículo</option>
                </select><pre>
            </pre>
            </td>
        </tr> 

        <tr>
            <td align="center"><label>Subcategorías</label></td>
            <td align="center">
                <select id='subcategoria1' name='subcategoria1'>
                    <option value=" "> </option>
                    <?php
                    $sentencia="SELECT * FROM  categorias";
                    $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
                    while($fila=$resultado->fetch_assoc()) {
                        echo "
                            <option value='"; echo $fila['nombre_categoria']; echo"'>"; echo $fila['nombre_categoria']; echo"</option>";
                    }
                    ?>
                </select>
                    <br>
                <select id='subcategoria2' name='subcategoria2'>
                    <option value=" "> </option>
                    <?php
                    $sentencia="SELECT * FROM  categorias";
                    $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
                    while($fila=$resultado->fetch_assoc()) {
                        echo "
                            <option value='"; echo $fila['nombre_categoria']; echo"'>"; echo $fila['nombre_categoria']; echo"</option>";
                    }
                    ?>
                </select>
                    <br>
                <select id='subcategoria3' name='subcategoria3'>
                    <option value=" "> </option>
                    <?php
                    $sentencia="SELECT * FROM  categorias";
                    $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
                    while($fila=$resultado->fetch_assoc()) {
                        echo "
                            <option value='"; echo $fila['nombre_categoria']; echo"'>"; echo $fila['nombre_categoria']; echo"</option>";
                    }
                    ?>
                </select>
                    <pre>
                    </pre>
            </td>
        </tr> 

        <tr>
            <td align="center"><label>Descuento<br>(Porcentaje)</label></td>
            <td align="center"><input type="number" id="descuento_aplicable" name="descuento_aplicable"><pre>
            </pre></td>
        </tr>


        <tr>
            <td align="center" colspan="2"><button type="submit" class="btn btn-success">Publicar</button></td>
        </tr>
</table></center>
 
        </div>
    </body>
</html>