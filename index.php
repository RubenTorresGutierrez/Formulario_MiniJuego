<?php

  // IMPORTACIONES
  require_once 'clases/procesos.php';

  // CONSTANTES
  define('MINIJUEGO', '1');

  // OBJETOS
  $procesos = new Procesos();

  // Comprobar si se ha enviado el formulario
  if(isset($_POST['guardar'])){

    $nickTrim = trim($_POST['nick']);
    // Comprobar si el nick es correcto
    if(empty($nickTrim))
      $nick = false;
    else $nick = true;

    // Comprobar si la puntuación es negativa o 0
    if($_POST['puntos'] <= 0)
      $puntuacion = false;
    else $puntuacion = true;

    // Si se envía el formulario y el nick y la puntuación son correctos, se mandan los datos a la clase Procesos
    if($nick && $puntuacion)
      $procesos->comprobarFilas($_POST);

  }

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/formulario.css">
    <title>Formulario Minijuegos</title>
  </head>
  <body>
    <h1>Guardar Puntuación</h1>
    <form action="index.php" method="post">
      <div class="">
        <!-- MINIJUEGO -->
        <label for="minijuego">idMinijuego</label>
        <?php 
          // echo '<input type="number" name="minijuego" value="'.MINIJUEGO.'" disabled />';
          echo '<input type="number" name="minijuego" />';
        ?>
        <!-- NICK -->
        <label for="nick">Nick</label>
        <input type="text" name="nick" value="" />
        <!-- PUNTUACIÓN -->
        <label for="puntos">Puntuación</label>
        <input type="number" name="puntos" min='1' />
      </div>
      <!-- GUARDAR -->
      <input type="submit" name="guardar" value="Guardar" />
    </form>
  </body>
</html>