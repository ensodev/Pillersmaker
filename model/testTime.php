<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php
  
  $user_id = $_SESSION['USER_ID'];
  require_once ('connection.php');

  $sql="SELECT * FROM messages WHERE sender_id = $user_id";

  // $sql="SELECT * FROM `register` WHERE email =:reciever_email OR user_name =:reciever_username";
 

  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $resultTime= $stmt->fetchAll();
  //var_dump($resultTime);
//exit();

//converting mysql timestamp to php time
// $time = $resultTime[48]->msg_time;
// echo $time; 
//$nowTime =  date('U');
// echo "<br>";
// print date("m/d/y G.i:s","$time");
// echo "<br>";
// $expired_date = date("m/d/y G.i:s","$time");
// echo $expired_date;
// echo "<br>";
// $timeDen = $time + 1800;
// echo $time;
// echo "<br>";
// $ok = $timeDen - $expired_date;
// echo $ok;

$nowTime =  date('U');
print date("m/d/y G.i:s","$nowTime")."<br>";
echo $nowTime."---time now";
$nowDen = $nowTime + 900; 
echo "<br>";
echo $nowDen."---time Den";
echo "<br>". "new format";
$nowTime =  date('U');