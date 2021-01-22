<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php
require_once 'connection.php';

if(!isset($_POST) || !isset($_POST['submit'])){

  echo "<script>location.href='/view/sellPvCoin.php?error=submit'</script>";
  //header('Location: /view/sellPvCoin.php?error=submit');
  exit();
}

if(!isset($_POST['amount']) || !isset($_POST['receiver_email']) || $_POST['amount']=='' || $_POST['amount'] == NULL){
  echo "<script>location.href='/view/sellPvCoin.php?error=field'</script>";
  //header('Location: /view/sellPvCoin.php?error=field');
  exit();
}

if(!isset($_POST['receiver_email']) || $_POST['receiver_email']=='' || $_POST['receiver_email'] == NULL){
  echo "<script>location.href='/view/sellPvCoin.php?error=field</script>";
  //header('Location: /view/sellPvCoin.php?error=field');
  exit();
}

if(!isset($_POST['pin']) || $_POST['pin'] ==''|| $_POST['pin'] == null){
  echo "<script>location.href='/view/sellPvCoin.php?error=field</script>";
  //header('Location: /view/sellPvCoin.php?error=field');
  exit();
}

$pin = (int) $_POST['pin'];

if($pin == 0000){
  require_once  __DIR__ . '/../view/header3.php';
  echo "
      <div class='container text-center'>
        <div class='container alert alert-info'>
          You can't use default pin for transaction...Contact <a href='../view/customerCare.php'>Customer Care..!</a>
          
        </div>

      </div>
  
  ";
  exit();
}

//check if pin is correct
$user_id = $_SESSION['USER_ID'];

$sql = "SELECT * FROM `pvcpin` WHERE user_id =:user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$resultPin = $stmt->fetch();

if($resultPin->pin != $pin){
  
  require_once  __DIR__ . '/../controller/logoutControl.php';
  exit();
}

//NOTE: Authenticate pin code should go here

//

 $amount = (int)$_POST['amount'];
 if($amount <= 0){
  
  echo "<script>location.href='/view/sellPvCoin.php?error=not1'</script>";
  //header('Location: /view/sellPvCoin.php?error=not1');
  exit();
 }

 //Check if amount is more than one
 //this should not be hard coded

 require_once __DIR__ . "/getSettings.php";
 if(!isset($resultSettings->max_pvc_send)){
    require_once  __DIR__ . '/../view/header3.php';
    echo "
        <div class='container text-center'>
          <div class='container alert alert-info'>
            PVC transaction disabled try back in few minutes or contact <a href='../view/customerCare.php'>Customer Care..!</a>
            
          </div>

        </div>
    
    ";
    exit();
 }
 if($amount > $resultSettings->max_pvc_send){
  echo "<script>location.href='/view/sellPvCoin.php?error=tooMuch'</script>";
  //header('Location: /view/sellPvCoin.php?error=tooMuch');
  exit();
 }

//usefull reciever email
$receiver_email = $_POST['receiver_email'];

//checking if sender have enough balance

 
$sql = "SELECT * FROM `vote_coin_table` WHERE user_email =:email";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email'=>$_SESSION['USER_EMAIL']]);
$resultSenddetails = $stmt->fetch();

// var_dump($resultSenddetails);
// exit();

if($resultSenddetails){
  
  if($resultSenddetails->total_bal <= $amount){
    echo "<script>location.href='/view/sellPvCoin.php?error=balance'</script>";
    //header('Location: /view/sellPvCoin.php?error=balance');
    exit();
  }
}

//checking user sending to self
$sender_email = $_SESSION['USER_EMAIL'];
 if($receiver_email == $sender_email){
  echo "<script>location.href='/view/sellPvCoin.php?error=sendself'</script>";
  //header('Location: /view/sellPvCoin.php?error=sendself');
   exit();
 }

 //checking if the user exist
$sql = "SELECT * FROM `vote_coin_table` WHERE user_email =:email";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email'=>$receiver_email]);
$resultSendPVcoin = $stmt->fetch();

