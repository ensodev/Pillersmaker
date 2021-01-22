<?php

function encryptPass($myPassword){
   $plainPassword = $myPassword;


if(!$password = password_hash($plainPassword, PASSWORD_DEFAULT)){

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
}
 




function decryptPass($myPassword){
    
    $password = $myPassword;
 
    if(password_verify($password, $result->pass_word)){
    
    require_once __DIR__ . '/../view/header3.php';
   echo "<div class='container mt-4 text-center'>
       <div class='alert alert-warning'>
                Please enter the right password. 
             <a href='/view/register.php'>Back to Registering Page</a>
       </div>
     </div>
   ";
   exit();
   }
 
 
 
 }