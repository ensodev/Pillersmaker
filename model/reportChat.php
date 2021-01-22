<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php

require_once('connection.php');

if(!isset($_GET['id'])){

  echo "<script>location.href='/view/chatEntertainment.php?reported=lost'</script>";
  //header('Location: /view/chatEntertainment.php?reported=lost');
  exit();
}

$chat_id = (int) $_GET['id'];

//get the chat id and makesure chat exist
$sql = "SELECT * FROM `chatentertainment` WHERE id =:id";
$stmt=$pdo->prepare($sql);
$stmt->execute(['id'=>$chat_id]);
$resultReport = $stmt->fetch();

if(!isset($resultReport)){
  echo "<script>location.href='/view/chatEntertainment.php?reported=lost'</script>";
  //header('Location: /view/chatEntertainment.php?reported=lost');
  exit();
} 

$reporter_id = $_SESSION['USER_ID'];
$next_time = date('U') + 60;

$chat_id = $resultReport->id;
$chat_user_id = $resultReport->user_id;
$chat_user_name = $resultReport->user_name;
$chat_message = $resultReport->message;
$chat_time =  date("m/d/y G.i:s","$resultReport->time_posted");


//check time agaist sparmmers
$sql = "SELECT * FROM `reportchat` WHERE reporter_id =:reporter ORDER BY id DESC LIMIT 1";
$stmt=$pdo->prepare($sql);
$stmt->execute(['reporter'=>$reporter_id]);
$resultCheck = $stmt->fetch();
// var_dump($resultCheck);
// exit();


if(!isset($resultCheck->next_time)){
  
  $timeNow = date('U');

      $sql = "INSERT INTO reportchat(
                          reporter_id, 
                          accused_id, 
                          chat_id, 
                          message, 
                          next_time) 
                    VALUE(:reporter_id,
                          :chat_user_id,
                          :chat_id, 
                          :chat_message, 
                          :next_time)";

      $stmt = $pdo->prepare($sql);

      $stmt->execute(['reporter_id'=>$reporter_id, 
                      'chat_user_id'=>$chat_user_id, 
                      'chat_id'=>$chat_id, 
                      'chat_message'=>$chat_message, 
                      'next_time'=>$next_time]);
     
      echo "<script>location.href='/view/chatEntertainment.php?reported=yes'</script>";
      //header('Location: /view/chatEntertainment.php?reported=yes');
      exit();
}
$timeNow = date('U');
if(isset($resultCheck->next_time) AND $resultCheck->next_time > $timeNow){
        echo "<script>location.href='/view/chatEntertainment.php?reported=wait'</script>";
        //header('Location: /view/chatEntertainment.php?reported=wait');
        exit();
}elseif (isset($resultCheck->next_time) AND $resultCheck->next_time < $timeNow){
$timeNow = date('U');
      //$next_time = $resultCheck->next_time;
      $sql = "INSERT INTO reportchat(
                          reporter_id, 
                          accused_id, 
                          chat_id, 
                          message, 
                          next_time) 
                    VALUE(:reporter_id,
                          :chat_user_id,
                          :chat_id, 
                          :chat_message, 
                          :next_time)";

      $stmt = $pdo->prepare($sql);

      $stmt->execute(['reporter_id'=>$reporter_id, 
                      'chat_user_id'=>$chat_user_id, 
                      'chat_id'=>$chat_id, 
                      'chat_message'=>$chat_message, 
                      'next_time'=>$next_time]);
      echo "<script>location.href='/view/chatEntertainment.php?reported=yes'</script>";
      //header('Location: /view/chatEntertainment.php?reported=yes');
      exit();
    }




 

 
  