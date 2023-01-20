<?php
include "../conexiones/conexion.php";
?>
<html>
    <head><title>Administrar subcategorias</title></head>
    <meta http-equiv="content-type" content="text/html; charset-a"/>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../estilo.css">
    <body>
        <?php
            include ('../includes//barra_izq.php');
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
            <?php
            $consulta=ConsultarCategoria($_GET['id_categoria']);
            function ConsultarCategoria($id_categoria) {
            include "../conexiones/conexion.php";
            $sentencia ="SELECT * FROM categorias WHERE id_categoria='".$id_categoria."'";
            $resultado= $conexion->query($sentencia) or die ("Error al consultar categorias".mysqli_error($conexion));
            $fila=$resultado->fetch_assoc();

            return [
            $fila['id_categoria'],
            $fila['nombre_categoria'],
            $fila['categoria_p'],
            ];
            }
            ?>
            <form style="height: 0%;" action='subcateg_modif2.php' method='POST' enctype="multipart/form-data">
                <input type='hidden' name='id_categoria' value='<?php echo $_GET["id_categoria"]; ?>'>
                <center><table height='119px' style='display: table;' align='center' class='subcategmodif' id='modifsubc'>
                    <tr>
                            <td colspan="2" align='center'><label>Nombre de la subcategoría</label></th>
                            <td width="50%" align='center'><input type='text' id='nombre_categoria' name='nombre_categoria' value='<?php echo $consulta[1]; ?>'></td>
                    </tr>
                    <tr>
                            <td colspan="2" align='center'><label>Categoria perteneciente</label></th>
                            <td align='center'>
                            <select type='text' id='categoria_p' name='categoria_p'>
                                <optgroup>
                                    <option><?php echo $consulta[2]; ?></option>
                                </optgroup>
                                <option name='hoteleria'>Hotelería</option>
                                <option name='vuelos'>Vuelos</option>
                                <option name='restaurantes'>Restaurantes</option>
                                <option name='renta'>Renta de vehículo</option>
                            </select></td>
                    </tr>
                    <tr>
                        <th width='10%' align="center"><?php echo $consulta[0]; ?></th>
                        <td align='center'>
                            <font face='arial'><button type='submit' class='btn_btn-s'>Publicar</button></font>
                        </td>
                        <td align="center">
                            <font face='arial'><a href="subcateg_admin.php"><button type='button' class='btn_btn-s'>Cancelar</button></a></font>
                        </td>
                    </tr>
                </table></center>
                <?php
                include "../conexiones/conexion.php";
                $sentencia="SELECT * FROM  categorias";
                $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));

                while($fila=$resultado->fetch_assoc()) {
                    echo
                    "<center><table height='119px' align='center' class='subcategad' id='datasubc"; echo $fila['id_categoria']; echo "'>
                        <tr height='50%'>
                            <th width='10%' align='center'><label>"; echo $fila['id_categoria']; echo "</label></th>
                            <td align='center'><label>"; echo $fila['nombre_categoria']; echo "</label></td>
                            <td align='center'><font face='arial'>
                                <a href='subcateg_modif1.php?id_categoria=".$fila['id_categoria']."'<button type='button'><div class='btn_btn-s'><div class='centrybtn'>Modificar</div></div></button></a>
                            </font></td>
                        </tr>
                        <tr height='50%'>
                            <td width='50%' colspan='2' align='center'><label>"; echo $fila['categoria_p']; echo "</label></td>
                            <td align='center' colspan='2'><font face='arial'>
                                <a href='subcateg_eliminar.php?id_categoria=".$fila['id_categoria']."'<button type='button'><div class='btn_btn-s'><div class='centrybtn'>Eliminar</div></div></button></a>
                            </font></td>
                        </tr>
                    </table></center>";
                }
                ?>
            </form>
        </div>
    </body>
</html>