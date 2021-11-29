<?php

  // IMPORTACIONES
  require_once 'clases/procesos.php';

  // OBJETOS
  $procesos = new Procesos();

  if(isset($_POST['guardar'])){

    // Si se envía el formulario se mandan los datos a la clase Procesos
    $procesos->comprobarFilas($_POST);

    // $numfila = $procesos->comprobarFilas();
    // if($numfila < 10)
    //   $procesos->alta($_POST["minijuego"], $_POST["nick"], $_POST["puntos"]);

    // if($numfila == 10){
    //   $procesos->borrarFilas();
    //   $procesos->alta($_POST["minijuego"], $_POST["nick"], $_POST["puntos"]);
    // }

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
        <label for="minijuego">IdMinijuego</label>
        <input type="number" name="minijuego" value="">
        <label for="nick">Nick</label>
        <input type="text" name="nick" value="">
        <label for="puntos">Puntuación</label>
        <input type="number" name="puntos" value="0" min='0'>
      </div>
      <input type="submit" name="guardar" value="Guardar">
    </form>
  </body>
</html>