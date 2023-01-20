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
            <div id="subcategad">
            <!--<div id="espacio_superior"></div>-->
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
            </div>
        </div>
    </body>
</html>

<!--
            <center><table align='center' class='subcategad'>
                <tr>
                        <td align='center'><label>"; echo $fila['id_categoria']; echo "</label></th>
                        <td align='center'><label>"; echo $fila['nombre_categoria']; echo "</label></th>
                </tr>
                <tr>
                        <td colspan='2' align='center'><label>"; echo $fila['categoria_p']; echo "</label></th>
                </tr>
            </table></center>";




                <td>
                    <a style='font-weight: normal; font-size: 14px;' onClick='abrirform()'>Agregar</a>
                </td>



            <center><table align='center' class='subcategad'>
                <tr>
                        <td align='center'><label>Nombre de la nueva subcategoría</label></th>
                        <td align='center'><input type='text' id='nombre_categoria' name='nombre_categoria' ><br></td>
                </tr>
                <tr>
                        <td align='center'><label>Categoria perteneciente</label></th>
                        <td align='center'>
                        <select type='text' id='categoria_p' name='categoria_p' ><br>
                            <option name='hoteleria'>Hotelería</option>
                            <option name='vuelos'>Vuelos</option>
                            <option name='restaurantes'>Restaurantes</option>
                            <option name='renta'>Renta de vehículo</option>
                        </select></td>
                </tr>
                <tr>
                    <td align='center' colspan='2'><button type='submit' class='btn btn-success'>Publicar</button></td>
                </tr>
            </table></center>
                                    <td align='center'><font face='arial'><a href='serv_modif1.php?id_categoria=".$fila['id_categoria']."'<button type='button' class='btn btn-success'>Modificar</button></font></a></td>
