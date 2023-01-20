<div id="barra_izquierda">
    <?php
    include "../conexiones/conexion.php";
    session_start();
    ?>
    <div id="logo-contorno">
        <div class="crear1">
            <img width="100%" src="../multimedia/logo.png">
        </div>
    </div>
    <table style="margin-bottom: 10px;" border="0" width="100%" >
        <tr>
            <td width="15%"></td>

            <td width="10%">
                <div style="border-radius: 3px; margin-top: -10px;" id="icono_1"><a href="../admin/index.php"><img style="width: 100%;" src="../multimedia/admin.png"></a></div>
            </td>

            <td></td>

            <td width="10%">
                <div style="border-radius: 3px; margin-top: -10px;" id="icono_2"><a href="../user/index.php"><img style="width: 100%;" src="../multimedia/home_icon.png"></a></div>
            </td>

            <td></td>

            <td width="10%">
                <div style="border-radius: 3px; margin-top: -10px;" id="icono_3"><a href="../empresa/index.php"><img style="width: 100%;" src="../multimedia/empresa.png"></a></div>
            </td>

            <td width="15%"></td>
        </tr>
    </table>

    <?php
    if ($_SESSION['cargo']==2 or $_SESSION['cargo']==0) {
        ?>
        <script type="text/javascript">
            document.getElementById("icono_1").style.display = "none";
            document.getElementById("icono_3").style.display = "none";
        </script>
    <?php
    }
    else {
        if ($_SESSION['cargo']==3) {
            ?>
            <script type="text/javascript">
                document.getElementById("icono_1").style.display = "none";
            </script>
        <?php
        }
        else {
            if ($_SESSION['cargo']!=1) {
                ?>
                <script type="text/javascript">
                    document.getElementById("icono_1").style.display = "none";
                </script>
            <?php
            }
            else {
                
            }
        }
    }
    ?>

<!--Usuario-->
    <div id="opened_session">
        <center><table border="0" style="width: calc(100% - 20px); margin-bottom: 25px;">
            <tr>
                <td width="70px" rowspan="2">
                    <img width="70px" src="../multimedia/user_icon.png">
                </td>
                <td width="8px"> </td>
                <td>
                    <b><font size="2.7" face="verdana"><?php echo $_SESSION['username']; ?></font></b>
                    <br>
                    <font size="1.9" face="verdana"><?php echo $_SESSION['nombre1']." ".$_SESSION['nombre2']." ".$_SESSION['apellido1']." ".$_SESSION['apellido2']; ?></font>
                </td>
            </tr>
            <tr>
                <td width="8px"> </td>
                <td>
                    <font size="2"><a style="cursor:pointer;" onclick="EnviarAPerfil()">Mi perfil</a></font><br>
                    <font size="2"><a href="../login/close_session.php">Cerrar Sesión</a></font>
                </td>
            </tr>
        </table></center>
        <form id="ver_perfil" method="post" action="../user/perfil.php">
            <input name="documento" type="text" style="display: none;" value="<?php echo $_SESSION['documento']; ?>">
        </form>
        <script type="text/javascript">
            function EnviarAPerfil(){
                document.getElementById("ver_perfil").submit();
            }
        </script>
    </div>

    <div id="closed_session"><a href="../login/index.php"><div id="ini">Iniciar Sesión</div></a></div>
    <?php
        if ($_SESSION['cargo']==0) {
            ?>
            <script type="text/javascript">
                document.getElementById("opened_session").style.display = "none";
                document.getElementById("closed_session").style.display = "block";
            </script>
        <?php
        }
        else {
        ?>
            <script type="text/javascript">
                document.getElementById("opened_session").style.display = "block";
                document.getElementById("closed_session").style.display = "none";
            </script>
        <?php
        }
        ?>
<!--Fin usuario-->

<!--Busqueda-->
        <script type="text/javascript">
            function SearchSubmit() {
                document.getElementById("search_form").submit();
            }
        </script>

    <form style="width: 100%;" method="POST" id="search_form" action="buscar.php"><table class="search_form">
        <tr>
            <td style="width: calc(100% - 22px);">
                <div width="100%">
                    <input type="text" name="txtbuscar" id="cajabuscar" placeholder="Ingresar el nombre del servicio">
                </div>
            </td>
            <td width="22px">
                <input name="btnbuscar" style="display: none;">
                <button name="btnbuscar" style="display: none;"></button>
                <a onclick="SearchSubmit()"><img src="../multimedia/lupa11.png" height="22px"></a>
            </td>
        </tr>
    </table></form>
