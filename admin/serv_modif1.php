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
            include ('../includes/barra_izq.php');
            if ($_SESSION['cargo'] != 1) {
                ?>
                <script type="text/javascript">
                    window.location.href='../index.php';
                </script>
            <?php
            }
            include ('../includes/opciones_admin.php')
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
?>
            <!--<div id="espacio_superior"></div>-->
            
    <form action="serv_modif2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;" enctype="multipart/form-data">

<center><table align="center" width="90%" class="form_reg">
        <input type="hidden" name="id_servicio" value='<?php echo $_GET["id_servicio"]?>'><pre>
        </pre>
        <tr>
            <td align="center"><label>Nombre</label></th>
                <td align="center"><input type="text" id="nombre_servicio" name="nombre_servicio" value="<?php echo $consulta[1] ?>"><pre>
                </pre></td>
        </tr>

        <tr>
            <td align="center"><label>Descripición</label></th>
                <td align="center"><textarea class="descrip" id="descripcion_servicio" name="descripcion_servicio" ><?php echo $consulta[2] ?></textarea><pre>
                </pre></td>
        </tr>   

        <tr>
            <td align="center"><label>Precio<br>(En dolares)</label></th>
                <td align="center"><input type="number" id="precio" name="precio" value="<?php echo $consulta[3] ?>"><pre>
                </pre></td>
        </tr>  

        <tr>
            <td align="center"><label>Empresa</label></th>
                <td align="center"><input type="text" id="nombre_empresa" name="nombre_empresa" value="<?php echo $consulta[4] ?>"><pre>
                </pre></td>
        </tr>   

        <tr>
            <td align="center"><label>Fecha disponibilidad</label></th>
                <td align="center"><input type="date" id="fecha_limite" name="fecha_limite" value="<?php echo $consulta[5] ?>"><pre>
                </pre></td>
        </tr>

        <tr>
            <td rowspan="2" align="center"><label>Imagen</label></th>
                <td align="center"><input class="file_sel" type="file" onclick="OcultarImg()" onchange="" id="imagen_inic_modif" name="imagen_inic_modif" value="../multimedia/servicios<?php echo $consulta[6] ?>"></td>
        </tr>
        <tr>
            <script>
                function OcultarImg() {
                    document.getElementById("img_old").style.display = "none";
                }
            </script>
            <td><center><div class='img_form' id="img_old"><div id="img_old" class='img_view_f'>
                <?php
                echo "<img id='img_old' width='100%' id='img_origiral' src='../multimedia/servicios/"; echo $consulta[6]; echo"'><br><b>Imagen Previa</b>";
                ?>
            </div></div></center><pre>
            </pre></td>
        </tr>

        <tr>
            <td align="center"><label>Categoría</label></th>
            <td align="center">
                        <select type="text" id="categoria_serv" name="categoria_serv">
                            <optgroup label="Elegida actualmente:">
                                <option><?php echo $consulta[7] ?></option>
                            </optgroup>
                            <option name="1">Hotelería</option>
                            <option name="2">Vuelos</option>
                            <option name="3">Restaurantes</option>
                            <option name="4">Renta de vehículo</option>
                        </select><pre>
                </pre>
                </td>
        </tr>

        <tr>
            <td align="center">
                Subcategorías
            </td>
            <td align="center">
                <select id='subcategoria1' name='subcategoria1'>
                    <option><?php echo $consulta[9] ?></option>
                    <optgroup label="Elegido actualmente:">
                        <option><?php echo $consulta[9] ?></option>
                    </optgroup>
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
                    <optgroup label="Elegido actualmente:">
                        <option><?php echo $consulta[10] ?></option>
                    </optgroup>
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
                    <optgroup label="Elegido actualmente:">
                        <option><?php echo $consulta[11] ?></option>
                    </optgroup>
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
            <td align="center"><label>Descuento<br>(Porcentaje)</label></th>
                <td align="center"><input type="number" id="descuento_aplicable" name="descuento_aplicable" value="<?php echo $consulta[8] ?>"><pre>
                </pre></td>
        </tr>
        <tr>
            <td align="center" colspan="2"><button type="submit" class="btn btn-success">Modificar</button></td>
        </tr>
        </table></center>
        </form>
 </div>
</body>
</html>




