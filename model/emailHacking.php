<?php

$one = 1;
$sql = "SELECT * FROM `sitesettings` WHERE id =:one";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id'=>$one]);
$resultSettings = $stmt->fetch();

if($result->admin_email){
      $name = $result->admin_user_name;
      $To = $result->admin_email;
      $Subject = "Hacking signal, login in as admin";
      $Message = "Hi $name <br>";
      $Message .="Someone is tryuing to login with list of prohibited emails, if you recieve this email <br>";
      $Message .="Kindly shout down the site in one click link asap <br>";
      $Message .="thank you <br>";
      $message .= "<p>PMRobot</p>";

      require_once __DIR__ . '/emailSystem.php';
      emailSystem($To, $Subject, $Message);
}