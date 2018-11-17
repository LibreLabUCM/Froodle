<?php require("../db.php"); ?>

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
  ['$set' => ['user' => [
    'username' => $name,
    'options' => $arr
    ]]]
);

echo "Gracias por usar froodle, tus datos se han recogido con éxito";

?>
