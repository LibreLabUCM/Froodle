<?php
    require ('../vendor/autoload.php');

    $cliente = new MongoDB\Client("mongodb://localhost:27017");
    $coleccion = $cliente->froodle->test;

    $val = $_POST['value'];
    $title = $val[0];

    $array = array();
    for($i = 0; $i < count($val) - 1; $i++){
      $arr = $val[$i + 1];
      array_push($array, array('date'=> $arr['date'], 'time'=> $arr['hours']));
    }

    print_r($array);
    $coleccion->insertOne(["title" => $title, "dates" => $array]);
?>
