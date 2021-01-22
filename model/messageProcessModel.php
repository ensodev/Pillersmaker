<?php if(!isset($_SESSION))
{
session_start();
}
?>

  <?php
  
  require_once "connection.php";
  require_once  __DIR__ . '/../others/alertFunction.php';

  $sender_id = $_SESSION['USER_ID'];
  $sender_username = $_SESSION['USER_UNAME'];

  if(str_word_count($_POST['subject']) > 20){

    $msg="Subject can't be more than 20 words. ";
    $msgColor="danger";
    echo "<script>location.href='/view/compose.php?subjectTooMuch=$msg&msgColor=$msgColor'</script>";
    

    //header('location: /view/compose.php?subjectTooMuch='.$msg.'&msgColor='.$msgColor);
    exit();  
  }

  if(!isset($_POST['submit'])){
    $msg="Please fill the right form. ";
    $msgColor="danger";
    msgAlert($msg, $msgColor);  
  }

  if($_POST['email'] == '' || $_POST['subject'] =='' || $_POST['message'] ==''){
    $msg="All field must be filled. ";
    $msgColor="danger";
    msgAlert($msg, $msgColor);  
  }

  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $reciever_username = $_POST['email'];
  }

  //check if user is permitted to send email base on last email sent
  $sql="SELECT * FROM `profile` WHERE id =:sender_id";
  $stmt=$pdo->prepare($sql);
  $stmt->execute(['sender_id'=>$sender_id]);
  $resultMSGT= $stmt->fetch();
  
  // var_dump($resultMSGT);
  // exit();

  $timeNow = date('U');

  if(isset($resultMSGT)){
    if($resultMSGT->last_msg_time >= $timeNow){
      require_once ('../view/header3.php');
      echo "<div class='container mt-3 text-center'>
            <div class='alert alert-warning'>
                You need to wait for few minutes to send your next message...!
                <a href='../view/compose.php'> Back to Compose</a>
            </div>
            </div>";
      exit();
    }
  }

  $email = $_POST['email'];
  $reciever_username = $_POST['email'];


  $sql="SELECT * FROM `register` WHERE email =:reciever_email OR user_name =:reciever_username";

  $stmt=$pdo->prepare($sql);
  $stmt->execute(['reciever_email'=>$email, 'reciever_username'=>$reciever_username]);
  $result= $stmt->fetch();

  if(!$result){
    $msg="User not found. ";
    $msgColor="danger";
    msgAlert($msg, $msgColor); 
  }

  $reciever_id = $result->id;

  //confrim if user is permitted to send message to email
  $sql="SELECT * FROM `connect_friend` WHERE user_id =:user AND friend_id =:receiver";

  $stmt=$pdo->prepare($sql);
  $stmt->execute(['user'=>$sender_id, 'receiver'=> $reciever_id]);
  $resultApprove= $stmt->fetch();

  if(empty($resultApprove)){
    $msg="Send connection request to User ";
      $msgColor="danger";
      msgAlert($msg, $msgColor); 
      exit();
  }
  if(isset($resultApprove)){
    if($resultApprove->approved == 0){
      $msg="wait for user to accept you.. ";
      $msgColor="danger";
      msgAlert($msg, $msgColor); 
      exit();
    }
  }

  $msg_subject = $_POST['subject'];

   //reformat article
   

  //remove tags from subject and replace it with PZtags codes
  $replaceContent = array("<script>", "</script>", "ipt>",';','--','<','>','/','=','-','!', "\"", "ript>", "/script>", "ipt>");
  $replaceMent ="";
  $msg_subject = str_replace($replaceContent, $replaceMent, $msg_subject);

  $msg_message = $_POST['message'];

  $replaceContent = array("<script>", "</script>", "ipt>",';','--','=','-','!', "\"", "ript>", "/script>", "ipt>");
  $replaceMent ="";
  $msg_message = str_replace($replaceContent, $replaceMent, $msg_message);
  require_once __DIR__ . "/msgReformat.php";

  
  $msg_message = $articleMessage;
  $reciever_name = $result->user_name;
 
  $msg_mark_read = 0;
  $msgTime = date('U');
 
  $sql = "INSERT INTO messages(sender_id, 
                      reciever_id, 
                      reciever_name,
                      msg_subject, 
                      msg_message, 
                      msg_mark_read,
                      msg_time,
                      user_name)

          VALUE(:sender_id, 
                :reciever_id,
                :reciever_name, 
                :msg_subject, 
                :msg_message, 
                :msg_mark_read,
                :msg_time,
                :user_name)";

  $stmt = $pdo->prepare($sql);
  $stmt->execute(['sender_id'=>$sender_id,
                  'reciever_id'=>$reciever_id,
                  'reciever_name'=>$reciever_name,
                  'msg_subject'=>$msg_subject,
                  'msg_message'=>$msg_message, 
                  'msg_mark_read'=>$msg_mark_read,
                  'msg_time'=>$msgTime,
                  'user_name'=>$sender_username]);


  //getting timing interval
  $sql="SELECT * FROM `sitesettings` WHERE id =1";
  $stmt=$pdo->prepare($sql);
  $stmt->execute();
  $result_time_interval = $stmt->fetch();

  $msg_next_time =  date('U') + $result_time_interval->msg_time_interval;

  $sql = "UPDATE profile SET last_msg_time =:last_msg WHERE id = $sender_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['last_msg'=>$msg_next_time]);

  //send email to alert user of message on pillersmaker
  require_once __DIR__ . "/emailSystem.php";

    $to = $email;
    $subject = "$sender_username sent you a message.";
    $message = "<p>hi $reciever_username,</p>";
    $message .= "<p>Kindly check your messages, you might more messages unread</p>";
    $message .= "<p></p>";
    $message .= "<p>Thank You</p>";
    $message .= "<p>Pillersmaker</p>";

    emailSystem($to, $subject, $message);

  $msg="Message sent. ";
  $msgColor="success";

  //update statistic table in dailymessagesent
  require_once __DIR__ . '/updateDailyStatictics.php';
  $table = 'dailymessagesent';
  dailystatictic($table);
  

  echo "<script>location.href='/view/compose.php?msg=$msg&msgColor=$msgColor'</script>";
  
  //header('Location: /view/compose.php?msg='. $msg.'&msgColor='.$msgColor); 

