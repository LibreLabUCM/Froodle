<?php require("../db.php"); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <?php include 'menu.html' ?>
    <div class="inner-container">
      <div class="box">
        <form class="" action="options.php" method="post">

          <span>Username: </span>
          <input type="text" name = "username" value="">
          <br>
          <br>

          <?php

            $title = $_GET['title'];
            $result = $coleccion -> findOne(array('title' => $title));
            $counter = 0;
            echo "<div class = 'container bg-dark pt-3 pb-3 rounded border'>
                    <div class = 'row'>
                      <div class = 'col'><h4>". $title ."</h4></div>
                    </div>
                    <div class = 'row'>";

            foreach($result['dates'] as $date){
              echo "<div class = 'col-xs-12 col-sm'><h5>". $date['date'] . "</h5></div>";
              // echo "<div class = 'd-block d-sm-none'>";
              foreach ($date['time'] as $time) {
                echo "<div class = 'col-xs-12 col d-block d-sm-none'>";
                echo "<p  class = 'options'>" . $time['hour'] . "</p>";
                echo "<input type = 'radio' name = 'option".$counter."' value = 'yes'>YES";
                echo "<br>";
                echo "<input type = 'radio' name = 'option".$counter."' value = 'no'>NO";
                echo "</div>";
                $counter++;
              }
              //echo "</div>";
            }
            echo "</div>";
            echo "<div class = 'd-none d-sm-block'><div class = 'row'>";
            foreach($result['dates'] as $date){
              foreach ($date['time'] as $time) {
                echo "<div class = 'col'>";
                echo "<p  class = 'options'>" . $time['hour'] . "</p>";
                echo "<input type = 'radio' name = 'option".$counter."' value = 'yes'>YES";
                echo "<br>";
                echo "<input type = 'radio' name = 'option".$counter."' value = 'no'>NO";
                echo "</div>";
                $counter++;
              }

              echo "<input type = 'hidden' name = 'qty' value = ".$counter.">";
              echo "<input type = 'hidden' name = 'title' value = ".$title.">";
            }
            echo "</div></div></div>";
          ?>

          <br>
          <br>
          <button type="submit" name="button" id = "submit">Submit options</button>


        </form>
      </div>


    </div>
  </body>
</html>
