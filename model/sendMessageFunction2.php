<?php
// this file handle ordinary message from admin or member to members

function messageAuto(
  $posterName,
  $posterId,
  $postId,
  $postTitle,
  $userId,
  $userNumber,
  $userName,
  $messsage,
  $userEmail,
  $service
){
  // var_dump($details);
  // exit();
  $service = $service;
  $userEmail = $userEmail;
  
  $user_email = $_SESSION['USER_EMAIL'];
  
  
    require_once 'connection2.php';

    // set DSN
    $dsn = 'mysql:host='.$host .';dbname='.$dbname;

    $pdo = new PDO ($dsn, $user, $password);
    
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
   
        $sender =$userName;
        $sender_id = $userId;
        
  //receiver_id 
  //$msg = $msg;
  //$sender ="Pillerz";
  
  $postTitle = $postTitle;
  
  $posterName = $posterName;
    
  //$msgTime = date("m/d/y G.i:s","$msg_time");
  
  $sender_username = $sender;

  if($service == 'job'){
    $msg_subject = "Notification on one of your sale/service post";
  }else{
    $msg_subject = "Notification on one of your Employement/Job post";
  }
  
  $msgTime = date("d/m/y G.i:s");
  $msg_message = " $userName contacted you base on your post ..";

  $msg_message .= "PZtag1iPZtag2 PZtag1a href='http://pillersmaker/view/viewPost.php?postid=$postId&user_id=$posterId'PZtag2 '$messsage on  $msgTime'. .. PZtag3aPZtag2 PZtag3iPZtag2
                ";
  $msg_message .= " the following are his details";
  $msg_message .= " ..Username: $userName.";
  $msg_message .= " ..Mobile: $userNumber.";
  $msg_message .= " ..Email: $user_email. ..";
  $msg_message .= " Kindly contact the PZtag1a href='http://pillersmaker/model/searchProfileProcess.php?id=$userId'PZtag2 $userName PZtag3aPZtag2 back";  
  $msg_mark_read = 0;

  //Note if the format of this time is change of the following line is deleted
  //there will be error when user reads the message sent
  $msgTime = date("U");
  
  $sql = "INSERT INTO messages(user_name,
                      sender_id, 
                      reciever_id, 
                      reciever_name,
                      msg_subject, 
                      msg_message, 
                      msg_mark_read,
                      msg_time)

          VALUE(:user_name,
                :sender_id, 
                :receiver_id,
                :receiver_name, 
                :msg_subject, 
                :msg_message, 
                :msg_mark_read,
                :msg_time)";



  $stmt = $pdo->prepare($sql);
  $stmt->execute(['user_name'=>$sender_username,
                  'sender_id'=>$sender_id,
                  'receiver_id'=>$posterId,
                  'receiver_name'=>$posterName,
                  'msg_subject'=>$msg_subject,
                  'msg_message'=>$msg_message, 
                  'msg_mark_read'=>$msg_mark_read,
                  'msg_time'=>$msgTime]);


//send email to user if not online
                  require_once __DIR__ . "/emailSystem.php";

                  $to = $userEmail;
                  $subject = "$sender_username send you a message.";
                  $msg_message;
                  
                  $msg_message .= "<p>Kindly check your messages, you might more messages unread</p>";
                  $msg_message .= "<p></p>";
                  $msg_message .= "<p>Thank You</p>";
                  $msg_message .= "<p>Pillersmaker</p>";
              
                  emailSystem($to, $subject, $msg_message);

if(isset($service)){
  echo "<script> location.href='/../view/viewPost.php?postid=$postId&user_id=$posterId&done=$service'</script>";
}

}