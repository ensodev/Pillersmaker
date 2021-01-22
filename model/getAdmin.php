<?php

// echo "<script> location.href='../view/noPage.html'</script>";
// exit();

 
// enabled
// to disable to register admin add // infont of the first if statement
// do the sme thing to the last two lines

//if(isset($mark)){
require_once __DIR__ .'/getSettings.php';

if(!isset($resultSettings) || $resultSettings == false){
    echo "<script>location.href='/view/noPage.html?error=1'</script>";
    //header('Location: ../view/noPage.html?error=1');
    exit();
}


if(!isset($resultSettings->admin_email) || !isset($resultSettings->admin_user_name)){
  echo "<script>location.href='/view/noPage.html?error=2'</script>";
  //header('Location: ../view/noPage.html?error=2');
  exit();
}

$AdminRname = $resultSettings->admin_user_name;
$AdminRemail = $resultSettings->admin_email;

$sql = "SELECT * FROM `register` WHERE user_name =:AdminRname AND email =:AdminRemail";
$stmt=$pdo->prepare($sql);
$stmt->execute(['AdminRname'=>$AdminRname, 'AdminRemail'=>$AdminRemail]);
$resultRegisterData = $stmt->fetch();

if(!$resultRegisterData){
  echo "<script>location.href='/view/noPage.html?error=3'</script>";
  
  //header('Location: ../view/noPage.html?error=3');
  exit();
}
//exit();
//}