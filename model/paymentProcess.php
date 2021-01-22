<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php

  require_once "connection.php";
  require_once __DIR__ . '/../others/alertFunction.php';

  if(!isset($_POST['submit'])){
    require_once __DIR__ . '/../view/header3.php';
    echo "
    <div class='container alert alert-success text-center'>
      Please fill the right form. 
    </div>    
  ";
 
  exit();
  }

  if($_POST['subject'] == ''){
    require_once __DIR__ . '/../view/header3.php';
    echo "
    <div class='container alert alert-success text-center'>
     you need to fill all the filled 
    </div>    
  ";
 
  exit();
  }

  if(str_word_count($_POST['subject']) > 20){
    require_once __DIR__ . '/../view/header3.php';
    echo "
    <div class='container alert alert-success text-center'>
      Subject can't be more than 20 words. 
    </div>    
  ";
 
  exit();
  }
 

  if(!isset($_POST['ticketid']) || $_POST['ticketid'] == ''){
    require_once __DIR__ . '/../view/header3.php';
    echo "
    <div class='container alert alert-success text-center'>
      Please input the ticket number. 
    </div>    
  ";
 
  exit();
  }

  if(!isset($_POST['message']) || $_POST['message'] == ''){
    require_once __DIR__ . '/../view/header3.php';
    echo "
    <div class='container alert alert-success text-center'>
      Please input details of the payment please.  
    </div>    
  ";
 
  exit();
  }


  $msg_service = $_POST['service'];
  $msg_subject = $_POST['subject'];
  $msg_details = $_POST['message'];
  $ticket_id = $_POST['ticketid'];


  $user_id = $_SESSION['USER_ID'];
  $user_name = $_SESSION['USER_UNAME'];
  $time_paid = time();
  $expired_date = date('U') + 31536000;


  //reformat the subject and messages before posting them

  $replaceContent = array("<script>", "</script>", "ipt>",';','--','<','>','/','=','-','!', "\"", "ript>", "/script>", "ipt>");
  $replaceMent ="";
  $msg_subject = str_replace($replaceContent, $replaceMent, $msg_subject);
  $msg_message = str_replace($replaceContent, $replaceMent, $msg_details);
  $ticket_id = str_replace($replaceContent, $replaceMent, $ticket_id);

  //remove tags from subject and replace it with PZtags codes
  require_once __DIR__ . "/msgReformat.php";
  $msg_details = $articleMessage;
  
  
  if($msg_subject == "" || $msg_details == ""){
    validateInput();
  }
    
  if($msg_service == "membershippayment" || $msg_service == "supportpayment" || 
      $msg_service == "advertismentpayment" || $msg_service == "otherspayment" || 
      $msg_service == "pvccoinpayment" || $msg_service == "pvccardpayment" || 
      $msg_service == "compititionpayment"){

    //check if payment messages have been sent before

    $sql = 'SELECT COUNT(*) FROM payments WHERE ticket_id =:ticket_id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['ticket_id'=>$ticket_id]);
    $resultPayments = $stmt->fetchColumn();

    if(isset($resultPayments) AND $resultPayments != false AND $resultPayments > 2){
      require_once __DIR__ . '/../view/header3.php';
      echo "
      <div class='container alert alert-success text-center'>
       Please Wait for feedback on ticket, or send message to customer care...!
      </div>    
    ";
      exit();
    }

    //finding if the user as generated this ticket
    $sql = 'SELECT * FROM paymentticket WHERE ticket_id =:ticket_id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['ticket_id'=>$ticket_id]);
    $resultTickets = $stmt->fetch();

    if(!isset($resultTickets) || $resultTickets == false){
      require_once __DIR__ . '/../view/header3.php';
      echo "
      <div class='container alert alert-success text-center'>
        Ticket not found...!  
      </div>    
    ";
 
  exit();
    }

    $sql = "INSERT INTO payments(user_id, user_name, msg_subject, msg_details, time_paid, ticket_id) VALUE (:user_id, :user_name, :msg_subject, :msg_details, :time_paid, :ticket_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id'=>$user_id, 'user_name'=>$user_name,'msg_subject'=>$msg_subject, 'msg_details'=>$msg_details, 'time_paid'=>$time_paid, 'ticket_id'=>$ticket_id]);

    $sql = "INSERT INTO `$msg_service`(user_id, time_paid, expired_date, ticket_id) VALUE (:user_id, :time_paid, :expired_date, :ticket_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id'=>$user_id, 'time_paid'=>$time_paid, 'expired_date'=>$expired_date, 'ticket_id'=>$ticket_id]);

    $msg = "Message sent, we are processing your detials";
    $msgColor="success";

    
    echo "<script>location.href='/view/payment.php?msg=$msg&msgColor=$msgColor'</script>";
    //header('Location: /view/payment.php?msg='. $msg.'&msgColor='.$msgColor);
    exit();

  }else{

  $msg = "Payment submission not successful, Please Kindly contact customer care for this kind of Payment</a>";
      $msgColor="warning";

      echo "<script>location.href='/view/payment.php?msg=$msg&msgColor=$msgColor'</script>";
     // header("Location: /view/payment.php?msg='. $msg.'&msgColor='.$msgColor");
      exit();
  }

?>
<?php

function validateInput(){

  $msg = "Error, Empty field and Special characters (!@#$%^&*:;,.<>?/' or tags are not allowed..";
  $msgColor="danger";

  echo "<script>location.href='/view/payment.php?msg=$msg&msgColor=$msgColor'</script>";
  //header('Location: /view/payment.php?msg='. $msg.'&msgColor='.$msgColor);
  exit();
  
}