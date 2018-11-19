<?php require("../db.php"); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <table>
      <tr>
        <th>Username</th>
          <?php

          $result = $coleccion -> findOne(array('title' => "Froodle2"));
          foreach($result['dates'] as $date){
            foreach($date['time'] as $time){
              echo "<th>";
              echo $date['date'] . "<br>";
              echo $time['hour'];
              echo "</th>";
            }

          }
           ?>
        </th>
      </tr>
      <?php

      $result = $coleccion -> findOne(array('title' => "Froodle2"));
      foreach($result['user'] as $user){
        echo "<tr>";
        echo "<td>";
        echo $user['username'];
        echo "</td>";
        foreach($user['options'] as $options){
          echo "<td>";
          echo $options;
          echo "</td>";
        }
        echo "</tr>";

      }

       ?>
    </table>

  </body>
</html>
