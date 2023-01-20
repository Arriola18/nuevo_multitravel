
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registrate</title>
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario (más bonitas que el alert) -->
    <link rel="stylesheet" href="css/sweetalert.css">

    <link rel="stylesheet" href="../estilo.css">
</head>
    <body>
        <?php
            include('../includes/barra_izq.php');
			if ($_SESSION['cargo'] > 0) {
				?>
				<script type="text/javascript">
					window.location.href='../user/index.php';
				</script>
			<?php
			}
        ?>
        </div>
        <?php
            include('../includes/encabezado.php');
        ?>
            <a href="registrar.php"><div id="inicio_sesion">Iniciar sesión</div></a>
        </div>
        <div id="principal">
        <!--<div id="espacio_superior"></div>-->
                <div class="cabecera">
					<center><h1>Registrar usuario</h1></center>
         			<form id="formulario_registro" method="post" action="validar_registro.php">
						<table align="center" width="30%" class="form_reg">
							<tr>
								<td>
									<p>Número de documento
								</td>
								<td>
									<input type="number" name="documento"></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Tipo de documento 
								</td>
								<td>
								<select name="tipo_documento">
									<option>Cédula</option>
									<option>Tarjeta de identidad</option>
									<option>Pasaporte</option>
									<option>Registro civil</option>
									<option>Cedula de extranjeria</option>
								</select>   
								</td>
							</tr>
							<tr>
								<td>
									<p>Primer nombre
								</td>
								<td>
									<input type="text" name="nombre1"></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Segundo nombre 
								</td>
								<td>
									<input type="text" name="nombre2"></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Primer apellido
								</td>
								<td>
									<input type="text"name="apellido1"></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Segundo apellido 
								</td>
								<td>
									<input type="text" name="apellido2"></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>País de nacimiento
								</td>
								<td>
									<input type="text" name="pais_na"></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Ciudad de nacimineto 
								</td>
								<td>
									<input type="text" name="ciudad_na"></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Fecha de nacimiento 
								</td>
								<td>
									<input type="date" name="fecha_nacimiento"></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>País de residencia 
								</td>
								<td>
									<input type="text" name="pais_resi"></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Ciudad de residencia 
								</td>
								<td>
									<input type="text"  name="ciudad_resi"></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Dirección de residencia
								</td>
								<td>
									<input type="text"  name="direccion_resi"></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Número de teléfono
								</td>
								<td>
									<input type="number" name="telefono"></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Correo eletrónico 
								</td>
								<td>
									<input type="email" id="email" name="email"></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Nombre de usuario
								</td>
								<td>
									<input type="text" id="username" name="username"></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Contraseña
								</td>
								<td>
									<input type="password" autocomplete="off"  id="clave" name="clave"></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Verificar contraseña
								</td>
								<td>
									<input type="password" autocomplete="off"  id="clave2" name="clave2"></p>

									<select style="display: none;" name="cargo">
										<option>2</option>
									</select>
									<div class="row" id="load" hidden="hidden">
										<div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
											<img src="img/load.gif" width="100%" alt="">
										</div>
										<div class="col-xs-12 center text-accent">
											<span>Validando información...</span>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<button type="submit" name="button" id="registro">Registrar</button>
								</td>
							</tr>
						</table>
          			</form>
        		</div>
    	</div>
  	</body>
</html>