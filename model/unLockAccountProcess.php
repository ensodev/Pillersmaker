<?php

require_once __DIR__ . "/connection.php";



if(!isset($_POST['lockCode']) ||  !isset($_POST['userid'])){

    require_once __DIR__ . "/../view/header3.php";
    echo "<div class='container mt-4 text-center'>
        <div class='alert alert-warning'>
            Click the right link. 
         <a href='/view/layout.php'>Back home</a>
   </div>
 </div>
";
 
    exit();
}

$unlockcode = $_POST['lockCode'];
$userid = $_POST['userid'];



if(!isset($_POST['submit'])){

    require_once __DIR__ . "/../view/header3.php";
    echo "<div class='container mt-4 text-center'>
            <div class='alert alert-warning'>
                Please visit the login page.. 
                <a href='/view/layout.php'>Back home</a>
             </div>
        </div>
        ";
 
    exit();
}

// validate email
if ($_POST['email'] == "" || $_POST['email'] == NULL){

    
   
    require_once __DIR__ . "/../view/header3.php";
    echo "<div class='container mt-4 text-center'>
            <div class='alert alert-warning'>
            Please email must be entered.  
                <a href='/view/layout.php'>Back home</a>
             </div>
        </div>
        ";
 
    exit();
    
}

 
if(!filter_var($_POST['email'],  FILTER_VALIDATE_EMAIL)){

    require_once __DIR__ . "/../view/header3.php";
    echo "<div class='container mt-4 text-center'>
            <div class='alert alert-warning'>
            Please enter a valid email address..  
                <a href='/view/layout.php'>Back home</a>
             </div>
        </div>
        ";
 
    exit();
}

 
$email = $_POST['email'];

//Validate password
if(!isset($_POST['password']) || empty($_POST['password'])){
   
   
    require_once __DIR__ . "/../view/header3.php";
    echo "<div class='container mt-4 text-center'>
            <div class='alert alert-warning'>
            Please enter your password. 
                <a href='/view/layout.php'>Back home</a>
             </div>
        </div>
        ";
 
    exit();
    
}

  

if(strlen($_POST['password']) < 6){
   
    require_once __DIR__ . "/../view/header3.php";
    echo "<div class='container mt-4 text-center'>
            <div class='alert alert-warning'>
            Wrong password, please enter the correct password.  
                <a href='/view/layout.php'>Back home</a>
             </div>
        </div>
        ";
 
    exit();
  }


require_once "passCheckUnlock.php";

$lockCode = $_POST['lockCode'];
$userid = $_POST['userid'];
$realUser = $result->id;
if($result->id != $realUser){
    require_once __DIR__ . "/../view/header3.php";
    echo "<div class='container mt-4 text-center'>
       <div class='alert alert-warning'>
           Access Denied, hacking attempt. 
             <a href='/view/login.php'>Back to home</a>
       </div>
     </div>
   ";
   exit();
}

if($result->lockaccount == 1){

    $sql = "SELECT * FROM `lockaccounttable` WHERE userid =:userid AND unlockcode =:lockCode";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userid'=>$userid, 'lockCode'=>$lockCode]);
    $resultUnlock = $stmt->fetch();

    if(isset($resultUnlock) && $resultUnlock != false){
        $sql = "UPDATE register 
                SET lockaccount = 0
                WHERE email =:email AND id =:userid";
        $stmt=$pdo->prepare($sql);
        $stmt->execute(['email'=>$email, 'userid'=>$userid]);

        require_once __DIR__ . "/../view/header3.php";
            echo "<div class='container mt-4 text-center'>
            <div class='alert alert-warning'>
                    Account Unlocked. 
                    <a href='/view/layout.php'>Back home</a>
            </div>
            </div>
            ";
        exit();
    }

}else{
        require_once __DIR__ . "/../view/header3.php";
        echo "<div class='container mt-4 text-center'>
            <div class='alert alert-warning'>
                    Please contact admin to confirm the status of your account. 
                    <a href='/view/layout.php'>Back home</a>
            </div>
            </div>
            ";
        exit();
}
