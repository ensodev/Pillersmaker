<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php 
require_once "connection.php";
require_once __DIR__ . '/../others/alertFunction.php';
require_once  __DIR__ . '/../others/sessionProcess.php';

if(!isset($_POST['submit'])){
    
    sessionDie();
    $msg="Please visit the login page. ";
    $msgColor="danger";
    msgAlert($msg, $msgColor);
}

// validate email
if ($_POST['email'] == "" || $_POST['email'] == NULL){
    
    sessionDie();
    $msg="Please email must be entered. ";
    $msgColor="danger";
    msgAlert($msg, $msgColor);
}





if(!filter_var($_POST['email'],  FILTER_VALIDATE_EMAIL)){
    
    sessionDie();
    $msg="Please enter a valid email address. ";
    $msgColor="danger";
    msgAlert($msg, $msgColor);
}


$email = $_POST['email'];

//if someone try to login as admin or related emails
$emailsArray = array('pillersmaker@pillersmaker.com', 'pillersmaker@pillersmaker.com.ng', 
                    'pillerz@pillermaker.com.ng', 'customercare@pillersmaker.com.ng', 
                    'payments@pillersmaker.com.ng', 'pillerz@pillersmaker.com');

if( in_array($email, $emailsArray)){
    
    require_once  __DIR__ . '/../view/header3.php';
    echo "
      <div class='container text-center'>
        <div class='container alert alert-info'>
            Wrong credentials submitted...!
        </div>
      </div>
  
  ";

  /**sending hacking email
   *the following code in in the file called emailHacking.popover-header
   *you can delete this code and require it from emailHacking file all you have to do in 
   *bring connection.php content into the file also
   **/
  
 
    $one = 1;
    $sql = "SELECT * FROM `sitesettings` WHERE id =:one";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['one'=>$one]);
    $resultSettings = $stmt->fetch();

    if($resultSettings->admin_email){
        $name = $resultSettings->admin_user_name;
        $To = $resultSettings->admin_email;
        $Subject = "Hacking signal, login in as admin";
        $Message = "Hi $name <br>";
        $Message .="Someone is tryuing to login with list of prohibited emails, if you recieve this email <br>";
        $Message .="Kindly shout down the site in one click link asap <br>";
        $Message .="thank you <br>";
        $Message .= "<p>PMRobot</p>";

        require_once __DIR__ . '/emailSystem.php';
        emailSystem($To, $Subject, $Message);
    }


  exit();
}



//Validate password
if(!isset($_POST['password']) || empty($_POST['password'])){
    
    sessionDie();
    $msg="Please enter your password. ";
    $msgColor="danger";
    msgAlert($msg, $msgColor);
}

  

if(strlen($_POST['password']) < 6){
    sessionDie();
    $msg="Wrong password, please enter the correct password. ";
    $msgColor="danger";
    msgAlert($msg, $msgColor);
}

// if(str_word_count($_POST['password']) != 1 ){
    
//     sessionDie();
//     $msg="Please enter the password without space. ";
//     $msgColor="danger";
//     msgAlert($msg, $msgColor);
// }

//NOTE**********************
//$password = htmlspecialchars($_POST['password']);
//******************** 
 
require_once "passCheck.php";

//clear login_error and next_login
if(password_verify($password, $result->pass_word)){

    
   
    $loginerror = 1;

    //logintime statictic count 
    $logintime = $result->logintime;
    $logintime++;

    $sql = "UPDATE register SET login_error = 0, next_login = 0, logintime = $logintime WHERE email =:email ";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(['email'=>$email]);

    $_SESSION['USER_ID']=$result->id;
    $_SESSION['USER_NAME']=$result->user_name;
    $_SESSION['USER_FNAME']=$result->full_name;
    $_SESSION['USER_EMAIL']=$result->email;

    //ERROR HERE TWO USER NAME DECLARATION
    $_SESSION['USER_UNAME']=$result->user_name;
    $_SESSION['MSG']="Signed In";
 
    // get maximum login time from settings
    require_once 'getSettings.php';
    if(isset($resultSettings))
    {
        $loginExpireTime = $resultSettings->login_expire_time;
    }

    $_SESSION['EXP_TIME'] = date('U') + $loginExpireTime;
 
//register total daily login
//require_once __DIR__ . '/loginData.php';
require_once __DIR__ . '/updateDailyStatictics.php';
$table = 'datalogin';
dailystatictic($table);

echo "<script>location.href='/index1.php'</script>";
//header('Location: /index1.php');

}


