<?php require ('db.php'); ?>
<!--this will allow us to call all the php code from this page if needed-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Welcome to froodle</title>
    <!--Link Css Sheets-->
    <link rel="stylesheet" href="css/style.css">
     <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet"> 
  </head>

  <body>

  <div class="inner-container">

    <div class="box">

      <h1>Froodle</h1>

      <h2 id="demo">

        <?php

          $result = $coleccion -> find();
          $counter = 0;
          foreach($result as $entry){
            $counter++;
          }
          echo $counter;

        ?>

      </h2>
      <h3>froodles created</h3>


      <button onclick="location.href='modules/createFroodle.html'">Create Froodle</button>
      <p>or</p>
      <button onclick = "location.href = 'modules/viewFroodle.php'" type="button" name="button">View your froodle</button>
      <p>What is froodle? <span onclick="location.href='https://librelabucm.org/'">Follow the Froodle team</span></p>
      <p>Powered by librelab ucm</p>
    </div>
  </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  </body>
</html>