// if not user
if(!$resultSendPVcoin){
  echo "<script>location.href='/view/sellPvCoin.php?error=usernotfound'</script>";
  //header('Location: /view/sellPvCoin.php?error=usernotfound');
}else{

//if user found then  get user info
//MAIN TRANSACTION TAKE PLACE
$received_total_received = $resultSendPVcoin->total_received;
$received_total_bal = $resultSendPVcoin->total_bal;

//CREDIT RECIEVER
$received_total_received += $amount;
$received_total_bal += $amount;

//DEBIT THE GIVER
$sender_bal = $resultSenddetails->total_bal - $amount;
$sender_sent = $resultSenddetails->total_sent + $amount;
$sender_id = $_SESSION['USER_ID'];
 

//INPUT THE DEBIT TRANSACTION INTO DATABASE
$sql = "UPDATE `vote_coin_table` SET total_sent =:sender_sent,
                                     total_bal =:sender_bal 
                                     WHERE user_id =:sender_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['sender_sent'=>$sender_sent, 'sender_bal'=>$sender_bal, 'sender_id'=>$sender_id]);

//INPUT THE CREDIT TRANSACTION INTO DATABASE
$sql = "UPDATE `vote_coin_table` SET total_received =:total_received, total_bal =:total_bal WHERE user_email =:user_email";
$stmt = $pdo->prepare($sql);
$stmt->execute(['total_received'=>$received_total_received, 'total_bal'=>$received_total_bal, 'user_email'=>$receiver_email]);
  
//get transaction id
$dateid =  date('U');
 
$transid2 = password_hash($dateid, PASSWORD_DEFAULT);
$transid3 =  bin2hex(random_bytes(8));
$mainTransId = "$dateid"."$transid2"."$transid3";
$remove = '/';
$replace = 'XYZ';
$mainTransId = str_replace($remove, $replace, $mainTransId);

$sent = "Sent";    
$received = "Received";


//register history transaction for sender into transaction history
require_once  __DIR__ . '/../model/TransferHistoryRegisterTransaction.php';
TransferHistoryRegisterTransaction($dateid, $received, $receiver_email, $amount, $mainTransId, $sent, $sender_email, $amount);

// send message to both receiver and the sender
$receiver_id = $resultSendPVcoin->user_id;

//NOTE:- Rewrite to dectect if its the admin that is sending message
$msgInfo = "Transfer status Received, Member to Member";

require_once  __DIR__ . '/../model/sendMessageFunction.php';
messageAuto($amount, $receiver_email, $receiver_id, $msgInfo , $reg = false);


//record daily transaction staticstic
require_once __DIR__ . '/updateDailyStatictics.php';
$table = 'dailypvctransac';
dailystatictic($table);



require_once __DIR__ . "/emailSystem.php";

//send message to sender
$to = $_SESSION['USER_EMAIL'];
$subject = "You sent PVC transaction.";
$user_name = $_SESSION['USER_NAME'];
$message = "<p>Hi $user_name</p>";
$msgDate =  date('D jS M Y');
$message .= "<p>This is to inform you of the transaction that just take place in your account</p>";
$message .= "<p>You sent the total of $amount'PVC to $receiver_email on $msgDate</p>";
$message .= "<p></p>";
$message .= "<p>Thank You</p>";
$message .= "<p>Pillersmaker Management</p>";

emailSystem($to, $subject, $message);

//send message to reciever
$to = $receiver_email;
$senderPVC =  $_SESSION['USER_NAME'];
$subject = "You Received PVC transaction.";
    
$message = "<p>Hi $to</p>";
$message .= "<p>This is to inform you of the transaction that just take place in your PVC account</p>";
$message .= "<p>You received the total of $amount'PVC from $senderPVC on $msgDate</p>";
$message .= "<p></p>";
$message .= "<p>Thank You</p>";
$message .= "<p>Pillersmaker Management</p>";

emailSystem($to, $subject, $message);

echo "<script>location.href='/view/sellPvCoin.php?pvcoinsent=yes'</script>";
//header('Location: /view/sellPvCoin.php?pvcoinsent=yes');
exit();
}  