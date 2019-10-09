<!--
    Froodle index.php
    Copyright (C) 2019 LibreLabUCM

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.
-->
<?php require ('db.php'); ?>
<!--this will allow us to call all the php code from this page if needed-->
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Welcome to froodle</title>
    <!--Link Css Sheets-->
    <link rel="stylesheet" href="css/style.css">
     <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
  </head>

  <body>

  <?php include 'modules/menu.php' ?>
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
      <h3>Froodles Created</h3>

      <button onclick="location.href='modules/createFroodle.php'">Create Froodle</button>
      <p>or</p>
      <button onclick = "location.href = 'modules/viewFroodle.php'" type="button" name="button">View your froodle</button>
      <p>What is froodle? <span onclick="location.href='https://librelabucm.org/'">Follow the Froodle team</span></p>
      <p>Powered by LibreLabUcm</p>
    </div>
  </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  </body>
</html>
