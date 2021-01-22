<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php

 
  require_once "connection.php";
  require_once  __DIR__ . '/../others/alertFunction.php';


  if(!isset($_POST['submit'])){
    $msg="Please fill the right form. ";
    $msgColor="danger";
    msgAlert($msg, $msgColor);  
    exit();
  }
 
  if($_POST['message'] == "" || !isset($_POST['message'])){
    $msg="Please fill in your Message. ";
    $msgColor="danger";
    msgAlert($msg, $msgColor);
    exit();  
  }

  if($_POST['subject'] == "" || !isset($_POST['subject'])){
    $msg="Please fill in your Subject. ";
    $msgColor="danger";
    msgAlert($msg, $msgColor);
    exit();  
  }

  if($_POST['issue'] == "" || !isset($_POST['issue'])){
    $msg="Please Chose out of the options. ";
    $msgColor="danger";
    msgAlert($msg, $msgColor);
    exit();  
  }
  
  $user_id = $_SESSION['USER_ID'];
  $user_name = $_SESSION['USER_UNAME'];
  $time_post = time();


  //get web sittings
  require_once __DIR__ . '/getSettings.php';
  $next_post;

  if(!isset($resultSettings->msg_time_interval)){
    global $next_post;
    $next_post = time() + 120;
  }else{
    global $next_post;
    $next_post = time() + $resultSettings->msg_time_interval;
  }

  $subject = $_POST['subject'];
  $issue = $_POST['issue'];
  $message = $_POST['message'];

  $replaceContent = array(';','--', '<script>', '</script>','<','>','/','=','-','!', "\"", '^','(',')', '&', '*', '?');
  $replaceMent ="";
  $topic = str_replace($replaceContent, $replaceMent, $subject);

  $msg_message = $message;

  require_once __DIR__ . "/msgReformat.php";

  $message = $articleMessage;

 
  $sql="SELECT * FROM `customercare` WHERE user_id =:user_id ORDER BY id DESC LIMIT 1";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['user_id'=>$user_id]);
  $result=$stmt->fetch();

  // var_dump($result);
  // exit();

  if(!$result){
    $sql = "INSERT INTO customercare(user_id, user_name, subject, issue, message, time_post, next_post) VALUE(:user_id, :user_name, :subject, :issue, :message, :time_post, :next_post)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id'=>$user_id, 'user_name'=>$user_name, 'subject'=>$subject, 'issue'=>$issue, 'message'=>$message, 'time_post'=>$time_post, 'next_post'=>$next_post]);

     //send email to admin and customer care
     require_once __DIR__ . "/emailSystem.php";
     $to = $resultSettings->admin_email;
     $subject = "$user_name raised issue on $issue.";
     $message = "<p>hi Pillerz</p>";
     $message .= "<p>Issue is raised by $user_name on $issue</p>";
     $message .= "<p></p>";
     $message .= "<p>$message</p>";
     $message .= "<p></p>";
     $message .= "<p>Thank You</p>";
     $message .= "<p>PMRobot</p>";
 
     emailSystem($to, $subject, $message);
 
    $msg = "Your message sent";
    $msgColor ="success";

   echo "<script>location.href='/view/customerCare.php?msg=$msg&msgColor=$msgColor'</script>";
    exit();
  }
    
  if($result->next_post > $time_post){
      $msg="Wait for few minute to send your next message.";
      $msgColor="danger";
      header("Location: /view/customerCare.php?msg=$msg&msgColor=$msgColor"); 
      exit();

  }else{
   
    $sql = "INSERT INTO customercare(user_id, user_name, subject, issue, message, time_post, next_post) VALUE(:user_id, :user_name, :subject, :issue, :message, :time_post, :next_post)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id'=>$user_id, 'user_name'=>$user_name, 'subject'=>$subject,'issue'=>$issue, 'message'=>$message, 'time_post'=>$time_post, 'next_post'=>$next_post]);

    //send email to admin and customer care
    require_once __DIR__ . "/emailSystem.php";
    $to = $resultSettings->admin_email;
    $subject = "$user_name raised issue on $issue.";
    $message = "<p>hi Pillerz</p>";
    $message .= "<p>Issue is raised by $user_name on $issue</p>";
    $message .= "<p></p>";
    $message .= "<p>$message</p>";
    $message .= "<p></p>";
    $message .= "<p>Thank You</p>";
    $message .= "<p>PMRobot</p>";

    emailSystem($to, $subject, $message);

    $msg = "Your message sent";
    $msgColor ="success";

   echo "<script>location.href='/view/customerCare.php?msg=$msg&msgColor=$msgColor'</script>";
    //header("Location: /view/customerCare.php?msg=$msg&msgColor=$msgColor"); 
    exit();
  }


