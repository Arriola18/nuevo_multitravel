<?php

  # Incluimos la clase conexion para poder heredar los metodos de ella.
  require_once('conexion.php');


  class Usuario extends Conexion
  {

    public function login($user, $clave)
    {
      /*
        Antes que nada :v para los que no saben que es parent
        lo que estamos haciendo es llamar un metodo de una clase
        heredada es decir al yo colocar parent::conectar, lo que hago es
        llamar al metodo conectar de la clase patiente en este caso conexion xd
        espero haber sido claro :v continuemos
      */


      # Nos conectamos a la base de datos
      parent::conectar();

      /*
        Lo segundo que debemos hacer es filtrar la informacion que el usuario
        ingresa, recuerda nunca debes confiar en los datos que el usuario
        envia, asi que teniendo eso en cuenta usaremos unos metodos de la clase conexion
        que ayudaran a realizar los filtros necesarios
      */

      // El metodo salvar sirve para escapar cualquier comillas doble o simple y otros caracteres que pueden vulnerar nuestra consulta SQL
      $user  = parent::salvar($user);
      $clave = parent::salvar($clave);

      // Si necesitas filtrar las mayusculas y los acentos habilita las lineas 36 y 37 recuerda que en la base de datos debe estar filtrado tambien para una validacion correcta
      /*$user  = parent::filtrar($user);
      $clave = parent::filtrar($clave);*/

      /*
        Para la validación del usuario podemos hacer dos cosas,
        validar que exista el email solamente y mostrar error en caso
        de que no, o validar ambos campos y mostrar un unico error,
        en este caso validare el usuario con ambos campos, si necesitas ayuda
        para hacer la filtracion 1 me puedes escribir o enviarme un email a codigoadsi@gmail.com
      */

      // traemos el id y el nombre de la tabla usuarios donde el usuario sea igual al usuario ingresado y ademas la clave sea igual a la ingresada para ese usuario.
      $consulta = 'select documento, tipo_documento, nombre1, nombre2, apellido1, apellido2, pais_na, fecha_nacimiento, ciudad_na, pais_resi, ciudad_resi, direccion_resi, telefono, email, user, clave, cargo from usuarios where email="'.$user.'" and clave="'.$clave.'"';
      /*
        Verificamos si el usuario existe, la funcion verificarRegistros
        retorna el número de filas afectadas, en otras palabras si el
        usuario existe retornara 1 de lo contrario retornara 0
      */

      $verificar_usuario = parent::verificarRegistros($consulta);

      // si la consulta es mayor a 0 el usuario existe
      if($verificar_usuario > 0){

        /* Bien ahora a jugar un poco :v */

        /*
          Realizamos la misma consulta de la linea 55 pero esta ves transformaremos el resultado en un arreglo,
          ten mucho cuidado con usar el metodo consultaArreglo ya que devuelve un arreglo de la primera fila encontrada
          es decir, como nosotros solo validamos a un usuario no hay problema pero esta funcion no funciona si
          vas a listar a los usuarios, espero que me entiendan xd
        */

        $user = parent::consultaArreglo($consulta);

        /*
          Bien espero ser un poco claro en esta parte, la variable user
          en la linea 69 pasa a ser un arreglo con los campos consultados en la linea
          48, entonces para acceder a los datos utilizamos $user[nombre_del_campo] Ok?
          bueno hagamos el ejercicio.
        */

        /*
          Inicializamos la sessión | Recuerda con las variables de sesión
          podemos acceder a la informacion desde cualquiera pagina siempre y cuando
          exista una sesión y ademas utilicemos el codigo de la linea 84
        */

        session_start();

        /*
          Las variables de sesion son muy faciles de usar, es como
          declarar una variable, lo unico diferente es que obligatoria mente
          debes usar $_SESSION[] y .... el nombre de la variable ya no sera asi
          $miVariable sino entre comillas dentro del arreglo de sesion, haber me
          dejo explicar, $_SESSION['miVariable'], recuerda que como declares la variable
          en este archivo asi mismo lo llamaras en los demas.
        */

        $_SESSION['documento']     = $user['documento'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['cargo']  = $user['cargo'];

        /*
          Que porqué almacenamos cargo? es sencillo en nuestros proyectos
          pueden existir archivos que solo puede ver un usuario con el cargo de
          administrador y no un usuario estandar, asi que la variable global de
          sesion nos ayudara a verificar el cargo del usuario que ha iniciado sesion
          Ok?
        */

        /*
          Recuerda:
          cargo con valor: 1 es: Administrador
          cargo con valor: 2 es: usuario estandar
          puedes agregar cuantos cargos desees, en este ejemplo solo uso 2
        */

        // Verificamos que cargo tiene l usuario y asi mismo dar la respuesta a ajax para que redireccione
        if($_SESSION['cargo'] == 1){
          echo '../admin/index.php';
        }else if($_SESSION['cargo'] == 2){
          echo '../user/index.php';
        }else if($_SESSION['cargo'] == 3){
          echo '../empresa/index.php';
        }


        // u.u finalizamos aqui :v

      }else{
        // El usuario y la clave son incorrectos
        echo 'error_3';
      }


      # Cerramos la conexion
      parent::cerrar();
    }

    public function registroUsuario($documento, $tipo_documento, $nombre1, $nombre2, $apellido1, $apellido2, $pais_na, $ciudad_na, $fecha_nacimiento, $pais_resi, $ciudad_resi, $direccion_resi, $telefono, $email, $username, $clave, $cargo)
    {
      parent::conectar();

      $documento  = parent::filtrar($documento);
      $tipo_documento  = parent::filtrar($tipo_documento);
      $nombre1  = parent::filtrar($nombre1);
      $nombre2  = parent::filtrar($nombre2);
      $apellido1  = parent::filtrar($apellido1);
      $apellido2  = parent::filtrar($apellido2);
      $pais_na  = parent::filtrar($pais_na);
      $ciudad_na  = parent::filtrar($ciudad_na);
      $fecha_nacimiento  = parent::filtrar($fecha_nacimiento);
      $pais_resi  = parent::filtrar($pais_resi);
      $ciudad_resi  = parent::filtrar($ciudad_resi);
      $direccion_resi  = parent::filtrar($direccion_resi);
      $telefono  = parent::filtrar($telefono);
      $email = parent::filtrar($email);
      $username = parent::filtrar($username);
      $clave = parent::filtrar($clave);
      $cargo = parent::filtrar($cargo);
      



      // validar que el correo no exito
      $verificarCorreo = parent::verificarRegistros('select documento from usuarios where email="'.$email.'" ');


      if($verificarCorreo > 0){
        echo 'error_3';
      }else{

        parent::query('insert into usuarios(documento, tipo_documento, nombre1, nombre2, apellido1, apellido2, pais_na, fecha_nacimiento, ciudad_na, pais_resi, ciudad_resi, direccion_resi, telefono, email, user, clave, cargo) values("'.$documento.'","'.$tipo_documento.'","'.$nombre1.'","'.$nombre2.'","'.$apellido1.'","'.$apellido2.'","'.$pais_na.'","'.$ciudad_na.'","'.$fecha_nacimiento.'","'.$pais_resi.'","'.$ciudad_resi.'","'.$direccion_resi.'","'.$telefono.'","'.$email.'","'.$username.'","'.$clave.'", "'.$cargo.'")');

        session_start();

        $_SESSION['nombre'] = $username;
        $_SESSION['cargo']  = $cargo;

        echo 'index.php';

      }

      parent::cerrar();
    }

  }


?>
