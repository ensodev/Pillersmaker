<?php
if(!isset($_GET['postId']) || !isset($_GET['user_id'])){

  echo "<script>location.href='/view/noPage.html'</script>";
  //header('Location: /view/noPage.html');
  exit();
}

//NOTE NOTE this inputs must be filtter

$post_id = $_GET['postId'];
$user_id = $_GET['user_id'];


$sql = "SELECT * FROM postworks WHERE id =:post_id AND user_id =:user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['post_id'=>$post_id, 'user_id'=>$user_id]);
$resultPostwork =$stmt->fetch();

if(!isset($resultPostwork) || $resultPostwork == false){
  echo "<script>location.href='/view/noPage.html'</script>";
  //header('Location: /view/noPage.html');
} 

if(isset($resultPostwork)){
  $sql = "SELECT * FROM total_vote WHERE post_id =:post_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['post_id'=>$post_id]);
  $resultTotalVote =$stmt->fetch();

  $sql = "SELECT * FROM  redeem_user_table WHERE post_id =:post_id AND user_id =:user_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['post_id'=>$post_id, 'user_id'=>$user_id]);
  $resultRedeemHistory =$stmt->fetch();
}

if(isset($resultTotalVote->total_vote)  && isset($resultRedeemHistory->total_amount_redeem)){

    $total_vote = $resultTotalVote->total_vote;  
    
    $total_amount_redeem = $resultRedeemHistory->total_amount_redeem;

    if($total_vote > $total_amount_redeem){
      $availabeRedeem = $total_vote - $total_amount_redeem;
    }else{
      $availabeRedeem = $total_amount_redeem - $total_vote;
    }
}else{
  $availabeRedeem = 0;
}

