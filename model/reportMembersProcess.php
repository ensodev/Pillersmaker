<?php if(!isset($_SESSION))
{
session_start();
}
?> 

<?php
  //The logic here is the same with that of Customer Care
 
  require_once "connection.php";
  require_once  __DIR__ . '/../others/alertFunction.php';


  if(!isset($_POST['submit'])){
    $msg="Please fill the right form. ";
    $msgColor="danger";
    msgAlert($msg, $msgColor);  
    exit();
  }

  if($_POST['message'] == "" || !isset($_POST['message'])){
    $msg="Please fill in your Report. ";
    $msgColor="danger";
    msgAlert($msg, $msgColor);
    exit();  
  }
  
  if($_POST['accused'] == "" || !isset($_POST['accused'])){
    $msg="Please fill in your Details. ";
    $msgColor="danger";
    msgAlert($msg, $msgColor);
    exit();  
  }
  
  $user_id = $_SESSION['USER_ID'];
  $user_name = $_SESSION['USER_UNAME'];
  $time_post = time();

  //get admin info
  require_once __DIR__ . '/getSettings.php';
  $next_post;

  if(!isset($resultSettings->msg_time_interval)){
    global $next_post;
    $next_post = time() + 120;
  }else{
    global $next_post;
    $next_post = time() + $resultSettings->msg_time_interval;
  }
  // echo $time_post;
  // echo "<br>";
  // echo $next_post;
  // exit();

  $accused = $_POST['accused'];
  $message = $_POST['message'];

  $replaceContent = array(';','--','<','>','/','=','-','!', "\"");
  $replaceMent ="";
  $topic = str_replace($replaceContent, $replaceMent, $accused);

   
  $msg_message = $message;

  require_once __DIR__ . "/msgReformat.php";

  $message = $articleMessage;


  $sql="SELECT * FROM `register` WHERE user_name =:user_name LIMIT 1";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['user_name'=>$accused]);
  $resultAccused=$stmt->fetch();

    if(!$resultAccused){ 
      echo "<script>location.href='/view/reportMembers.php?errorAccused=1'</script>";
      //header ('Location: /view/reportMembers.php?errorAccused=1'); 
      exit();
    }

  //search for the repoters record in report table
  $sql="SELECT * FROM `reportmembers` WHERE user_id =:user_id ORDER BY id DESC LIMIT 1";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['user_id'=>$user_id]);
  $result=$stmt->fetch();

  // if the user did not have exiting report then insert new record
  if(!$result){
    $sql = "INSERT INTO reportmembers(user_id, user_name, accused, message, time_post, next_post) VALUE(:user_id, :user_name, :accused, :message, :time_post, :next_post)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id'=>$user_id, 'user_name'=>$user_name, 'accused'=>$accused, 'message'=>$message, 'time_post'=>$time_post, 'next_post'=>$next_post]);

    
    //send email to admin and customer care
    require_once __DIR__ . "/emailSystem.php";
    $to = $resultSettings->admin_email;
    $subject = "$accused has been reported on pillersmake.";
    $message = "<p>hi Pillerz</p>";
    $message .= "<p>$user_name just report $accused of the following</p>";
    $message .= "<p></p>";
    $message .= "<p>$message</p>";
    $message .= "<p></p>";
    $message .= "<p>Thank You</p>";
    $message .= "<p>PMRobot</p>";

    emailSystem($to, $subject, $message);

    
    require_once __DIR__ . '/../view/header3.php';
      echo "<div class='container mt-4 text-center'>
          <div class='alert alert-warning'>
                User Reported and Neccessary action will be taken....!
                <a href='/view/reportMembers.php'>Back to profile</a>
          </div>
        </div>
      "; 
      exit();
  }
  
  /**if the reporter has a record in the report table then check the
   * check the last time he sent record
   */

  if($result->next_post > $time_post){

      require_once __DIR__ . '/../view/header3.php';
      echo "<div class='container mt-4 text-center'>
          <div class='alert alert-warning'>
                Wait for few minute to send your next message....
                <a href='/view/reportMembers.php'>Back to profile</a>
          </div>
        </div>
      ";
      exit();
      
    
  }else{

    //if the time has expired the give chance to enter new record

    $sql = "INSERT INTO reportmembers(user_id, user_name, accused, message, time_post, next_post) VALUE(:user_id, :user_name, :accused, :message, :time_post, :next_post)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id'=>$user_id, 'user_name'=>$user_name, 'accused'=>$accused, 'message'=>$message, 'time_post'=>$time_post, 'next_post'=>$next_post]);

    
    //send email to admin and customer care
    require_once __DIR__ . "/emailSystem.php";
    $to = $resultSettings->admin_email;
    $subject = "$accused has been reported on pillersmake.";
    $message = "<p>hi Pillerz</p>";
    $message .= "<p>$user_name just report $accused of the following</p>";
    $message .= "<p></p>";
    $message .= "<p>$message</p>";
    $message .= "<p></p>";
    $message .= "<p>Thank You</p>";
    $message .= "<p>PMRobot</p>";

    emailSystem($to, $subject, $message);

    require_once __DIR__ . '/../view/header3.php';
      echo "<div class='container mt-4 text-center'>
          <div class='alert alert-warning'>
                User Reported and Neccessary action will be taken ....
                <a href='/view/profile.php'>Back to profile</a>
          </div>
        </div>
      ";
      exit();
  }


