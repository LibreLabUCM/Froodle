<?php
require ('../vendor/autoload.php');

$cliente = new MongoDB\Client("mongodb://localhost:27017");
$coleccion = $cliente->froodle->test;

$title = $_POST['value'];

echo "<table class = 'table table-dark table-striped'>
  <thead><tr>
    <th>Username</th>";

      $result = $coleccion -> findOne(array('title' => $title));
      foreach($result['dates'] as $date){
        foreach($date['time'] as $time){
          echo "<th>";
          echo $date['date'] . "<br>";
          echo $time['hour'];
          echo "</th>";
        }

      }
    echo "</th>
  </tr></thead><tbody>";

  $result = $coleccion -> findOne(array('title' => $title));
  foreach($result['user'] as $user){
    echo "<tr>
          <td>" .
          $user['username']
    .    "</td>";
    foreach($user['options'] as $options){
      if($options == 'yes'){
        echo "<td class = 'text-success'>" .
              $options
            ."</td>";
      }else if($options == 'no'){
        echo "<td class = 'text-danger'>" .
              $options
            ."</td>";
      }

    }
    echo "</tr>";

  }

echo "</tbody></table>";
?>
