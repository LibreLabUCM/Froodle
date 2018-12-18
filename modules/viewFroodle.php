<?php require("../db.php"); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <?php include 'menu.php' ?>
    <div class="inner-container">
      <div class="box">
        <span>Inserte el titulo de su froodle aqui</span>
        <input type="text" id = "titulo" name="titulo" value="" placeholder="titulo">
        <button type="button" id = "enviar" name="button">Enviar</button>
        <div id = "container">

        </div>
      </div>

    </div>


  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" charset="utf-8"></script>
  <script src = "viewFroodle.js"></script>
</html>
