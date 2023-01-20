<?php
$conexion= new mysqli("localhost", "root", "", "servicios");
//comprobar la conexion
if(mysqli_connect_errno())
{
    printf("Fallo la conexión");
}
else {
    printf("Estás conectado");
}
?>