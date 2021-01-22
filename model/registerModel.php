<?php
//this fill has error in line 101, 109
?>

<?php if(!isset($_SESSION))
{
session_start();
}


require_once "connection.php";
require_once  __DIR__ . '/../others/alertFunction.php';

require_once "getAdmin.php";


if(!isset($_POST['submit'])){
    
    //$msg="No message submitted. ";
    //$msgColor="danger";

    require_once __DIR__ . '/../view/header3.php';
    echo "<div class='container mt-4 text-center'>
        <div class='alert alert-warning'>
                No message submitted. 
              <a href='/view/register.php'>Back to Registering Page</a>
        </div>
      </div>
    ";
    exit();
     
}


if($_POST['username']=="" or $_POST['password']=="" 
   or $_POST['fullname']=="" or $_POST['email']=="") {
    
    //$msg="Please Fill the whole field. ";
    //$msgColor="danger";
    //msgAlert($msg, $msgColor);   

    require_once __DIR__ . '/../view/header3.php';
    echo "<div class='container mt-4 text-center'>
        <div class='alert alert-warning'>
                Please Fill the whole field. ....
              <a href='/view/register.php'>Back to Registering Page</a>
        </div>
      </div>
    ";
    exit();
    
}

//$password;

//Validating input

//username Validation
$username = ucwords(htmlspecialchars($_POST['username']));

if (strtolower($username) == 'admin' || strtoupper($username) == 'ADMIN' ){

    //$msg="That user name not allowed, please try another. ";
    //$msgColor="danger";
    //msgAlert($msg, $msgColor);
    
    require_once __DIR__ . '/../view/header3.php';
    echo "<div class='container mt-4 text-center'>
        <div class='alert alert-warning'>
        That username not allowed, please try another.
              <a href='/view/register.php'>Registering Page</a>
        </div>
      </div>
    ";
    exit();
    
}

if(str_word_count($username) > 1){
    // no space allowed in username
    //$msg="Username must be a word and contain no space. ";
    //$msgColor="danger";
    //msgAlert($msg, $msgColor);  

    require_once __DIR__ . '/../view/header3.php';
    echo "<div class='container mt-4 text-center'>
        <div class='alert alert-warning'>
                Username must be a word and contain no space. 
              <a href='/view/register.php'>Registering Page</a>
        </div>
      </div>
    ";
    exit();
}

//NOTE***************
//password Validation
//$plainPassword = htmlspecialchars($_POST['password']);
//******************

$plainPassword = $_POST['password'];


// if(str_word_count($plainPassword) > 1){
//     // no space allowed in username
//     $msg="Password must be a word and contain no space. ";
//     $msgColor="danger";
//     msgAlert($msg, $msgColor);  
// }

if(strlen($plainPassword) < 6){
    //password must be more 6 or more character
    //$msg="Password must be upto six or more character. ";
    //$msgColor="danger";
    //msgAlert($msg, $msgColor);  

    require_once __DIR__ . '/../view/header3.php';
    echo "<div class='container mt-4 text-center'>
        <div class='alert alert-warning'>
                Password must be upto six or more character. 
              <a href='/view/register.php'>Registering Page</a>
        </div>
      </div>
    ";
    exit();

}

//Fullname Validation
$fullname = ucwords(htmlspecialchars($_POST['fullname']));

if(str_word_count($fullname) < 2 || str_word_count($fullname) > 4){

    //$msg="Fullname must be more than one word. ";
    //$msgColor="danger";
    //msgAlert($msg, $msgColor);  
    
    require_once __DIR__ . '/../view/header3.php';
    echo "<div class='container mt-4 text-center'>
        <div class='alert alert-warning'>
                Fullname must be more than one word but not more than four words.. 
              <a href='/view/register.php'>Registering Page</a>
        </div>
      </div>
    ";
    exit();
    
}


//using email validating function to validate email
//$email;
if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    //error 1 email could be global
   $email = $_POST['email'];
}else{
    //$msg="Entered Email is not a valid email, Please check and correct. ";
    //$msgColor="danger";
    //msgAlert($msg, $msgColor); 
    
    require_once __DIR__ . '/../view/header3.php';
    echo "<div class='container mt-4 text-center'>
        <div class='alert alert-warning'>
            Entered Email is not a valid email, Please check and correct.  
              <a href='/view/register.php'>Back to Registering Page</a>
        </div>
      </div>
    ";
    exit();
}


