<?php 


  //require_once 'connection.php';

  //NOTE: Makesure that $sender account is not the same as admin-email
 
function transfer($amount, $sender, $receiver){

    
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $dbname = 'pillers';

    // $host = 'localhost';
    // $user = 'pillersm_omoRoot';
    // $password = 'Y@=mWjOZM1)2';
    // $dbname = 'pillersm_pillers';

    // set DSN
    $dsn = 'mysql:host='.$host .';dbname='.$dbname;

    $pdo = new PDO ($dsn, $user, $password);
    
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


  if($amount == '' || $sender =='' || $receiver ==''){

    echo "<script>location.href='/view/explore.php?appliedsucess=error'</script>";
    //header('Location: /view/explore.php?appliedsucess=error');
    exit();
  }

  $amount = $amount;
  $sender_email = $sender;
  $sender_id = $_SESSION['USER_ID'];
  $receiver_email = $receiver;
  $transfer_date = date('U');
  

  //get check sender pvc info bal
  $sql = "SELECT * FROM vote_coin_table WHERE  user_id=:user_id AND user_email =:sender";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['user_id'=>$_SESSION['USER_ID'], 'sender'=>$sender_email]);
  $resultSender = $stmt->fetch();

  //var_dump($resultSender);
  // exit();


  if(!isset($resultSender)){

    echo "<script>location.href='/view/explore.php?appliedsucess=error'</script>";
    //header('Location: /view/explore.php?appliedsucess=error');
    exit();
  }


  if($resultSender->total_bal  <= $amount){
    echo "<script>location.href='/view/explore.php?appliedsucess=errorBal'</script>";
    //header('Location: /view/explore.php?appliedsucess=errorBal');
    exit();
  }
  
  $sender_total_bal = $resultSender->total_bal;
  $sender_total_sent = $resultSender->total_sent;

  //check receiver info as valid user or ban
  $sql="SELECT * FROM register WHERE email =:receiver";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['receiver'=>$receiver_email]);
  $resultReceiver = $stmt->fetch();

  // var_dump($resultReceiver);
  // exit();

  if(!isset($resultReceiver)){

    echo "<script>location.href='/view/explore.php?appliedsucess=errorReceiver'</script>";
    //header('Location: /view/explore.php?appliedsucess=errorReceiver');
    exit();
  }

  //get and check reciever pvc info
  $sql="SELECT * FROM vote_coin_table WHERE  user_id=:receiver AND user_email =:receiver_email";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['receiver'=>$resultReceiver->id, 'receiver_email'=>$receiver_email]);
  $resultReceiverRd = $stmt->fetch();

  // var_dump($resultReceiverRd);
  // exit();

  if(!isset($resultReceiverRd)){

    echo "<script>location.href='/view/explore.php?appliedsucess=errorReceiver'</script>";
    //header('Location: /view/explore.php?appliedsucess=errorReceiver');
    exit();
  }

  $receiver_total_bal = $resultReceiverRd->total_bal;
  $receiver_total_received = $resultReceiverRd->total_received;

  //update sender
  $amount;
  $sender_total_bal = $resultSender->total_bal - $amount;
  $sender_total_sent = $resultSender->total_sent + $amount;
  $sender_email;
  
  $sql = "UPDATE vote_coin_table
          SET     total_sent = $sender_total_sent, 
                  total_bal = $sender_total_bal 
          WHERE   user_id = $sender_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
     
  //update reciever
  $receiver_total_bal = $resultReceiverRd->total_bal + $amount;
  $receiver_total_received = $resultReceiverRd->total_received + $amount;

  $sql = "UPDATE vote_coin_table
            SET total_received =:total_received, total_bal =:total_bal
            WHERE user_email =:receiver_email";

  $stmt = $pdo->prepare($sql);
  $stmt->execute(['total_received'=>$receiver_total_received, 'total_bal'=>$receiver_total_bal, 'receiver_email'=>$receiver_email]);

  //update history

  $dateid =  date('U');

    $transid2 = password_hash($dateid, PASSWORD_DEFAULT);
    $transid3 =  bin2hex(random_bytes(8));
    $mainTransId = "$dateid"."$transid2"."$transid3";
    
    // var_dump($mainTransId);
    // exit();
    
   
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
    $stmt->execute(['trans_date'=>$dateid, 
                    'transtype'=>'Sent', 
                    'point_email'=>$sender_email, 
                    'amount'=>$amount, 
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
                    'point_email'=>$receiver_email, 
                    'amount'=>$amount, 
                    'trans_id'=>$mainTransId]);
    //exit();
}