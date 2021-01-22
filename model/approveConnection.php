<?php if(!isset($_SESSION))
{
session_start();
}
?>
<?php
 
require_once "connection.php";

$user_id = $_SESSION['USER_ID'];
$friend_id = $_GET['id'];

$sql="SELECT * FROM connect_friend WHERE user_id =:friend_id AND friend_id=:user_id AND approved = 0";
$stmt=$pdo->prepare($sql);
$stmt->execute(['friend_id'=>$friend_id, 'user_id'=>$user_id]);
$resultApproved = $stmt->fetch();

// var_dump($resultApproved);
// exit();

if(isset($resultApproved)){
  //update $resultApproved->approved to 1
  //redirect back to same board

  $sql = "UPDATE connect_friend SET approved = 1
          WHERE user_id =:friend_id AND friend_id =:user_id";

  $stmt = $pdo->prepare($sql);
  $stmt->execute(['friend_id'=>$friend_id, 'user_id'=>$user_id]);

  /**
   * Getting full information of the person we want to 
   * disconnect from
   */
  $sql = "SELECT * FROM register WHERE id =:id LIMIT 1";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id'=>$friend_id]);
  $result_details = $stmt->fetch();

  $to = $result_details->email;
  $dater = date('D jS M Y');
  $user_name = $result_details->user_name;
  $subject = "$user_id Accepted your connection request.";
  $message = "<p>Hi $user_name,</p>";          
  $message .= "<p></p>";
  $message .= "<p>$user_id accepted your connection request on $dater.</p>";
  $message .= "<p>Your are now free to communicate with him anytime.</p>";
  $message .= "<p></p>";
  $message .= "<p><a href='http://www.pillersmaker.com.ng/view/login.php'>Click this link to login</a></p>";
  $message .= "<p></p>";
  $message .= "<p>Thank You</p>";
  $message .= "<p>Pillersmaker Management</p>";

    //send email to alert friend of your email connection
    require_once __DIR__ . "/emailSystem.php";
    emailSystem($to, $subject, $message);

  //update daily approve connection
  require_once __DIR__ . '/updateDailyStatictics.php';
  $table = 'dailyapproveconnection';
  dailystatictic($table);

    

  echo "<script>
          location.href='/view/unapprovedConnection.php?back=approved'
        </script>";
        //header('Location: /view/unapprovedConnection.php?back=approved');
        exit();

}else{
  echo "<script>
          location.href='/view/unapprovedConnection.php?back=error'
       </script>";
  //header('Location: /view/unapprovedConnection.php?back=error');
}


?>
