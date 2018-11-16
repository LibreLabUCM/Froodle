<?php require ('db.php'); ?>
<!--this will allow us to call all the php code from this page if needed-->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Welcome to froodle</title>
    <!--Link Css Sheets-->
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>

  <!--Video Container, part of the GUI-->
    <div class="vid-container">
  <video class="bgvid" autoplay="autoplay" muted="muted" preload="auto" loop>
      <source src="http://mazwai.com/system/posts/videos/000/000/109/webm/leif_eliasson--glaciartopp.webm?1410742112" type="video/webm">
  </video>
  <div class="inner-container">
    <video class="bgvid inner" autoplay="autoplay" muted="muted" preload="auto" loop>
      <source src="http://mazwai.com/system/posts/videos/000/000/109/webm/leif_eliasson--glaciartopp.webm?random=1" type="video/webm">
    </video>
    <div class="box">

      <h1>Froodle</h1>

      <center><h2 id="demo">9999 </h2></center>
      <center><h3>froodles created</h3></center>


      <button onclick="location.href='https://librelabucm.org/create_froodle.php'">Create Froodle</button>
      <p>What is froodle? <span onclick="location.href='https://librelabucm.org/'">Follow the Froodle team</span></p>
	  </div>
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  </body>
</html>
