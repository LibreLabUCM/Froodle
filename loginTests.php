<?php
require_once(__DIR__ . '/backend/userManagement.php');


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

?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Froodle login tests</title>
  </head>
  <body>
    <div style="background-color: lightblue;">
      Logged in user info:
      <?php
      if (!$user) {
        echo "No user logged in";
      } else {
        echo "User logged in: {$user['username']}, with email: {$user['email']}";
      }
      ?>
    </div>
    <br><br><br>
    <div style="background-color: lightgreen;">
      Last action messages:
      <ul>
      <?php
      if (empty($messages)) {
        echo "<li>No action messages</li>";
      } else {
        foreach ($messages as $msg) {
          echo "<li>$msg</li>";
        }
      }
      ?>
      </ul>
    </div>
    <br><br>
    <h3>Login:</h3>
    <form method="POST">
      Username: <input type="text" name="username" placeholder="Username" required><br>
      Password: <input type="password" name="password" placeholder="Password" required><br>
      <input type="hidden" name="action" value="login">
      <input type="submit" value="Login">
    </form>
    <br><br>
    <h3>Register:</h3>
    <form method="POST">
      Username: <input type="text" name="username" placeholder="Username" required><br>
      Email: <input type="email" name="email" placeholder="Email" required><br>
      Password: <input type="password" name="password" placeholder="Password" required><br>
      Password (repeat): <input type="password" name="password2" placeholder="Password again" required><br>
      <input type="hidden" name="action" value="register">
      <input type="submit" value="Register">
    </form>
    <br><br>
    <form method="POST">
      <input type="hidden" name="action" value="logout">
      <input type="submit" value="Logout">
    </form>
  </body>
</html>
