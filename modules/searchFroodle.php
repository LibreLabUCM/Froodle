<?php
require ('../vendor/autoload.php');

$cliente = new MongoDB\Client("mongodb://localhost:27017");
$coleccion = $cliente->froodle->test;

$title = $_POST['value'];

echo "<table>
  <tr>
    <th>Username</th>";

      $result = $coleccion -> findOne(array('title' => "Froodle2"));
      foreach($result['dates'] as $date){
        foreach($date['time'] as $time){
          echo "<th>";
          echo $date['date'] . "<br>";
          echo $time['hour'];
          echo "</th>";
        }

      }
    echo "</th>
  </tr>";

  $result = $coleccion -> findOne(array('title' => $title));
  foreach($result['user'] as $user){
    echo "<tr>
          <td>" .
          $user['username']
    .    "</td>";
    foreach($user['options'] as $options){
      echo "<td>" .
            $options
          ."</td>";
    }
    echo "</tr>";

  }

echo "</table>";
?>
