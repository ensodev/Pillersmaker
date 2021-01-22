
<?php
//require_once  __DIR__ . '/../others/sessionProcess.php';
/*....................................................*/


  $password = $_POST['password'];

  $email = $_POST['email'];

if(isset($_POST['userid'])){
    $userid = $_POST['userid'];
  }
  
// confirm the user in the registered member table
$sql ="SELECT * FROM register WHERE email =:email AND id =:userid";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email'=>$email, 'userid'=>$userid]);
$result = $stmt->fetch();

if(empty($result)){
  require_once __DIR__ . "/../view/header3.php";
  echo "<div class='container mt-4 text-center'>
          <div class='alert alert-warning'>
            user not recognised...  
            <a href='/view/layout.php'>Back home</a>
            </div>
          </div>
";

exit();
}

//check if account is ban
$presentTime = date('U');

if($result->ban == 1 AND $result->next_login > $presentTime){

  require_once __DIR__ . "/../view/header3.php";
  echo "<div class='container mt-4 text-center'>
          <div class='alert alert-warning'>
          Account has been Ban for few hours. 
            <a href='/view/layout.php'>Back home</a>
            </div>
          </div>
        ";

        exit();

}

if($result->ban == 1 AND $result->next_login == 0){

  require_once __DIR__ . "/../view/header3.php";
  echo "<div class='container mt-4 text-center'>
          <div class='alert alert-warning'>
          Account has been Ban contact Admin or customer care. 
            <a href='/view/layout.php'>Back home</a>
            </div>
          </div>
        ";

        exit();

}


//checking for correct password
if(!password_verify($password, $result->pass_word)){
        $one =1;
        $sql ="SELECT * FROM sitesettings WHERE id =:one";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['one'=>$one]);
        $resultError = $stmt->fetch();

        if(isset($resultError->login_error_time)){
          $waiting_time = $resultError->login_error_time;
          $next_login = date('U') + $waiting_time;
        }else{
          $waiting_time = 900;
          $next_login = date('U') + $waiting_time;
        }

        $ban = 1;
        $sql = "UPDATE register 
                SET next_login =:next_login, ban =:ban
                WHERE email =:email ";
        $stmt=$pdo->prepare($sql);
        $stmt->execute(['next_login'=>$next_login, 'ban'=>$ban, 'email'=>$email]);

        //send ban messages to the ownner of the email
        require_once __DIR__ . "/emailSystem.php";
        $to = $email;
        $subject = "Your account status is BAN on pillersmaker.";
        $message = "<p>Hi,</p>";          
        $message .= "<p></p>";
        $message .= "<p>This is to inform you that your account is ban for few hour, due</p>";
        $message .= "<p>several input of wrong password, kindly try back in an hour with the right password.</p>";
        $message .= "<p></p>";
        $message .= "<p>Thank You</p>";
        $message .= "<p>Pillersmaker Management</p>";
  
        emailSystem($to, $subject, $message);

        require_once __DIR__ . "/../view/header3.php";
            echo "<div class='container mt-4 text-center'>
            <div class='alert alert-warning'>
            Wrong password entered and you account is Ban for few 15 minutes. 
              <a href='/view/layout.php'>Back home</a>
              </div>
            </div>";
        
        exit();
}