<!--Fin busqueda-->

    <div id="menu_categorias">
        <script type="text/javascript">
            function Submit1(){
                document.getElementById("form_subc_1").submit();
            }
        </script>
        <script type="text/javascript">
            function Submit2(){
                document.getElementById("form_subc_2").submit();
            }
        </script>
        <script type="text/javascript">
            function Submit3(){
                document.getElementById("form_subc_3").submit();
            }
        </script>
        <script type="text/javascript">
            function Submit4(){
                document.getElementById("form_subc_4").submit();
            }
        </script>
        <form id="form_subc_1" method="post" action="../user/subcateg.php">
            <input style="display: none;" name="p_categ" value="Hotelería">
            <select name="subcbarizq" id="subcbarizq" onchange="Submit1()" class="m_c">
                <option style="display: none;" value="ct_hoteleria.php"><b>HOTELERIA</b> <a href="index.php"></option>
                <option value="../user/ct_hoteleria.php"><b>HOTELERIA</b> <a href="index.php"></option>
                <outgroup>
                <?php
                    $sentencia="SELECT * FROM  categorias";
                    $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
                    while($fila=$resultado->fetch_assoc()) {
                        if ($fila['categoria_p'] == "Hotelería") {
                            echo "<option name='subcategoriav'>"; echo $fila['nombre_categoria']; echo "</option>";
                        }
                    }
                    ?>
                </outgroup>
            </select>
        </form>
        <form id="form_subc_2" method="post" action="../user/subcateg.php">
            <input style="display: none;" name="p_categ" value="Vuelos">
            <select name="subcbarizq" id="subcbarizq" onchange="Submit2()" class="m_c">
                <option style="display: none;" value="ct_vuelos.php"><b>VUELOS</b></option>
                <option value="../user/ct_vuelos.php"><b>VUELOS</b></option>
                <outgroup>
                    <?php
                    $sentencia="SELECT * FROM  categorias";
                    $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
                    while($fila=$resultado->fetch_assoc()) {
                        if ($fila['categoria_p'] == "Vuelos") {
                            echo "<option name='subcategoriav'>"; echo $fila['nombre_categoria']; echo "</option>";
                        }
                    }
                    ?>
                </outgroup>
            </select>
        </form>
        <form id="form_subc_3" method="post" action="../user/subcateg.php">
            <input style="display: none;" name="p_categ" value="Restaurantes">
            <select name="subcbarizq" id="subcbarizq" onchange="Submit3()" class="m_c">
                <option style="display: none;" value="ct_restaurantes.php"><b>RESTAURANTES</b></option>
                <option value="../user/ct_restaurantes.php"><b>RESTAURANTES</b></option>
                <outgroup>
                    <?php
                    $sentencia="SELECT * FROM  categorias";
                    $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
                    while($fila=$resultado->fetch_assoc()) {
                        if ($fila['categoria_p'] == "Restaurantes") {
                            echo "<option name='subcategoriav'>"; echo $fila['nombre_categoria']; echo "</option>";
                        }
                    }
                    ?>
                </outgroup>
            </select>
        </form>
        <form id="form_subc_4" method="post" action="../user/subcateg.php">
            <input style="display: none;" name="p_categ" value="vehículo">
            <select name="subcbarizq" id="subcbarizq" onchange="Submit4()" class="m_c">
                <option style="display: none;" value="ct_rent_vehi.php"><b>RENTA DE VEHÍCULOS</b></option>
                <option value="../user/ct_rent_vehi.php"><b>RENTA DE VEHÍCULOS</b></option>
                <outgroup>
                    <?php
                    $sentencia="SELECT * FROM  categorias";
                    $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
                    while($fila=$resultado->fetch_assoc()) {
                        if ($fila['categoria_p'] == "Renta de vehículo") {
                            echo "<option name='subcategoriav'>"; echo $fila['nombre_categoria']; echo "</option>";
                        }
                    }
                    ?>
                </outgroup>
            </select>
        </form>
    </div>