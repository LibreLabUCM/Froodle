<?php
require_once('backend/userManagement.php');


$messages = [];
if (!empty($_POST['action'])) {
  if ($_POST['action'] === 'login') {
    if (login($_POST['username'], $_POST['password'])) {
      $messages[] = 'Logged in';
    } else {
      $messages[] = 'Error Loggin in';
    }
  } else if ($_POST['action'] === 'register') {
    if ($_POST['password'] !== $_POST['password2']) {
      $messages[] = 'Passwords do not match';
    } else {
      try {
        if (registerUser($_POST['username'], $_POST['password'], $_POST['email'])) {
          $messages[] = 'Registered';
        } else {
          $messages[] = 'Error registering';
        }
      } catch (Exception $e) {
        $messages[] = $e->getMessage();
      }
    }
  } else if ($_POST['action'] === 'logout') {
    logout();
    $messages[] = 'Logged out';
  }
}

$user = getLoggedIn();

?>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Froodle</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Your froodles</a>
      </li>
    </ul>
      <?php
      if (!$user) {
        echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                Login
              </button>';
      } else {
        echo '<ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
                <li class="nav-item dropdown">
                  <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    '. $user["username"] .'
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                    <a class="dropdown-item " href="#">Your froodles</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                    <form method="POST">
                      <input type="hidden" name="action" value="logout">
                      <input class = "btn btn-danger" type="submit" value="Logout">
                    </form>
                    </a>
                  </div>
                </li>
              </ul>';
      }
      ?>
  </div>
</nav>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method = "POST">
          <div class="form-group">
            <label for="username" class="col-form-label">Username:</label>
            <input id = "username"class = "form-control" type="text" name="username" placeholder="Username" required>
          </div>
          <div class="form-group">
            <label for="pass" class="col-form-label">Password:</label>
            <input class = "form-control" id = "pass" type="password" name="password" placeholder="Password" required>
          </div>
          <input type="hidden" name="action" value="login">
          <input class = "btn btn-success" type="submit" value="Login">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerModal">
            Launch demo modal
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method = "POST">
          <div class="form-group">
            <label for="username" class="col-form-label">Username:</label>
            <input id = "username"class = "form-control" type="text" name="username" placeholder="Username" required>
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label">Username:</label>
            <input id = "email" class = "form-control" type="email" name="email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="pass" class="col-form-label">Password:</label>
            <input class = "form-control" id = "pass" type="password" name="password" placeholder="Password" required>
          </div>
          <div class="form-group">
            <label for="pass2" class="col-form-label">Password(repeat):</label>
            <input class = "form-control" id = "pass2" type="password" name="password2" placeholder="Password" required>
          </div>
          <input type="hidden" name="action" value="register">
          <input class = "btn btn-success" type="submit" value="Register">
        </form>
      </div>
    </div>
  </div>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
