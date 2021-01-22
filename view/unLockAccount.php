<?php
session_start();

require_once __DIR__ . '/../model/dailyPageView.php';

if(!isset($_GET['lock']) || !isset($_GET['code'])) {
    require_once __DIR__ . "/../view/header3.php";
    echo "<div class='container mt-4 text-center'>
       <div class='alert alert-warning'>
            Something went wrong. 
             <a href='/view/login.php'>Back to home</a>
       </div>
     </div>
   ";
   exit();
}

$userid = $_GET['lock'];
$lockCode = $_GET['code']; 
?>


<?php require_once __DIR__ . '/header.php';?>
<body>
<div class="container"> 
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-4 mb-4 w3-green pt-3 pb-3 m-3 p-3" style="border-radius:2px; opacity:0.4">
        <h3 class="text-center w3-text-white ">Unlock Your Account</h3>
            <form action="../model/unLockAccountProcess.php" method="POST">

                <div class="form mt-3">
                    <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
                </div>

                <div class="form mt-3">
                    <input type="password" class="form-control" name="password" placeholder="Enter Your Password" required>
                </div>

                
                <div class="form mt-3">
                    <input type="text" class="form-control" name="lockCode" value ="<?php echo $lockCode;?>" hidden>
                </div>

                
                <div class="form mt-3">
                    <input type="text" class="form-control" name="userid" value ="<?php echo $userid;?>" hidden>
                </div>
                
                <div class="form mt-3 mb-3">
                    <input type="submit" class="btn w3-amber form-control mb-1"  name="submit" Value="Submit">
                </div>
                                
              

            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
</body>
</html>




<?php

// require_once __DIR__ . '/connection.php';

// //check if user already activate lock security
// $sql = "SELECT * FROM `lockaccounttable` WHERE userid =:userid";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['userid'=>$userid]);
// $result = $stmt->fetch();

// //if result is not false or empty
// if($result != '' && $result != false){
//   $sql = "SELECT * FROM `register` WHERE id =:userid";
//   $stmt = $pdo->prepare($sql);
//   $stmt->execute(['userid'=>$userid]);
//   $resultRegister = $stmt->fetch();
// }else{
//   require_once __DIR__ . "/../view/header3.php";
//     echo "<div class='container mt-4 text-center'>
//        <div class='alert alert-warning'>
//             Please activte board to activate lock security. 
//              <a href='/view/login.php'>Back to home</a>
//        </div>
//      </div>
//    ";
//    exit();
// }

// //if result is set 0 in accont then lock the account and redirect
// if($resultRegister->lockaccount == 0){
//   $makeOne = 1;
  
//   $sql = "UPDATE `register` SET lockaccount =:makeOne WHERE id =:userid";
//   $stmt = $pdo->prepare($sql);
//   $stmt->execute(['makeOne'=>$makeOne, 'userid'=>$userid]);

//   require_once __DIR__ . "/../view/header3.php";
//     echo "<div class='container mt-4 text-center'>
//        <div class='alert alert-warning'>
//             Account locked, to unlock your account click the unlock link. 
//              <a href='/view/login.php'>Back to home</a>
//        </div>
//      </div>
//    ";
//    exit();

//   //else confirm the status of your account from the admin
// }else if($resultRegister->lockaccount != 0){
//   require_once __DIR__ . "/../view/header3.php";
//     echo "<div class='container mt-4 text-center'>
//        <div class='alert alert-warning'>
//             please confirm the status of your account from admin. 
//              <a href='/view/login.php'>Back to home</a>
//        </div>
//      </div>
//    ";
//    exit();
// }
