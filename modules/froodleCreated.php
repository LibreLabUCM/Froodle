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
        <form class="" action="options.php" method="post">

          <span>Username: </span>
          <input type="text" name = "username" value="">
          <br>
          <br>

          <?php

            $title = $_GET['title'];

            echo "froodle title: ". $title . '<br><br>';
            echo "options: " . "<br>";


            $result = $coleccion -> findOne(array('title' => $title));
            $counter = 0;
            foreach($result['dates'] as $date){
              echo "dia: ". $date['date'];
              echo "<ul>";
              foreach ($date['time'] as $time) {
                echo "<li  class = 'options'>  hora: " . $time['hour'] ;
                echo "<input type = 'radio' name = 'option".$counter."' value = 'yes'>YES";
                echo "<input type = 'radio' name = 'option".$counter."' value = 'no'>NO";
                echo "</li>";
                $counter++;
              }
              echo "</ul>";
              echo "<input type = 'hidden' name = 'qty' value = ".$counter.">";
              echo "<input type = 'hidden' name = 'title' value = ".$title.">";
            }
          ?>
          <br>
          <br>
          <button type="submit" name="button" id = "submit">Submit options</button>


        </form>
      </div>


    </div>
  </body>
</html>
