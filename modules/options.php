<?php require("../db.php"); ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/style.css">
    </head>
  <body>
    <div class="inner-container">
      <div class="box">
        <?php

        $name = $_POST['username'];

        $limit = $_POST['qty'];
        $title = $_POST['title'];

        $arr = array();
        for($i = 0; $i < $limit; $i++){
          array_push($arr, ($_POST['option'.$i]));
        }

        $coleccion->updateOne(
          ['title' => $title],
          ['$push' => ['user' => [
            'username' => $name,
            'options' => $arr
            ]]]
        );

        echo "Gracias por usar froodle, tus datos se han recogido con éxito";

        ?>
      </div>

    </div>
  </body>
</html>
