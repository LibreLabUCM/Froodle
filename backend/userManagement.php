<?php

require_once(__DIR__ . '/../db.php');
require_once(__DIR__ . '/utils.php');
require_once(__DIR__ . '/sendMail.php');

$collectionUsers = $cliente->froodle->users;

function setupSession() {
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
}

function registerUser($username, $password, $email) {
  global $collectionUsers;

  $user = $collectionUsers->findOne(['username' => $username]);
  if (!empty($user)) {
    throw new Exception('Username not available');
    return false;
  }
  $user = $collectionUsers->findOne(['email' => $email]);
  if (!empty($user)) {
    throw new Exception('Email not available');
    return false;
  }

  $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

  $user =  [
    'uuid' => gen_uuid(),
    'username' => $username,
    'password' => $hashedPassword,
    'email' => $email,
    'registrationDate' => time(),
    'otp' => []
  ];

  $collectionUsers->insertOne($user);

  return true;
}

function checkCredentials($triedPassword, $passwordHash) {
  return password_verify($triedPassword, $passwordHash);
}

function login($username, $password) {
  global $collectionUsers;
  $user = $collectionUsers->findOne(['username' => $username]);
  if (empty($user) || $user === false || $user === NULL) {
    $user = $collectionUsers->findOne(['email' => $username]); // admit logins with email
    if (empty($user) || $user === false || $user === NULL) {
      return false;
    }
  }
  if (!checkCredentials($password, $user['password'])) {
    return false;
  }
  return forceLogin($user['uuid']);
}

function forceLogin($uuid) {
  setupSession();
  global $collectionUsers;
  $user = $collectionUsers->findOne(['uuid' => $uuid]);
  if (empty($user) || $user === false || $user === NULL) {
    return false;
  } else {
    $_SESSION['loggedIn'] = $user['uuid'];
    return true;
  }
}

function logout() {
  setupSession();
  $_SESSION['loggedIn'] = '';
  unset($_SESSION['loggedIn']);
}

function getLoggedIn() {
  setupSession();
  global $collectionUsers;
  if (empty($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
    return false;
  }
  $user = $collectionUsers->findOne(['uuid' => $_SESSION['loggedIn']]);
  if (empty($user) || $user === false || $user === NULL) {
    return false;
  }
  return $user;
}


function generateEmailActivationOtp($uuid) {
  global $collectionUsers;

  $user = $collectionUsers->findOne(['uuid' => $uuid]);
  if (empty($user) || $user === false || $user === NULL) {
    return false;
  }

  $otp = [
    'for' => 'activateEmail',
    'otp' => gen_randStr(),
    'active' => true,
    'creationDate' => time(),
    'aliveFor' => 60*60*24, // 1 day
  ];

  $collectionUsers->updateOne(['uuid' => $uuid], ['$push' => ['otp' => $otp]]);

  /*
  $mail = new CustomMailer(true);
  try {
    $mail->addAddress($user['email'], $user['username']);
    $mail->isHTML(true);
    $mail->Subject = 'Activate your account!';
    $mail->Body    = "Your code: {$otp['otp']}";
    $mail->send();
    echo 'Message has been sent';
  } catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }
  */

}
