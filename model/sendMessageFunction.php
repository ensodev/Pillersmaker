<?php 

//This function is to notify member that he/she has just recieved some PVC.
function messageAuto($amount, $receiver_name, $receiver_id, $msg, $reg = true){
  
    require_once 'connection2.php';

    // set DSN
    $dsn = 'mysql:host='.$host .';dbname='.$dbname;

    $pdo = new PDO ($dsn, $user, $password);
    
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    require_once 'getSettings.php';
    
    // $sql = "SELECT `admin_user_name` FROM `sitesettings` WHERE id = 1";
    // $stmt=$pdo->prepare($sql);
    // $stmt->execute();
    // $resultSettings = $stmt->fetch();

    //checking if this file is not loaded from registration process
    if($reg != true){

      $sender = $_SESSION['USER_NAME'];
      $sender_id = $_SESSION['USER_ID'];

     
    }else{
      //checking if this file is loaded from registration process
      if(isset($resultSettings)){
        $sender = $resultSettings->admin_user_name;
        $sender_id = 1234567890;
      }else{
        $sender ="Pillermaker";
        $sender_id = 1234567890;
      }
    }
  //receiver_id 
  //$msg = $msg;
  //$sender ="Pillerz";
  $amount = $amount;
  $receiver_id = $receiver_id;
  
  $receiver_name = $receiver_name;
  $msgTime = date("U");
  //$msgTime = date("m/d/y G.i:s","$msg_time");
  
  $sender_username = $sender;
  
  $msg = $msg;
  

  $msg_subject = "Notification on PVC you received on";
  $msg_message = "You just received $amount'PVC. 
  PZtag1p class='text-danger'PZtag2 
  Notification on PVC you received on $msgTime, 
  kindly check the transaction ID on your sent pvc.
  PZtag1/pPZtag2 
  
  PZtag1pPZtag2 

  $msg
  PZtag1/pPZtag2
  ";
  $msg_mark_read = 0;
  
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
                  'receiver_id'=>$receiver_id,
                  'receiver_name'=>$receiver_name,
                  'msg_subject'=>$msg_subject,
                  'msg_message'=>$msg_message, 
                  'msg_mark_read'=>$msg_mark_read,
                  'msg_time'=>$msgTime]);


//NOTE: Send Notification of sent pvc to sender code here
//incase of new member registration the admin is the sender
$msg = "Transfer status Sent, Member to Member";

$msg_subject = "Notification on PVC you SENT on";

$msg_message = "You just SENT $amount'PVC. 
  PZtag1p class='text-danger'PZtag2 
  Notification on PVC you SENT on $msgTime, 
  kindly check the transaction ID on your sent pvc.
  PZtag1/pPZtag2 
  
  PZtag1pPZtag2 
  $msg
  PZtag1/pPZtag2
  ";

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
                  'receiver_id'=>$sender_id,
                  'receiver_name'=>$sender_username,
                  'msg_subject'=>$msg_subject,
                  'msg_message'=>$msg_message, 
                  'msg_mark_read'=>$msg_mark_read,
                  'msg_time'=>$msgTime]);

}