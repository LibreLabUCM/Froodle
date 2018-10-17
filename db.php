require ('vendor/autoload.php');

/*
  DB STRUCTURE:
  
  DOODLE
    ⊢->TITLE
    ⊢-> FECHAS
    ︳      ﹂DAY
    ︳         ﹂HOURS
    ﹂USERS
        ﹂USERNAME
              ﹂OPTIONS(Array containing 0,1 or 2 as much times as options there are)
*/

$cliente = new MongoDB\Client("mongodb://localhost:27017");
$colección = $cliente->froodle->users;