//Confirming the email is not taken
$sql ="SELECT * FROM register WHERE email = :email OR user_name =:username";
$stmt=$pdo->prepare($sql);
$stmt->execute(['email'=>$email, 'username'=>$username]);

$result = $stmt->fetch();


if(isset($result->email)){
    
    //$msg="Email already taken please enter another emaillll. ";
   // $msgColor="danger";
   // msgAlert($msg, $msgColor);
   
   require_once __DIR__ . '/../view/header3.php';
   echo "<div class='container mt-4 text-center'>
       <div class='alert alert-warning'>
                Email already taken please enter another emaillll.   
             <a href='/view/register.php'>Back to Registering Page</a>
       </div>
     </div>
   ";
   exit();
}

// confirm if the username is not taken
if(isset($result->user_name)){

    //$msg="Username already taken please try another one. ";
    //$msgColor="danger";
    //msgAlert($msg, $msgColor);

    require_once __DIR__ . '/../view/header3.php';
   echo "<div class='container mt-4 text-center'>
       <div class='alert alert-warning'>
                Username already taken please try another one.
             <a href='/view/register.php'>Back to Registering Page</a>
       </div>
     </div>
   ";
   exit();

}

if(!empty($result)){

    //$msg="Please use another email or username. ";
    //$msgColor="danger";
    //msgAlert($msg, $msgColor); 
    
    
    require_once __DIR__ . '/../view/header3.php';
   echo "<div class='container mt-4 text-center'>
       <div class='alert alert-warning'>
                Please use another email or username.
             <a href='/view/register.php'>Back to Registering Page</a>
       </div>
     </div>
   ";
   exit();


}

$password;
//password needs to be hashed
if(!$password = password_hash($plainPassword, PASSWORD_DEFAULT)){
   
    //$msg="Something Must have went wrong please try another password. ";
    //$msgColor="danger";
    //msgAlert($msg, $msgColor);   

    require_once __DIR__ . '/../view/header3.php';
   echo "<div class='container mt-4 text-center'>
       <div class='alert alert-warning'>
                Something Must have went wrong please try another password. 
             <a href='/view/register.php'>Back to Registering Page</a>
       </div>
     </div>
   ";
   exit();
}

 //get admin record
 require_once __DIR__ . '/../model/getSettings.php';
  if(!isset($resultSettings->admin_email)){
        //$msg="Something Must have went wrong please contact customer care or try again later. ";
        //$msgColor="danger";
        //msgAlert($msg, $msgColor); 
        
        require_once __DIR__ . '/../view/header3.php';
   echo "<div class='container mt-4 text-center'>
       <div class='alert alert-warning'>
            Something Must have went wrong please contact customer care or try again later. 
             <a href='/view/register.php'>Back to Registering Page</a>
       </div>
     </div>
   ";
   exit();
     }

    
