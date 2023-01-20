<?php

  $documento = $_POST['documento'];
  $tipo_documento = $_POST['tipo_documento'];
  $nombre1 = $_POST['nombre1'];
  $nombre2 = $_POST['nombre2'];
  $apellido1 = $_POST['apellido1'];
  $apellido2 = $_POST['apellido2'];
  $pais_na = $_POST['pais_na'];
  $ciudad_na = $_POST['ciudad_na'];
  $fecha_nacimiento = $_POST['fecha_nacimiento'];
  $pais_resi = $_POST['pais_resi'];
  $ciudad_resi = $_POST['ciudad_resi'];
  $direccion_resi = $_POST['direccion_resi'];
  $telefono = $_POST['telefono'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $clave = $_POST['clave'];
  $clave2 = $_POST['clave2'];
  $cargo = $_POST['cargo'];

  if(empty($email) || empty($clave) || empty($clave2))
  {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }else{

    if($clave == $clave2){

      if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

        # Incluimos la clase usuario

        require_once('../model/usuario.php');

        # Creamos un objeto de la clase usuario

        $usuario = new Usuario();

        # Llamamos al metodo login para validar los datos en la base de datos
        
        $usuario -> registroUsuario($documento,$tipo_documento,$nombre1,$nombre2,$apellido1,$apellido2,$pais_na,$ciudad_na,$fecha_nacimiento,$pais_resi,$ciudad_resi,$direccion_resi,$telefono,$email,$username,$clave,$cargo);
      }else{
        echo 'error_4';
      }
    }else{
      echo 'error_2';
    }

  }




?>
