<?php
$conexion= new mysqli("localhost", "root", "", "multitravel_services");
//comprobar la conexion
if(mysqli_connect_errno())
{
  printf("falló la conexión");

}
else {
  printf ("");
}
 ?>