try {
    $sql = "INSERT INTO register(user_name, pass_word, full_name, email) VALUE(:username, :password, :fullname, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username'=>$username, 'password'=>$password, 'fullname'=>$fullname, 'email'=>$email]);

    //create record for vote_coin_table
    $sql ="SELECT * FROM register WHERE email = :email";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(['email'=>$email]);
    $resultFMe = $stmt->fetch();

    $sql = "INSERT INTO vote_coin_table(user_id, user_email, total_sent, total_received, total_bal, total_used) VALUE(:user_id, :user_email, :total_sent, :total_received, :total_bal, :total_used)";
    $stmt = $pdo->prepare($sql);

    $stmt->execute(['user_id'=>$resultFMe->id, 'user_email'=>$resultFMe->email, 'total_sent'=>0, 'total_received'=>$resultSettings->reg_pvc, 'total_bal'=>$resultSettings->reg_pvc, 'total_used'=>0]);

    //updating daily registration statictic
    require_once __DIR__ . '/updateDailyStatictics.php';

    $table = 'dailyregistration';
    dailystatictic($table);

    //trying to find, create or update pvc for the user
     $sql ="SELECT * FROM vote_coin_table WHERE user_email = :email";
     $stmt=$pdo->prepare($sql);
     $stmt->execute(['email'=>$resultSettings->admin_email]);
     $resultAdmin = $stmt->fetch();

     
    //  var_dump($resultAdmin);
    //  exit();
    $adminEmail = $resultAdmin->user_email;
    $totalSent = $resultAdmin->total_sent;
    $totalBal = $resultAdmin->total_bal;
     
    if(!isset($resultSettings->reg_pvc)){
        $reg_pvc = 1000;
        $totalSent = $totalSent + $reg_pvc; 
        $totalBal = $totalBal - $reg_pvc;
    }else{
        $reg_pvc = $resultSettings->reg_pvc;
        $totalSent = $totalSent + $reg_pvc; 
        $totalBal = $totalBal - $reg_pvc;
    }

    $sql = "UPDATE vote_coin_table
            SET total_sent = $totalSent, total_bal = $totalBal
            WHERE user_email =:user_email";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_email'=>$adminEmail]);
     
    // update coin history

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
                    'point_email'=>'Admin', 
                    'amount'=>$reg_pvc, 
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
                    'point_email'=>$email, 
                    'amount'=>$reg_pvc, 
                    'trans_id'=>$mainTransId]);
    
    

    // end update history

    //create record for pvcpin table
    $sql = "INSERT INTO `pvcpin` (user_id, pin)  
    VALUE(:user_id, :pin)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['pin'=>0000, 'user_id'=>$resultFMe->id]);



    $_SESSION['msg']="Registration completed and confirmed. ";
    $msg=$_SESSION['msg'];

    $msgColor="success";
    //send notification to member about pvc recieved
 
    require_once  __DIR__ . '/../model/sendMessageFunction.php';
    $receiver_id = $resultFMe->id;  
    $receiver_email = $resultFMe->email;
    $amount = $reg_pvc;   
    $msgInfo = "Transfer status Received, Admin to Member";

    //send message through this function
    messageAuto($amount, $receiver_email, $receiver_id, $msgInfo, $reg = true);

    
    //send new info and registration alert to admin alternative email
    require_once __DIR__ . "/emailSystem.php";
     
    $to = $resultSettings->admin_email;
    $subject = "You have a new Member on pillersmaker.";
    $dater = date('D jS M Y');
    $message = "<p>hi $resultSettings->admin_user_name, you just have a new user signed up now $dater</p>";
    $message .= "<p>The name of your new user is $username</p>";
    $message .= "<p>His account is perfectly setuped and his account is ready for usage</p>";
    $message .= "<p>hi $resultSettings->admin_user_name, you just have a new user signed up now</p>";
    $message .= "<p>Thank You</p>";
    $message .= "<p>PMRobot</p>";
    $message .= "<p>$dater</p>";

    emailSystem($to, $subject, $message);

    //sending message to new member
    $to = $email;
    $subject = "You are welcome to pillersmaker.";
    $message = "<p>hi $username,</p>";
    $message .= "<h5>We are happy you joined our community</h5>";
    $message .= "<h5>Our Vision</h5>";
    $message .= "<p>Our vision is to become the most supportive platform for people of great talents in Nigeria and in Africa.</p>";
    $message .= "<p>PillersMaker is a platform invented to help talented individual to easily display thier talents, grow it, 
            earn a living from it, help others with it, get appreciated and encouraged.</p>";
    
    $message .= "<p></p>";
    $message .= "<p><a href='https://facebook.com/Pillersmaker-102557924452162'>Kindly check click here to check our facebook page</a></p>";
    $message .= "<p></p>";
    $message .= "<p><a href='https://pillersmaker.com.ng/view/login.php'>To login into your account </a></p>";
    $message .= "<p></p>";
    $message .= "<p><a href='https://pillersmaker.com.ng/view/resetPassword.php'>Click here to reset your password any time</p>";
    $message .= "<p></p>";
    $message .= "<p></p>";
    $message .= "<p>Thank You</p>";
    $message .= "<p>Pillersmaker Management</p>";
    $message .= "<p>$dater</p>";
    
    
    //send the message to new member
    emailSystem($to, $subject, $message);
    
    //give registration complete message
    msgAlert($msg, $msgColor);  




} catch (Exeption $e) {

    echo "Something went wrong, please try again later. ".$e->message();
    
}