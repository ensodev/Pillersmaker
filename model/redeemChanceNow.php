

<?php

require_once 'connection.php'; 
require_once  __DIR__ . '/../view/header2.php';
require_once  __DIR__ . '/../controller/checkSessionContol.php'; 
checkNotSession();

// var_dump($_POST);
// exit();

if(isset($_POST['submit'])){
$post_id = $_POST['post_id'];
$user_id =(int) $_POST['user_id'];
}

//checking for the right user
if($user_id != $_SESSION['USER_ID']){

  echo "
    <div class=''>
      <div class=''>
        Unauthorised user, this account could be ban...!
      </div>
    </div>
  ";
   exit();
}

//getting admin property
require_once 'getSettings.php';

if(!isset($resultSettings->pvc_redeem_rate) || $resultSettings->pvc_redeem_rate == 0 ){

  echo "
    <div class=''>
      <div class=''>
        Something whent wrong contact customer care please...!
      </div>
    </div>
  ";
}

//admin info from storage
$admin_email = $resultSettings->admin_email;
$admin_pvc_per_vote = $resultSettings->pvc_per_vote;
$admin_pvc_redeem_rate = $resultSettings->pvc_redeem_rate;
$admin_user_name = $resultSettings->admin_user_name;

//getting post information
$sql = "SELECT * FROM postworks WHERE id =:post_id AND user_id =:user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['post_id'=>$post_id, 'user_id'=>$user_id]);
$resultPostwork =$stmt->fetch();


//geting vote info
if(isset($resultPostwork)){
  $sql = "SELECT * FROM total_vote WHERE post_id =:post_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['post_id'=>$post_id]);
  $resultTotalVote =$stmt->fetch();

  //get record of redeem history
  $sql = "SELECT * FROM  redeem_user_table WHERE post_id =:post_id AND user_id =:user_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['post_id'=>$post_id, 'user_id'=>$user_id]);
  $resultRedeemHistory =$stmt->fetch();
}

//this is based on count and not on amount
if($resultTotalVote->total_vote > $resultRedeemHistory->total_amount_redeem){
  $availabeRedeem = $resultTotalVote->total_vote - $resultRedeemHistory->total_amount_redeem;
}else{
  $availabeRedeem = $resultRedeemHistory->total_amount_redeem - $resultTotalVote->total_vote;
}

// convert the charge to percentage
$chargess = $resultSettings->pvc_redeem_rate / 100; //0.12

// get the total charge on vote for the ost
$charges = ceil(($availabeRedeem * $resultSettings->pvc_per_vote ) * $chargess); //

$redeemable = $availabeRedeem;


$redeemableAmount = ceil(($resultSettings->pvc_per_vote * $availabeRedeem) - $charges);

 $dateid =  date('U');

 //getint token
 $transid2 = password_hash($dateid, PASSWORD_DEFAULT);
 $transid3 =  bin2hex(random_bytes(8));
 $mainTransId = "$dateid"."$transid2"."$transid3";

 //register transaction for sender into transaction history
 $sql = "INSERT INTO `view_coin_history` (
                       trans_date, 
                       transtype, 
                       point_email, 
                       amount, 
                       trans_id) 
                       VALUE(
                       :trans_date, 
                       :transtype, 
                       :point_email, 
                       :amount, 
                       :trans_id)";
 $sent = "Sent";
 $stmt = $pdo->prepare($sql);

 //getting admin username
 //$admin_user_name = $resultSettings->admin_user_name;
 $stmt->execute(['trans_date'=>$dateid, 
                 'transtype'=>'Sent', 
                 'point_email'=>$admin_email, 
                 'amount'=>$redeemableAmount, 
                 'trans_id'=>$mainTransId]);
 
 
 
 //register transaction for receiver into transaction history
 $sql = "INSERT INTO   `view_coin_history` (
                       trans_date, 
                       transtype, 
                       point_email, 
                       amount, 
                       trans_id) 
                       VALUE(
                       :trans_date, 
                       :transtype, 
                       :point_email, 
                       :amount, 
                       :trans_id)";
 $received = "Received";
 $stmt = $pdo->prepare($sql);
 $stmt->execute(['trans_date'=>$dateid, 
                 'transtype'=>'Received', 
                 'point_email'=>$_SESSION['USER_EMAIL'], 
                 'amount'=>$redeemableAmount, 
                 'trans_id'=>$mainTransId]);


 

 
 $email = $_SESSION['USER_EMAIL'];
 //create record for vote_coin_table

 $sql ="SELECT * FROM vote_coin_table WHERE user_id =:user_id";
 $stmt=$pdo->prepare($sql);
 $stmt->execute(['user_id'=>$user_id]);
 $resultGetDetails = $stmt->fetch();

