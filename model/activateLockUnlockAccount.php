<?php
session_start();

require_once __DIR__ . "/connection.php";
//lock account model

$dateid =  date('U');
$userid = $_SESSION['USER_ID'];

if(!isset($userid)){
    require_once __DIR__ . "/../view/header3.php";
    echo "<div class='container mt-4 text-center'>
       <div class='alert alert-warning'>
            Please Login. 
            <a href='/view/layout.php'>Back to home</a>
       </div>
     </div>
   ";
   exit();
}

//GENERATE RANDOM NUMBER
$lockCode =  bin2hex(random_bytes(8));

$unlockCode =  bin2hex(random_bytes(16));

$lockCode = "$dateid"."$userid"."$lockCode"."$userid";

$unlockCode = "$dateid"."$userid"."$unlockCode"."$userid";


$sql = "SELECT * FROM `lockaccounttable` WHERE userid =:userid";
$stmt = $pdo->prepare($sql);
$stmt->execute(['userid'=>$userid]);
$result = $stmt->fetch();

if($result != false){
    require_once __DIR__ . "/../view/header3.php";
    echo "<div class='container mt-4 text-center'>
       <div class='alert alert-warning'>
            Code activated Already, contact Customer Care if you have issues login in. 
             <a href='/view/layout.php'>Back to home</a>
       </div>
     </div>
   ";
   exit();
}

$sql = "INSERT INTO `lockaccounttable` (userid, lockcode, unlockcode) 
    VALUE (:userid , :lockcode , :unlockcode)";

$stmt=$pdo->prepare($sql);

$stmt->execute(['userid'=>$userid, 'lockcode'=>$lockCode, 'unlockcode'=>$unlockCode]);

// require_once __DIR__ . "/../view/header3.php";
// echo "<div class='container mt-4 text-center'>
//    <div class='alert alert-warning'>
//         Code activated, check your email for your links. 
//          <a href='/view/layout.php'>Back home</a>
//    </div>
//  </div>
// ";
 
//send email
require_once __DIR__ . '/emailSystem.php';

$Email = $_SESSION['USER_EMAIL'];
$Subject = 'Your account lock and unlock link';
$Message = "Hi $userid";
$Message .= "The following link are your Account locking and unlocking 
                code please make sure this email is not deleted if you 
                really want to use this security to control the way you account will be access.";
$Message .= "<br>"."Kindly Update your KYC on Pillersmaker, this will help you retrieve your 
            account in case you mistakenly delete this email or you lost the links";

$Message .= "To Automatically Lock you account from your email click the following link"."br";
$Message .= "<a href='https://www.pillersmaker.com.ng/model/lockAccount.php?lock=$userid&code=$lockCode";

$Message .= "To Automatically Unlock you account from your email click the following link"."br";
$Message .= "<a href='https://www.pillersmaker.com.ng/view/unLockAccount.php?lock=$userid&code=$unlockCode";


$Message .= "<p>Thank you</p>";
$Message .= "<p>Pillersmaker</p>";

emailSystem($Email, $Subject, $Message);

echo "<script> location.href='/../view/settings.php?lock=yes'</script>";
exit();



