<?php
include "../conexiones/conexion.php";
?>
<html>
    <head><title>Administrar usuarios</title></head>
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
                echo "<center><table align='center' style='width: calc(100% - 42px);' class='subcategad' id='datasubc"; echo $fila['documento']; echo "'>
                    <tr>
                        <th width='4%' align='center'><label>TIPO DE DOCUMNETO</label></th>
                        <th width='7%' align='center'><label>NÚMERO DE DOCUMENTO</label></th>
                        <th width='14%' align='center'><label>NOMBRES Y APELLIDOS</label></td>
                        <th width='21%' COLSPAN='3' align='center'><label>LUGAR Y FECHA DE NACIMIENTO</label></th>
                        <th width='21%' COLSPAN='3' align='center'><label>LUGAR DE RESIDENCIA</label></th>
                        <th width='7%' align='center'><label>TELÉFONO</label></th>
                        <th width='14%' align='center'><label>EMAIL</label></th>
                        <th width='7%' align='center'><label>NOMBRE DE USUARIO</label></th>
                        <th align='center'><label>CARGO</label></th>
                        <th width='3%' align='center'><label></label></th>
                        <th align='center'></th>
                    </tr>";
                include "../conexiones/conexion.php";
                $sentencia="SELECT * FROM  usuarios";
                $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
                while($fila=$resultado->fetch_assoc()) {
                    echo 
                    "<tr>
                        <td align='left'><label>"; echo $fila['tipo_documento']; echo "</label></td>
                        <td align='left'><label>"; echo $fila['documento']; echo "</label></td>
                        <td align='left'><label>"; echo $fila['nombre1']." ".$fila['nombre2']." ".$fila['apellido1']." ".$fila['apellido2']; echo "</label></td>
                        <td align='left'><label>"; echo $fila['pais_na']; echo "</label></td>
                        <td align='left'><label>"; echo $fila['ciudad_na']; echo "</label></td>
                        <td align='left'><label>"; echo $fila['fecha_nacimiento']; echo "</label></td>
                        <td align='left'><label>"; echo $fila['pais_resi']; echo "</label></td>
                        <td align='left'><label>"; echo $fila['ciudad_resi']; echo "</label></td>
                        <td align='left'><label>"; echo $fila['direccion_resi']; echo "</label></td>
                        <td align='left'><label>"; echo $fila['telefono']; echo "</label></td>
                        <td align='left'><label>"; echo $fila['email']; echo "</label></td>
                        <td align='left'><label>"; echo $fila['user']; echo "</label></td>
                        <td align='left'><label>"; echo $fila['cargo']; echo "</label></td>
                        <td style='background: none;' align='center'><font face='arial'>
                            <a style='height: 100%; text-decoration: none;' href='users_pedidos.php?documento=".$fila['documento']."'<button type='button'><div style='height: 100%; width: 100%;' class='btn_btn-s'><div class='centrybtn'>Ver pedidos</div></div></button></a>
                        </font></td>
                        <td style='background: none;' align='center'><font face='arial'>
                            <a style='height: 100%; text-decoration: none;' href='users_eliminar.php?documento=".$fila['documento']."'<button type='button'><div style='height: 100%; width: 100%;' class='btn_btn-s'><div class='centrybtn'>Eliminar</div></div></button></a>
                        </font></td>
                    </tr>";
                }
                echo "</table></center>";
                ?>
            </div>
        </div>
    </body>
</html>

<!--
            <center><table align='center' class='subcategad'>
                <tr>
                        <td align='left'><label>"; echo $fila['id_categoria']; echo "</label></th>
                        <td align='left'><label>"; echo $fila['nombre_categoria']; echo "</label></th>
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
                        <td align='left'><label>Nombre de la nueva subcategoría</label></th>
                        <td align='left'><input type='text' id='nombre_categoria' name='nombre_categoria' ><br></td>
                </tr>
                <tr>
                        <td align='left'><label>Categoria perteneciente</label></th>
                        <td align='left'>
                        <select type='text' id='categoria_p' name='categoria_p' ><br>
                            <option name='hoteleria'>Hotelería</option>
                            <option name='vuelos'>Vuelos</option>
                            <option name='restaurantes'>Restaurantes</option>
                            <option name='renta'>Renta de vehículo</option>
                        </select></td>
                </tr>
                <tr>
                    <td align='left' colspan='2'><button type='submit' class='btn btn-success'>Publicar</button></td>
                </tr>
            </table></center>
                                    <td align='left'><font face='arial'><a href='serv_modif1.php?id_categoria=".$fila['id_categoria']."'<button type='button' class='btn btn-success'>Modificar</button></font></a></td>