$totalBal= $resultGetDetails->total_bal;
$totalReceived= $resultGetDetails->total_received;
//echo $redeemable;

//credit redeemed amount to user
 $nextBal = $totalBal + $redeemableAmount;
 $totalReceived = $totalReceived + $redeemableAmount;

 $sql = "UPDATE vote_coin_table
         SET total_received =:total_received, total_bal =:total_bal
         WHERE user_id =:user_id AND user_email =:user_email";
 $stmt = $pdo->prepare($sql);

 $stmt->execute(['total_received'=>$totalReceived, 'total_bal'=>$nextBal, 'user_id'=>$user_id, 'user_email'=>$email]);

 //update redeem user table
 $totalRdm = $resultRedeemHistory->total_amount_redeem + $availabeRedeem;
 $totalTime = $resultRedeemHistory->redeem_total_time + 1;

 //update redeem table
 $sql = "UPDATE redeem_user_table
         SET last_amount_redeem = $availabeRedeem, 
             total_amount_redeem = $totalRdm, 
             redeem_total_time = $totalTime
        WHERE post_id =:post_id AND user_id =:user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['post_id'=>$post_id, 'user_id'=>$user_id]);


//update redeem admin
//get admin record

$admin_email = $resultSettings->admin_email;

$sql ="SELECT * FROM vote_coin_table WHERE user_email = :email";
$stmt=$pdo->prepare($sql);
$stmt->execute(['email'=>$admin_email]);
$resultAdmin = $stmt->fetch();

//  var_dump($resultAdmin);
//  exit();
$adminEmail = $resultAdmin->user_email;
$totalSent = $resultAdmin->total_sent;
$totalBal = $resultAdmin->total_bal;

//admin should add charges to total received
$totalReceived = $resultAdmin->total_received;;

$totalSent = $totalSent + $redeemableAmount; 
$totalBal = $totalBal - $redeemableAmount;
$totalReceived =$resultAdmin->total_received + $charges;

$sql = "UPDATE vote_coin_table
       SET total_sent = $totalSent, total_bal = $totalBal, total_received = $totalReceived
       WHERE user_email =:user_email";

$stmt = $pdo->prepare($sql);
$stmt->execute(['user_email'=>$adminEmail]);



//NOTE: this must send a notification msg for redeed vote


// send message to both receiver and the sender
$amount = $redeemableAmount;
$receiver_email = $email;
$receiver_id = $user_id;

$resultPostwork->topic;

$msgInfo = "Redeem action of $amount on post topic" ."<br>";

$msgInfo .= "$resultPostwork->topic" ."<br>";
$msgInfo .= "Transfer status Received, Admin to Member";

require_once  __DIR__ . '/../model/sendMessageFunction.php';
messageAuto($amount, $receiver_email, $receiver_id, $msgInfo , $reg = false);

//email must be sent to admin and user that just redeemed

//User email
require_once __DIR__ . "/emailSystem.php";

//send message to sender
$to = $_SESSION['USER_EMAIL'];
$subject = "You redeemed PVC on one of your post.";
$user_name = $_SESSION['USER_NAME'];
$message = "<p>Hi $user_name</p>";
$msgDate =  date('D jS M Y');
$message .= "<p>This is to inform you of the your redeem transaction has been proccesd on post title</p>";
$message .= "<p>$resultPostwork->topic</p>";
$message .= "<p>You recieved the total of $amount'PVC on the post on $msgDate</p>";
$message .= "<p></p>";
$message .= "<p>Thank You</p>";
$message .= "<p>Pillersmaker Management</p>";

emailSystem($to, $subject, $message);


require_once __DIR__ . "/emailSystem.php";

//send message admin
$to = "$admin_email";
$subject = "$user_name just redeemed $amount'PVC.";

$message = "<p>Hi $admin_user_name</p>";
$msgDate =  date('D jS M Y');
$message .= "<p>This is to inform you of the transaction that just take place on pillersmaker</p>";
$message .= "<p>$user_name, just redeemed the total of $amount'PVC on a post title </p>";
$message .= "<p>$resultPostwork->topic with the post id of $post_id</p>";
$message .= "<p>Thank You</p>";
$message .= "<p>Pillersmaker Management</p>";

emailSystem($to, $subject, $message);


// header("Location: /view/redeemVoteChance?redeemed=$redeemable");
echo "<script>location.href='/view/redeemVoteChance.php?postId=$post_id&user_id=$user_id&redeemed=$redeemable'</script>";
//header("Location: /view/redeemVoteChance?postId=$post_id&user_id=$user_id&redeemed=$redeemable");

exit();

