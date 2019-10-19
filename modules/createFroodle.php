<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../modules/Datedropper/datedropper.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timedropper/1.0/timedropper.min.css">
</head>

<body>
  <?php include 'menu.php' ?>
  <div class="inner-container">
    <div class="box">
      <input type="text" id="titulo" name="" value="" placeholder="Titulo">
      <br>
      <input type="text" data-format = "d-m-Y"  data-large-mode="true"  id="fecha" name="" value="" placeholder = "Fecha" >
      <br>
      <input type="text" id="hora" name="" value="" placeholder = "Hora">
      <br>
      <input type="text" id="hora" name="" value="" placeholder = "Element">
      <br>
      <button type="button" id="add_element" name="button">Add element</button>
      <br>
      <button type="button" id="enviar" name="button">Add date</button>
      <br>
      <button type="button" id="crear" name="button">Create froodle</button>

    </div>

  </div>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" charset="utf-8"></script>
<script src="../modules/Datedropper/datedropper.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timedropper/1.0/timedropper.min.js" charset="utf-8"></script>
<script type="text/javascript">
  $('#fecha').dateDropper();
  $('#hora').timeDropper({
    format: 'H:mm'
  });
</script>
<script src="createFroodle.js"></script>
