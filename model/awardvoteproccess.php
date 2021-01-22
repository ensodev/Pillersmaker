<?php if(!isset($_SESSION))
{
session_start();
}
?>
<?php require_once  __DIR__ . '/../controller/checkSessionContol.php';?>
<?php checkNotSession(); ?>
<?php require_once  __DIR__ . '/../controller/checkPaidMember.php'; ?>
<?php require_once 'connection.php'?>
<?php require_once 'pvctransfer.php';?>

<?php
// var_dump($_POST);
// exit();

if(!isset($_POST['submit']) || !isset($_POST['name']) || !isset($_POST['main_talent'])){
  echo "<script>location.href='/view/explore.php?votesucess=errorname'</script>";
  //header('Location: /view/explore.php?votesucess=errorname');
  exit();
}

$user_id = $_SESSION['USER_ID'];
$user_email = $_SESSION['USER_EMAIL'];
$apply_date = date('U');
$award_category = $_POST['main_talent'];
//search for candidate if found
$candidate = $_POST['name'];

 $sql = "SELECT * FROM register WHERE user_name =:candidate LIMIT 1";
 $stmt = $pdo->prepare($sql);
 $stmt->execute(['candidate'=>$candidate]);
 $resultCandidate = $stmt->fetch();

//  var_dump($resultCandidate);
//  exit();

 if(!isset($resultCandidate) || $resultCandidate == false){

  echo "<script>location.href='/view/explore.php?votesucess=errorname'</script>";
  //header('Location: /view/explore.php?votesucess=errorname');
   exit();
 }

 // candidate information
 
$candidate_id = $resultCandidate->id;
$candidate_email = $resultCandidate->email;
$candidate_user_name = $resultCandidate->user_name;

//get site setiings
 $sql = "SELECT * FROM sitesettings WHERE id = 1 LIMIT 1";
 $stmt = $pdo->prepare($sql);
 $stmt->execute();
 $resultAdmin = $stmt->fetch();

 if(!isset($resultAdmin->award_voting_amount))
 {
  echo "<script>location.href='/view/explore.php?votesucess=errorname'</script>";
  //header('Location: /view/explore.php?votesucess=errorname');
 }
//charge voter credit admin and add transaction history
$amount = $resultAdmin->award_voting_amount;
$sender = $user_email;
$receiver = $resultAdmin->admin_email;

transfer($amount, $sender, $receiver);

//add canditate to voting list
// $candidate_id = $resultCandidate->id;
// $candidate_email = $resultCandidate->email;
// $candidate_user_name = $resultCandidate->user_name;

$sql = "INSERT INTO awardvote
                      (voter_id, 
                      voter_email, 
                      voted_id, 
                      voted_email,
                      vote_category,
                      vote_date)
                VALUE (
                      :user_id, 
                      :user_email, 
                      :voted_id, 
                      :voted_email,
                      :vote_category,
                      :vote_date)";
 $stmt = $pdo->prepare($sql);

 $stmt->execute(['user_id'=>$user_id, 
                 'user_email'=>$user_email, 
                 'voted_id'=>$candidate_id, 
                 'voted_email'=>$candidate_email,
                 'vote_category'=>$award_category,
                 'vote_date'=>$apply_date]);

//direct back to vote page



//send message to admin
$msgTime = date("U");
$msg = "You just vote for someone and payment made.";
  //$msg = "<br>";
  $msg .= "Message Status -SENT- MEMBER TO ADMIN";
  $sender_id= 1234567890;
  $sender_username="Admin";
  $receiver_id = $_SESSION[USER_ID];
  $receiver_name = $_SESSION[USER_NAME];

  $msg_subject = "Notification on PVC you Paid on";
  $msg_message = "You just paid $amount PVC for voting application. 
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

// 
// $user_email = $_SESSION['USER_EMAIL'];


$candidate_email = $resultCandidate->email;
$candidate_user_name = $resultCandidate->user_name;
// $apply_date = date('U');
// $award_category = $_POST['main_talent'];
// //search for candidate if found
// $candidate = $_POST['name'];

$voter_name = $_SESSION['USER_NAME'];

require_once __DIR__ . "/emailSystem.php";
 $to = $candidate_email;
 $dater = date('D jS M Y');
 $subject = "You got a vote for $award_category on Pillersmaker.";
 $message = "<p>Hi $candidate_user_name,</p>";          
 $message .= "<p></p>";
 $message .= "<p>Congratulation, $voter_name voted for you on pillersmaker on $dater.</p>";
 $message .= "<p>Pillersmaker management project your winning an award this year on the platform .</p>";
 $message .= "<p></p>";
 $message .= "<p>Thank You</p>";
 $message .= "<p>Management <br>Pillersmaker</p>";

 emailSystem($to, $subject, $message);

  //update statistic table in dailyawardvote
  require_once __DIR__ . '/updateDailyStatictics.php';
  $table = 'dailyawardvote';
  dailystatictic($table);
 
echo "<script>location.href='/view/explore.php?votesucess=yes'</script>";
//header('Location: /view/explore.php?votesucess=yes');

exit();

