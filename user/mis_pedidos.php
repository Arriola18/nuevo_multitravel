<?php
include "../conexiones/conexion.php";
?>
<html>
    <head><title>Mis pedidos</title></head>
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
        <div id="encabezado">
            <div class="subcateg_tittle">
                <table width='100%' align="center">
                    <tr>
                        <th><font size="5">MIS PEDIDOS</font></th>
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
                    if ($fila1['user_doc']==$_SESSION['documento']) {
                        if ($fila1['servicio']==$fila['id_servicio']) {
                            echo "<div style='height: min-content;' class='service_box'>";
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
                            echo "<td align='left'><font face='arial'><b>Precio total: US$ </b>"; echo $fila1['precio']; echo "</font></td>";
                            echo "</tr>";
                            echo "<tr class='alto_lim'>";
                            echo "<td align='left'>
                            
                                        <form method='post' action='validar_pedido.php'>
                                        <div align='center'><div style='width: 70%;' id='smart-button-container"; echo $fila1['servicio']; echo"'>
                            <div style='display: none; text-align: center'><label for='description'>MULTITRAVEL_SERVICES :<b>"; echo $fila['nombre_servicio']; echo"</b></div>
                              <p id='descriptionError' style='display: none; color:red; text-align: center;'>Please enter a description</p>
                            <div style='display: none;text-align: center'><label for='amount'>PRECIO </label><input name='amountInput' type='text' id='amount' value='"; echo $fila1['precio']; echo"' ><span><p class='m-0 text-center text-white'></p></span></div>
                              <p id='priceLabelError' style='display: none; color:red; text-align: center;'>Please enter a price</p>
                              <div id='invoiceidDiv' style='display: none;text-align: center; display: none;'><label for='invoiceid'> </label><input name='invoiceid' maxlength='127' type='text' id='invoiceid' value='' ></div>
                              <p id='invoiceidError' style='display: none; color:red; text-align: center;'>Please enter an Invoice ID</p>
                              <div style='text-align: center; margin-top: 0.625rem;' id='paypal-button-container'></div>
                            </div>
                            </div>
                            <script src='https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD' data-sdk-integration-source='button-factory'></script><script>
                            function initPayPalButton() {
                            var description = document.querySelector('#smart-button-container"; echo $fila1['servicio']; echo" #description');
                            var amount = document.querySelector('#smart-button-container"; echo $fila1['servicio']; echo" #amount');
                            var descriptionError = document.querySelector('#smart-button-container"; echo $fila1['servicio']; echo" #descriptionError');
                            var priceError = document.querySelector('#smart-button-container"; echo $fila1['servicio']; echo" #priceLabelError');
                            var invoiceid = document.querySelector('#smart-button-container"; echo $fila1['servicio']; echo" #invoiceid');
                            var invoiceidError = document.querySelector('#smart-button-container"; echo $fila1['servicio']; echo" #invoiceidError');
                            var invoiceidDiv = document.querySelector('#smart-button-container"; echo $fila1['servicio']; echo" #invoiceidDiv');

                            var elArr = [description, amount];

                            if (invoiceidDiv.firstChild.innerHTML.length > 1) {
                              invoiceidDiv.style.display = 'block';
                            }

                            var purchase_units = [];
                            purchase_units[0] = {};
                            purchase_units[0].amount = {};

                            function validate(event) {
                              return event.value.length > 0;
                            }

                            paypal.Buttons({
                              style: {
                                color: 'blue',
                                shape: 'pill',
                                label: 'paypal',
                                layout: 'horizontal',
                                tagline: true
                              },

                              onInit: function (data, actions) {
                                actions.disable();

                                if(invoiceidDiv.style.display === 'block') {
                                  elArr.push(invoiceid);
                                }

                                elArr.forEach(function (item) {
                                  item.addEventListener('keyup', function (event) {
                                    var result = elArr.every(validate);
                                    if (result) {
                                      actions.enable();
                                    } else {
                                      actions.disable();
                                    }
                                  });
                                });
                              },

                              onClick: function () {
                                if (description.value.length < 1) {
                                  descriptionError.style.visibility = 'visible';
                                } else {
                                  descriptionError.style.visibility = 'hidden';
                                }

                                if (amount.value.length < 1) {
                                  priceError.style.visibility = 'visible';
                                } else {
                                  priceError.style.visibility = 'hidden';
                                }

                                if (invoiceid.value.length < 1 && invoiceidDiv.style.display === 'block') {
                                  invoiceidError.style.visibility = 'visible';
                                } else {
                                  invoiceidError.style.visibility = 'hidden';
                                }

                                purchase_units[0].description = description.value;
                                purchase_units[0].amount.value = amount.value;

                                if(invoiceid.value !== '') {
                                  purchase_units[0].invoice_id = invoiceid.value;
                                }
                              },

                              createOrder: function (data, actions) {
                                return actions.order.create({
                                  purchase_units: purchase_units,
                                });
                              },

                              onApprove: function (data, actions) {
                                return actions.order.capture().then(function (orderData) {

                                  // Full available details
                                  console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                                  // Show a success message within this page, e.g.
                                  const element = document.getElementById('paypal-button-container');
                                  element.innerHTML = '';
                                  element.innerHTML = '<h3>Thank you for your payment!</h3>';

                                  // Or go to another URL:  actions.redirect('thank_you.html');
                                  
                                });
                              },

                              onError: function (err) {
                                console.log(err);
                              }
                            }).render('#paypal-button-container');
                            }
                            initPayPalButton();
                            </script>
                                  </form>
                            </td>
                            </tr>
                            </table></center>
                            </div>";
                        }
                    }
                }
            }
            ?>
        </div>
    </body>
</html>