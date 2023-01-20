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
            if (($_SESSION['cargo'] == 0) or is_null($_SESSION['cargo'])) {
                ?>
                <script type="text/javascript">
                    window.location.href='../index.php';
                </script>
            <?php
            }
        ?>
        </div>
        <?php
            include('../includes/encabezado.php');
        ?>
        <div id="encabezado">
            <div class="subcateg_tittle">
                <table width='100%' align="center">
                    <tr>
                        <th><font size="5">MI PERFIL</font></th>
                    </tr>
                </table>
            </div>
        </div>
        <!--<a href="index.php"><div id="inicio_sesion">INICIO</div></a>-->
        <div id="principal">
            <!--<div id="espacio_superior"></div>-->
            <div id="espacio_superior_s"></div>
            <?php 
            $_POST['documento'] = $_SESSION['documento'];

            $consulta=ConsultarUsuario($_POST['documento']);

            function ConsultarUsuario($documento)
            {
            include "../conexiones/conexion.php";
            $sentencia ="SELECT * FROM usuarios WHERE documento='".$documento."'";
            $resultado= $conexion->query($sentencia) or die ("Error al consultar servicios".mysqli_error($conexion));
            $fila=$resultado->fetch_assoc();

            return [
            $fila['documento'],
            $fila['tipo_documento'],
            $fila['nombre1'],
            $fila['nombre2'],
            $fila['apellido1'],
            $fila['apellido2'],
            $fila['pais_na'],
            $fila['ciudad_na'],
            $fila['fecha_nacimiento'],
            $fila['pais_resi'],
            $fila['ciudad_resi'],
            $fila['direccion_resi'],
            $fila['telefono'],
            $fila['email'],
            $fila['user'],
            $fila['clave'],
            $fila['cargo'],
            ];
            }
            ?>
            <div class='perfil'>
                <center><table width='100%' border="0">
                    <tr>
                        <td height="30px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td>
                            <div style="float: left; width: 45%;"><b><font face='arial' size='2'>Número de documento:</font></b></div>
                            <div style="float: left;"><font face='arial' size='2'><?php echo $consulta[0] ?></font></div>
                        </td>
                        <td width="30px"></td>
                    </tr>
                    <tr>
                        <td height="10px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td>
                            <div style="float: left; width: 45%;"><b><font face='arial' size='2'>Tipo de documento:</font></b></div>
                            <div style="float: left;"><font face='arial' size='2'><?php echo $consulta[1] ?></font></div>
                        </td>
                        <td width="30px"></td>
                    </tr>
                    <tr>
                        <td height="10px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td>
                            <div style="float: left; width: 45%;"><b><font face='arial' size='2'>Primer nombre:</font></b></div>
                            <div style="float: left;"><font face='arial' size='2'><?php echo $consulta[2] ?></font></div>
                        </td>
                        <td width="30px"></td>
                    </tr>
                    <tr>
                        <td height="10px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td>
                            <div style="float: left; width: 45%;"><b><font face='arial' size='2'>Segundo nombre:</font></b></div>
                            <div style="float: left;"><font face='arial' size='2'><?php echo $consulta[3] ?></font></div>
                        </td>
                        <td width="30px"></td>
                    </tr>
                    <tr>
                        <td height="10px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td>
                            <div style="float: left; width: 45%;"><b><font face='arial' size='2'>Primer apellido:</font></b></div>
                            <div style="float: left;"><font face='arial' size='2'><?php echo $consulta[4] ?></font></div>
                        </td>
                        <td width="30px"></td>
                    </tr>
                    <tr>
                        <td height="10px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td>
                            <div style="float: left; width: 45%;"><b><font face='arial' size='2'>Segundo apellido:</font></b></div>
                            <div style="float: left;"><font face='arial' size='2'><?php echo $consulta[5] ?></font></div>
                        </td>
                        <td width="30px"></td>
                    </tr>
                    <tr>
                        <td height="10px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td>
                            <div style="float: left; width: 45%;"><b><font face='arial' size='2'>País de nacimiento:</font></b></div>
                            <div style="float: left;"><font face='arial' size='2'><?php echo $consulta[6] ?></font></div>
                        </td>
                        <td width="30px"></td>
                    </tr>
                    <tr>
                        <td height="10px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td>
                            <div style="float: left; width: 45%;"><b><font face='arial' size='2'>Ciudad de nacimiento:</font></b></div>
                            <div style="float: left;"><font face='arial' size='2'><?php echo $consulta[7] ?></font></div>
                        </td>
                        <td width="30px"></td>
                    </tr>
                    <tr>
                        <td height="10px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td>
                            <div style="float: left; width: 45%;"><b><font face='arial' size='2'>Fecha de nacimiento (año - mes - dia):</font></b></div>
                            <div style="float: left;"><font face='arial' size='2'><?php echo $consulta[8] ?></font></div>
                        </td>
                        <td width="30px"></td>
                    </tr>
                    <tr>
                        <td height="10px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td height="10px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td height="10px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td>
                            <div style="float: left; width: 45%;"><b><font face='arial' size='2'>País de residencia:</font></b></div>

                            <div id="perfil1" style="float: left; width: 55%;">
                                <font face='arial' size='2'><?php echo $consulta[9] ?></font>
                                <img onclick="modificarPerfil1()" style="cursor: pointer; height: 15px; float: right;" src="../multimedia/editar.png">
                            </div>
                            <div id="perfilmodif1" style="float: left; width: 55%;">
                                <form style="margin-bottom: 0px;" class="formmodifp" id="formmodifp1" method="post">
                                    <input style="display: none;" name="documento" value="<?php echo $_POST['documento'] ?>">
                                    <input style="display: none;" name="senten" value="1">
                                    <input name="pais_resi" type="text" value="<?php echo $consulta[9] ?>">
                                    <img onclick="enviar1()" style="cursor: pointer; height: 14px; float: right;" src="../multimedia/check.png">
                                    <img onclick="cancelar1()" style="cursor: pointer; height: 14px; float: right;" src="../multimedia/cancel_icon.png">
                                </form>
                            </div>

                        </td>
                        <td width="30px"></td>
                    </tr>
                    <tr>
                        <td height="10px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td>
                            <div style="float: left; width: 45%;"><b><font face='arial' size='2'>Ciudad de residencia:</font></b></div>

                            <div id="perfil2" style="float: left; width: 55%;">
                                <font face='arial' size='2'><?php echo $consulta[10] ?></font>
                                <img onclick="modificarPerfil2()" style="cursor: pointer; height: 15px; float: right;" src="../multimedia/editar.png">
                            </div>
                            <div id="perfilmodif2" style="float: left; width: 55%;">
                                <form style="margin-bottom: 0px;" class="formmodifp" id="formmodifp2" method="post">
                                    <input style="display: none;" name="documento" value="<?php echo $_POST['documento'] ?>">
                                    <input style="display: none;" name="senten" value="2">
                                    <input name="ciudad_resi" type="text" value="<?php echo $consulta[10] ?>">
                                    <img onclick="enviar2()" style="cursor: pointer; height: 14px; float: right;" src="../multimedia/check.png">
                                    <img onclick="cancelar2()" style="cursor: pointer; height: 14px; float: right;" src="../multimedia/cancel_icon.png">
                                </form>
                            </div>

                        </td>
                        <td width="30px"></td>
                    </tr>
                    <tr>
                        <td height="10px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td>
                            <div style="float: left; width: 45%;"><b><font face='arial' size='2'>Dirección de residencia:</font></b></div>

                            <div id="perfil3" style="float: left; width: 55%;">
                                <font face='arial' size='2'><?php echo $consulta[11] ?></font>
                                <img onclick="modificarPerfil3()" style="cursor: pointer; height: 15px; float: right;" src="../multimedia/editar.png">
                            </div>
                            <div id="perfilmodif3" style="float: left; width: 55%;">
                                <form style="margin-bottom: 0px;" class="formmodifp" id="formmodifp3" method="post">
                                    <input style="display: none;" name="documento" value="<?php echo $_POST['documento'] ?>">
                                    <input style="display: none;" name="senten" value="3">
                                    <input name="direccion_resi" type="text" value="<?php echo $consulta[11] ?>">
                                    <img onclick="enviar3()" style="cursor: pointer; height: 14px; float: right;" src="../multimedia/check.png">
                                    <img onclick="cancelar3()" style="cursor: pointer; height: 14px; float: right;" src="../multimedia/cancel_icon.png">
                                </form>
                            </div>

                        </td>
                        <td width="30px"></td>
                    </tr>
                    <tr>
                        <td height="10px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td>
                            <div style="float: left; width: 45%;"><b><font face='arial' size='2'>Número telefónico:</font></b></div>

                            <div id="perfil4" style="float: left; width: 55%;">
                                <font face='arial' size='2'><?php echo $consulta[12] ?></font>
                                <img onclick="modificarPerfil4()" style="cursor: pointer; height: 15px; float: right;" src="../multimedia/editar.png">
                            </div>
                            <div id="perfilmodif4" style="float: left; width: 55%;">
                                <form style="margin-bottom: 0px;" class="formmodifp" id="formmodifp4" method="post">
                                    <input style="display: none;" name="documento" value="<?php echo $_POST['documento'] ?>">
                                    <input style="display: none;" name="senten" value="4">
                                    <input name="telefono" type="number" value="<?php echo $consulta[12] ?>">
                                    <img onclick="enviar4()" style="cursor: pointer; height: 14px; float: right;" src="../multimedia/check.png">
                                    <img onclick="cancelar4()" style="cursor: pointer; height: 14px; float: right;" src="../multimedia/cancel_icon.png">
                                </form>
                            </div>

                        </td>
                        <td width="30px"></td>
                    </tr>
                    <tr>
                        <td height="10px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td>
                            <div style="float: left; width: 45%;"><b><font face='arial' size='2'>Correo electrónico:</font></b></div>

                            <div id="perfil5" style="float: left; width: 55%;">
                                <font face='arial' size='2'><?php echo $consulta[13] ?></font>
                                <img onclick="modificarPerfil5()" style="cursor: pointer; height: 15px; float: right;" src="../multimedia/editar.png">
                            </div>
                            <div id="perfilmodif5" style="float: left; width: 55%;">
                                <form style="margin-bottom: 0px;" class="formmodifp" id="formmodifp5" method="post">
                                    <input style="display: none;" name="documento" value="<?php echo $_POST['documento'] ?>">
                                    <input style="display: none;" name="senten" value="5">
                                    <?php echo $consulta[13] ?><br>
                                    <input style="float: left; width: calc(55% - 17.5px);" name="email1" type="text"><div style="float: left; width: 5%;">@</div>
                                    <input style="float: left; width: calc(40% - 17.5px);" name="email2" type="text">
                                    <img onclick="enviar5()" style="cursor: pointer; height: 14px; float: right;" src="../multimedia/check.png">
                                    <img onclick="cancelar5()" style="cursor: pointer; height: 14px; float: right;" src="../multimedia/cancel_icon.png">
                                </form>
                            </div>

                        </td>
                        <td width="30px"></td>
                    </tr>
                    <tr>
                        <td height="10px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td>
                            <div style="float: left; width: 45%;"><b><font face='arial' size='2'>Nombre de usuario:</font></b></div>

                            <div id="perfil6" style="float: left; width: 55%;">
                                <font face='arial' size='2'><?php echo $consulta[14] ?></font>
                                <img onclick="modificarPerfil6()" style="cursor: pointer; height: 15px; float: right;" src="../multimedia/editar.png">
                            </div>
                            <div id="perfilmodif6" style="float: left; width: 55%;">
                                <form style="margin-bottom: 0px;" class="formmodifp" id="formmodifp6" method="post">
                                    <input style="display: none;" name="documento" value="<?php echo $_POST['documento'] ?>">
                                    <input style="display: none;" name="senten" value="6">
                                    <input name="username" type="text" value="<?php echo $consulta[14] ?>">
                                    <img onclick="enviar6()" style="cursor: pointer; height: 14px; float: right;" src="../multimedia/check.png">
                                    <img onclick="cancelar6()" style="cursor: pointer; height: 14px; float: right;" src="../multimedia/cancel_icon.png">
                                </form>
                            </div>

                        </td>
                        <td width="30px"></td>
                    </tr>
                    <tr>
                        <td height="10px" colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td>
                            <div style="float: left; width: 45%;"><b><font face='arial' size='2'>Contraseña:</font></b></div>
                            <div id="perfil7" style="float: left; width: 55%;">
                                <div onclick="modificarPerfil7()" class="cambiar_contra" style="cursor: pointer; height: 18px;">
                                    <div style="float: left; width: 100%;"><center><font face='arial' size='2'>Cambiar contraseña</font></center></div>
                                </div>
                            </div>
                            <div id="perfilmodif7" style="float: left; width: 55%;">
                                <form style="margin-bottom: 0px;" class="formmodifp" id="formmodifp7" method="post">
                                    <input style="display: none;" name="documento" value="<?php echo $_POST['documento'] ?>">
                                    <input style="display: none;" name="senten" value="7">
                                    <input name="clave_actual" type="password" placeholder="Ingrese su contraseña actual"><p>
                                    <input name="clave" type="password" placeholder="Ingrese su nueva contraseña">
                                    <input name="clave2" type="password" placeholder="Ingrese otra vez su nueva contraseña">
                                    <img onclick="enviar7()" style="cursor: pointer; height: 14px; float: right;" src="../multimedia/check.png">
                                    <img onclick="cancelar7()" style="cursor: pointer; height: 14px; float: right;" src="../multimedia/cancel_icon.png">
                                </form>
                            </div>
                        </td>
                        <td width="30px"></td>
                    </tr>
                        <td width="30px"></td>
                        <td height="10px">
                            <div style="float: left; width: 100%; text-align: center;">

                            </div>
                        </td>
                        <td width="30px"></td>
                    <tr>
                        <td height="30px" colspan="3"></td>
                    </tr>
                </table></center>

                <div id="operaciones_modif">
                    <?php
                    if ($_POST['senten'] == "1") {
                        echo $sentencia1 = "UPDATE usuarios SET pais_resi='".$_POST['pais_resi']."' WHERE documento='".$_POST['documento']."'";
                        $conexion->query($sentencia1) or die ("error al actualizar los datos".mysqli_error($conexion));
                        ?>
                        <script type="text/javascript">
                            window.location.href='perfil.php';                            
                        </script>
                        <?php
                    }
                    else {
                        if ($_POST['senten'] == "2") {
                            echo $sentencia2 = "UPDATE usuarios SET ciudad_resi='".$_POST['ciudad_resi']."' WHERE documento='".$_POST['documento']."'";
                            $conexion->query($sentencia2) or die ("error al actualizar los datos".mysqli_error($conexion));
                            ?>
                            <script type="text/javascript">
                                window.location.href='perfil.php';
                            </script>
                            <?php
                        }
                        else {
                            if ($_POST['senten'] == "3") {
                                echo $sentencia3 = "UPDATE usuarios SET direccion_resi='".$_POST['direccion_resi']."' WHERE documento='".$_POST['documento']."'";
                                $conexion->query($sentencia3) or die ("error al actualizar los datos".mysqli_error($conexion));
                                ?>
                                <script type="text/javascript">
                                    window.location.href='perfil.php';
                                </script>
                                <?php
                            }
                            else {
                                if ($_POST['senten'] == "4") {
                                    echo $sentencia4 = "UPDATE usuarios SET telefono='".$_POST['telefono']."' WHERE documento='".$_POST['documento']."'";
                                    $conexion->query($sentencia4) or die ("error al actualizar los datos".mysqli_error($conexion));
                                    ?>
                                    <script type="text/javascript">
                                        window.location.href='perfil.php';
                                    </script>
                                    <?php
                                }
                                else {
                                    if ($_POST['senten'] == "5") {
                                        $emaildef = $_POST['email1']."@".$_POST['email2'];

                                        $sentencia_rept5="SELECT * FROM usuarios WHERE email='".$emaildef."'";
                                        $resultado_rept5= mysqli_query($conexion,$sentencia_rept5);
                                        if (empty($_POST['email1']) or empty($_POST['email2'])) {
                                            ?>
                                            <script type="text/javascript">
                                                alert('Faltan datos por llenar');
                                            </script>
                                            <?php
                                        }
                                        else {
                                            if (mysqli_num_rows($resultado_rept5) > 0) {
                                                ?>
                                                <script type="text/javascript">
                                                    alert('Ya hay un usuario registrado con este correo. Por favor ingrese uno distinto');
                                                </script>
                                                <?php
                                            }
                                            else {
                                                echo $sentencia5 = "UPDATE usuarios SET email='".$emaildef."' WHERE documento='".$_POST['documento']."'";
                                                $conexion->query($sentencia5) or die ("error al actualizar los datos".mysqli_error($conexion));
                                                ?>
                                                <script type="text/javascript">
                                                    window.location.href='perfil.php';
                                                </script>
                                                <?php
                                            }
                                        }
                                    }
                                    else {
                                        if ($_POST['senten'] == "6") {
                                            $sentencia_rept6="SELECT * FROM usuarios WHERE user='".$_POST['username']."'";
                                            $resultado_rept6= mysqli_query($conexion,$sentencia_rept6);
                    
                                            if (mysqli_num_rows($resultado_rept6) > 0) {
                                                ?>
                                                <script type="text/javascript">
                                                    alert('Ya hay un usuario registrado con este nombre de usuario. Por favor ingrese uno distinto');
                                                </script>
                                                <?php
                                            }
                                            else {
                                                echo $sentencia6 = "UPDATE usuarios SET user='".$_POST['username']."' WHERE documento='".$_POST['documento']."'";
                                                $conexion->query($sentencia6) or die ("error al actualizar los datos".mysqli_error($conexion));
                                                ?>
                                                <script type="text/javascript">
                                                    window.location.href='perfil.php';
                                                </script>
                                                <?php
                                            }
                                        }
                                        else {
                                            if ($_POST['senten'] == "7") {
                                                ?>
                                                <script type="text/javascript">
                                                   history.go(1);
                                                </script>
                                                <?php
                                                if (empty($_POST['clave_actual']) or empty($_POST['clave']) or empty($_POST['clave2'])) {
                                                    ?>
                                                    <script type="text/javascript">
                                                        alert('Faltan datos por llenar');
                                                    </script>
                                                    <?php
                                                }
                                                else {
                                                    if (MD5($_POST['clave_actual']) == $_SESSION['clave']) {
                                                        if ($_POST['clave'] == $_POST['clave2']) {
                                                            echo $sentencia7 = "UPDATE usuarios SET clave='".MD5($_POST['clave'])."' WHERE documento='".$_POST['documento']."'";
                                                            $conexion->query($sentencia7) or die ("error al actualizar los datos".mysqli_error($conexion));
                                                            ?>
                                                            <script type="text/javascript">
                                                                alert('Clave actualizada con exito');
                                                                window.location.href='perfil.php';
                                                            </script>
                                                            <?php
                                                        }
                                                        else {
                                                            ?>
                                                            <script type="text/javascript">
                                                                alert('La clave del último campo debe ser la misma que su nueva clave');
                                                            </script>
                                                            <?php
                                                        }
                                                    }
                                                    else {
                                                        ?>
                                                        <script type="text/javascript">
                                                            alert("La clave que ingresó no es su clave actual");
                                                        </script>
                                                        <?php
                                                    }
                                                }
                                            }
                                            else {

                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    $sql= $conexion->query("SELECT * FROM usuarios WHERE email='".$_SESSION['email']."'");
                    if ($datos=$sql->fetch_object()) {
            
                    $_SESSION['documento'] = $datos->documento;
                    $_SESSION['tipo_documento'] = $datos->tipo_documento;
                    $_SESSION['nombre1'] = $datos->nombre1;
                    $_SESSION['nombre2'] = $datos->nombre2;
                    $_SESSION['apellido1'] = $datos->apellido1;
                    $_SESSION['apellido2'] = $datos->apellido2;
                    $_SESSION['pais_na'] = $datos->pais_na;
                    $_SESSION['ciudad_na'] = $datos->ciudad_na;
                    $_SESSION['fecha_nacimiento'] = $datos->fecha_nacimiento;
                    $_SESSION['pais_resi'] = $datos->pais_resi;
                    $_SESSION['ciudad_resi'] = $datos->ciudad_resi;
                    $_SESSION['direccion_resi'] = $datos->direccion_resi;
                    $_SESSION['telefono'] = $datos->telefono;
                    $_SESSION['email'] = $datos->email;
                    $_SESSION['username'] = $datos->user;
                    $_SESSION['clave'] = $datos->clave;
                    $_SESSION['cargo'] = $datos->cargo;
                    }
                    ?>
                </div>

                <script type="text/javascript">
                    document.getElementById("perfilmodif1").style.display = "none";
                    document.getElementById("perfilmodif2").style.display = "none";
                    document.getElementById("perfilmodif3").style.display = "none";
                    document.getElementById("perfilmodif4").style.display = "none";
                    document.getElementById("perfilmodif5").style.display = "none";
                    document.getElementById("perfilmodif6").style.display = "none";
                    document.getElementById("perfilmodif7").style.display = "none";

                    document.getElementById("perfil1").style.display = "block";
                    document.getElementById("perfil2").style.display = "block";
                    document.getElementById("perfil3").style.display = "block";
                    document.getElementById("perfil4").style.display = "block";
                    document.getElementById("perfil5").style.display = "block";
                    document.getElementById("perfil6").style.display = "block";
                    document.getElementById("perfil7").style.display = "block";
                    
                    document.getElementById("operaciones_modif").style.display = "none";

                    function modificarPerfil1() {
                        document.getElementById("perfil1").style.display = "none";
                        document.getElementById("perfilmodif1").style.display = "block";
                    }
                    function modificarPerfil2() {
                        document.getElementById("perfil2").style.display = "none";
                        document.getElementById("perfilmodif2").style.display = "block";
                    }
                    function modificarPerfil3() {
                        document.getElementById("perfil3").style.display = "none";
                        document.getElementById("perfilmodif3").style.display = "block";
                    }
                    function modificarPerfil4() {
                        document.getElementById("perfil4").style.display = "none";
                        document.getElementById("perfilmodif4").style.display = "block";
                    }
                    function modificarPerfil5() {
                        document.getElementById("perfil5").style.display = "none";
                        document.getElementById("perfilmodif5").style.display = "block";
                    }
                    function modificarPerfil6() {
                        document.getElementById("perfil6").style.display = "none";
                        document.getElementById("perfilmodif6").style.display = "block";
                    }
                    function modificarPerfil7() {
                        document.getElementById("perfil7").style.display = "none";
                        document.getElementById("perfilmodif7").style.display = "block";
                    }

                    function enviar1() {
                        document.getElementById("formmodifp1").submit();
                        document.getElementById("operaciones_modif1").style.display= "block";
                    }
                    function enviar2() {
                        document.getElementById("formmodifp2").submit();
                        document.getElementById("operaciones_modif2").style.display= "block";
                    }
                    function enviar3() {
                        document.getElementById("formmodifp3").submit();
                        document.getElementById("operaciones_modif3").style.display= "block";
                    }
                    function enviar4() {
                        document.getElementById("formmodifp4").submit();
                        document.getElementById("operaciones_modif4").style.display= "block";
                    }
                    function enviar5() {
                        document.getElementById("formmodifp5").submit();
                        document.getElementById("operaciones_modif5").style.display= "block";
                    }
                    function enviar6() {
                        document.getElementById("formmodifp6").submit();
                        document.getElementById("operaciones_modif6").style.display= "block";
                    }
                    function enviar7() {
                        document.getElementById("formmodifp7").submit();
                        document.getElementById("operaciones_modif7").style.display= "block";
                    }

                    function cancelar1() {
                        document.getElementById("perfil1").style.display = "block";
                        document.getElementById("perfilmodif1").style.display = "none";
                    }
                    function cancelar2() {
                        document.getElementById("perfil2").style.display = "block";
                        document.getElementById("perfilmodif2").style.display = "none";
                    }
                    function cancelar3() {
                        document.getElementById("perfil3").style.display = "block";
                        document.getElementById("perfilmodif3").style.display = "none";
                    }
                    function cancelar4() {
                        document.getElementById("perfil4").style.display = "block";
                        document.getElementById("perfilmodif4").style.display = "none";
                    }
                    function cancelar5() {
                        document.getElementById("perfil5").style.display = "block";
                        document.getElementById("perfilmodif5").style.display = "none";
                    }
                    function cancelar6() {
                        document.getElementById("perfil6").style.display = "block";
                        document.getElementById("perfilmodif6").style.display = "none";
                    }
                    function cancelar7() {
                        document.getElementById("perfil7").style.display = "block";
                        document.getElementById("perfilmodif7").style.display = "none";
                    }
                </script>
            </div>
        </div>
    </body>
</html>