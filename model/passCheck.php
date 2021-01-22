<?php
require_once  __DIR__ . '/../others/sessionProcess.php';
/*....................................................*/

if(isset($_POST['password'])){
  $password = $_POST['password'];
}

if(isset($_POST['email'])){
  $email = $_POST['email'];
}
 
if(isset($_SESSION['USER_EMAIL'])){
  $email = $_SESSION['USER_EMAIL'];
} 


$sql ="SELECT * FROM register WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email'=>$email]);
$result = $stmt->fetch();

if(empty($result)){
    
    sessionDie();
    $msg="User not recognised, please register or enter correct email...123 ";
    $msgColor="danger";
    msgAlert($msg, $msgColor);   
}

//check if account is ban
if($result->ban == 1){
  echo "<script>location.href='/view/banaccount.php?email=$email'</script>";
  //header("Location: /view/banaccount.php?email=$email");
  exit();
}


//check if account is ban
if($result->lockaccount == 1){
  echo "<script>location.href='/view/lockaccount.php?email=$email'</script>";
  //header("Location: /view/banaccount.php?email=$email");
  exit();
}


//check if ban time is over
$presentTime = date('U');
if($result->next_login > $presentTime){
  sessionDie();
  $msg="Account has been Ban for few hours. ";
  $msgColor="danger";
  msgAlert($msg, $msgColor); 
  exit();

}


//checking for correct password
if(!password_verify($password, $result->pass_word)){

      //Note that counting is from 0-1-2 which makes the user to enter the password three times
      if($result->login_error < 2){

        $login_error = $result->login_error + 1;

        $sql = "UPDATE register 
                SET login_error =:login_error
                WHERE email =:email ";
        $stmt=$pdo->prepare($sql);
        $stmt->execute(['login_error'=>$login_error, 'email'=>$email]);

     
      }

      
      if($result->login_error >=2 ){

        //get login_error_time or ban durration from the setting table
        $sql ="SELECT login_error_time FROM sitesettings WHERE id = 1";
        $stmt = $pdo->query($sql);
        $stmt->execute();
        $result = $stmt->fetch();

       

        if(!isset($result) || $result == false){
          $msg="Something went wrong kindly report this error to <a href='../view/customerCare.php'>customer care. </a>";
          $msgColor="danger";
          msgAlert($msg, $msgColor); 
          exit();
        }
         

        $waiting_time = $result->login_error_time;
        $next_login = date('U') + $waiting_time;

        
        $sql = "UPDATE register 
                SET next_login =:next_login
                WHERE email =:email ";
        $stmt=$pdo->prepare($sql);
        $stmt->execute(['next_login'=>$next_login, 'email'=>$email]);

        //send ban messages to the ownner of the email
        require_once __DIR__ . "/emailSystem.php";
        $to = $email;
        $subject = "Your account is ban pillersmaker.";
        $message = "<p>Hi,</p>";          
        $message .= "<p></p>";
        $message .= "<p>This is to inform you that your account is ban for few hour, due</p>";
        $message .= "<p>several input of wrong password, kindly try back in an hour with the right password.</p>";
        $message .= "<p></p>";
        $message .= "<p>Thank You</p>";
        $message .= "<p>Pillersmaker Management</p>";
  
        emailSystem($to, $subject, $message);


        sessionDie();
        $msg="Account is Ban for few hours. ";
        $msgColor="danger";
        msgAlert($msg, $msgColor); 
        exit();
        }
      

    sessionDie();
    $tryTimes = 2 - $result->login_error;
    if($tryTimes>0){
      require_once __DIR__  . '/../view/header.php';
       echo "
    <div class='container text-center'>
      <div class='alert alert-danger'>
      Please enter correct password, you only have $tryTimes more times to try...!
      </div>
    </div>
   ";
   exit();
   }

}