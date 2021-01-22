<?php
require_once __DIR__ . '/../model/connection.php';
$the_day = 10100; // (string) date('dmy');
$day = $the_day;
$amount = 300000;

echo $the_day;
//exit();
//exit();
$sql = "SELECT * FROM `dailyrecord` WHERE day = $the_day";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

if(!$result){
  $sql = "INSERT INTO `dailyrecord` (day, amount) VALUE ($day, $amount)";
  $stmt=$pdo->prepare($sql);
  $stmt->execute();
  
}

exit();



echo $expired_date;
exit();
  $expires = date('U') + 1800;
  echo $expired_date;
  echo "<br>";
  echo $expires = date('U') + 1700;
  echo "<br>";
  print date("m/d/y G.i:s","$expires");
  $expires = date('U') + 31536000;
  echo "<br>";
  print date("m/d/y","$expires");
  exit();

  //echo $payment_date =date("m/d/y");
  echo $times = time();

  echo $dates = date('U');
  exit();
  echo "<br>";
  $expires = date('U') + 31536000;
  
  echo "<br>";
  echo $expired_date = date("m/d/y","$times");

  if($expires < $times){
    echo "yes";
  }

  exit();
