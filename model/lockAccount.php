<?php
session_start();

if(!isset($_SESSION)){
    require_once __DIR__ . "/../view/header3.php";
    echo "<div class='container mt-4 text-center'>
       <div class='alert alert-warning'>
            Please log into your account first, then click the link again. 
             <a href='/view/login.php'>Back to home</a>
       </div>
     </div>
   ";
   exit();
}
$id = $_GET['lock'];
$userid = $_GET['lock'];
$lockCode = $_GET['code']; 

require_once __DIR__ . '/connection.php';

$sql = "SELECT * FROM `lockaccounttable` WHERE userid =:userid AND lockcode =:lockCode";
$stmt = $pdo->prepare($sql);
$stmt->execute(['userid'=>$userid, 'lockCode'=>$lockCode]);
$result = $stmt->fetch();







//..................................................................
//check if user already activate lock security
$sql = "SELECT * FROM `lockaccounttable` WHERE userid =:userid AND lockcode =:lockCode";
$stmt = $pdo->prepare($sql);
$stmt->execute(['userid'=>$userid, 'lockCode'=>$lockCode]);
$result = $stmt->fetch();

//if result is not false or empty
if($result != '' || $result != false){
  $sql = "SELECT * FROM `register` WHERE id =:userid";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['userid'=>$userid]);
  $resultRegister = $stmt->fetch();
}else{
  require_once __DIR__ . "/../view/header3.php";
    echo "<div class='container mt-4 text-center'>
       <div class='alert alert-warning'>
            To use this security you must activate lock security. 
             <a href='/view/login.php'>Back to home</a>
       </div>
     </div>
   ";
   exit();
}

//if result is set 0 in accont then lock the account and redirect
if($resultRegister->lockaccount == 0){
  $makeOne = 1;
  
  $sql = "UPDATE `register` SET lockaccount =:makeOne WHERE id =:userid";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['makeOne'=>$makeOne, 'userid'=>$userid]);

  require_once __DIR__ . "/../view/header3.php";
    echo "<div class='container mt-4 text-center'>
       <div class='alert alert-warning'>
            Account locked, to unlock your account click the unlock link. 
             <a href='/view/login.php'>Back to home</a>
       </div>
     </div>
   ";
   exit();

  //else confirm the status of your account from the admin
}else if($resultRegister->lockaccount != 0){
  require_once __DIR__ . "/../view/header3.php";
    echo "<div class='container mt-4 text-center'>
       <div class='alert alert-warning'>
            please confirm the status of your account from admin. 
             <a href='/view/login.php'>Back to home</a>
       </div>
     </div>
   ";
   exit();
}
