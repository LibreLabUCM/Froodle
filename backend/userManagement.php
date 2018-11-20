<?php

require_once(__DIR__ . '/../db.php');
require_once(__DIR__ . '/utils.php');
require_once(__DIR__ . '/sendMail.php');

$collectionUsers = $cliente->froodle->users;

function registerUser($username, $password, $email) {
  global $collectionUsers;

  $user =  [
    'uuid' => gen_uuid(),
    'username' => $username,
    'password' => $password,
    'email' => $email,
    'registrationDate' => time(),
    'otp' => []
  ];

  $collectionUsers->insertOne($user);
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

  //sendMail($email, 'Activate!', "Your code: {$otp['otp']}");
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
}
