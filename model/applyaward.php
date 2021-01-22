<?php 

session_start();
require_once __DIR__ . '/../controller/checkSessionContol.php';
checkNotSession();
require_once __DIR__ . '/../controller/checkPaidMember.php';
 

 require_once __DIR__ . '/../model/connection.php';
 

 require_once __DIR__ . '/../model/pvctransfer.php';


 //this will help to redirect to pages
 

 require_once __DIR__ . '/../getPath.php';
 //ends 


 //echo $viewPath;
 //exit();

 $award = $_GET['applyaward'];
 $award_list = array('bestdancer', 'bestsinger','bestrapper','bestcomedian', 'bestactor', 'motivationalspeaker', 'motivationalwriter', 'graphicdeigner', 'bestphotograher', 'bestpaintingartist', 'bestpenartist', 'bestbodypainter', 'besthousepainter','besttailor', 'bestbeadmaker', 'bestfashiondesigner', 'bestbarber', 'besthairstylist', 'bestmakeupartist', 'bestinteriordecorator');

if( !isset($_GET['applyaward'])){
      echo "<script>location.href='/view/noPage.html'</script>";
      //header("Location: $viewPath/noPage.html");
      exit();
}


//if the award is not in the list
if(!in_array($award, $award_list)){
     echo "<script>location.href='/view/noPage.html'</script>";
      //header("Location: $viewPath/noPage.html");
     exit();
 }
 

 $user_id = $_SESSION['USER_ID'];
 $user_email = $_SESSION['USER_EMAIL'];
//  echo $user_email;
//  exit();
 $apply_date = date('U');

//  var_dump($apply_date);
//  exit();


//confirm user exist for secure transaction
 $sql = "SELECT id FROM register WHERE email =:email AND id =:id LIMIT 1";
 $stmt = $pdo->prepare($sql);
 $stmt->execute(['email'=>$user_email,'id'=>$user_id]);
 $result = $stmt->fetch();


 if(!isset($result)){
    echo "<script>location.href='/view/noPage.html'</script>";
    //header('Location: /view/noPage.html');
   exit();
 }

//pay admin for apply for award
//get amount from the to pay from the award
$sql = "SELECT * FROM sitesettings WHERE id = 1 LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultAdmin = $stmt->fetch();


if(!isset($resultAdmin->award_applied_amount))
{
      echo "<script>location.href='/view/noPage.html'</script>";
      //header('Location: /view/noPage.html');
      exit();
}


$apply_amount_pvc = $resultAdmin->award_applied_amount;
$sender_email = $_SESSION['USER_EMAIL'];
$receiver_email = $resultAdmin->admin_email;

transfer($apply_amount_pvc, $sender_email, $receiver_email);
echo 'am here11b';
//update awardapply table
 $sql = "INSERT INTO awardapply
                      (user_id, 
                      user_email, 
                      apply_date, 
                      award)
                VALUE (:user_id, 
                      :user_email, 
                      :apply_date, 
                      :award)";
 $stmt = $pdo->prepare($sql);

 $stmt->execute(['user_id'=>$user_id, 
                 'user_email'=>$user_email, 
                 'apply_date'=>$apply_date, 
                 'award'=>$award]);


//SEND TRANSACTION MSG

  $amount = $resultAdmin->award_applied_amount;
  $receiver_id = $_SESSION['USER_ID'];
  
  $receiver_name =  $_SESSION['USER_NAME'];
  $msgTime = date("U");
  //$msgTime = date("m/d/y G.i:s","$msg_time");
  $sender_id = 1234567890;
  $sender_username = $resultAdmin->admin_user_name;
  
  $msg = "You just applied for Award and payment made.";
  //$msg = "<br>";
  $msg .= "Message Status -SENT- MEMBER TO ADMIN";
  

  $msg_subject = "Notification on PVC you Paid on";
  $msg_message = "You just paid $amount PVC for   $award award application. 
  PZtag1p class='text-danger' PZtag2 
  Notification on PVC you SENT on $msgTime, 
  kindly check the transaction ID on your sent pvc.
  PZtag1/pPZtag2 
  $msg";

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

//end msg sent

 //send message to the applicant
 require_once __DIR__ . "/emailSystem.php";
 $to = $user_email;
 $dater = date('D jS M Y');
 $user_name = $_SESSION['USER_NAME'];
 $subject = "Your Award apllication received and payment recieved.";
 $message = "<p>Hi $user_name,</p>";          
 $message .= "<p></p>";
 $message .= "<p>This is to inform you that your  $award award application has been received on $dater.</p>";
 $message .= "<p>Total of $amount'PVC was deducted for the  $award award application .</p>";
 $message .= "<p></p>";
 $message .= "<p>Thank You</p>";
 $message .= "<p>Pillersmaker Management</p>";

 emailSystem($to, $subject, $message);

 //update statistic table in dailyawardapply
 require_once __DIR__ . '/updateDailyStatictics.php';
 $table = 'dailyawardapply';
 dailystatictic($table);

 //exit();
echo "<script>location.href='/view/explore.php?appliedsucess=yes'</script>";
//header('Location: /view/explore.php?appliedsucess=yes');



