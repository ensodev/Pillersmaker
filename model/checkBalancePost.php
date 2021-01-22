<?php 

if(isset($_SESSION['USER_ID'])){

 // charge user
 $sql = "SELECT * FROM `vote_coin_table` WHERE user_id =:user_id";
 $stmt = $pdo->prepare($sql);
 $stmt->execute(['user_id'=>$_SESSION['USER_ID']]);
 // var_dump($stmt);
 // exit();
 $resultFoundMe = $stmt->fetch();

 if(!$resultFoundMe){
   echo "No record, vital error, try back in few minute or contact customers care";
   exit();
 }

 $total_used = $resultFoundMe->total_used;
 $total_bal = $resultFoundMe->total_bal;

 // if there is still bal then you can vote

 require_once __DIR__ . "/getSettings.php";
                // if there is still bal and the balance is greater than voting cost then you can vote

  if(!isset($resultSettings->post_cost_pvc) || $resultSettings->post_cost_pvc == 0){
    require_once  __DIR__ . '/../view/header3.php';
      echo "
      <div class='container text-center'>
        <div class='container alert alert-info'>
          Posting is presently disabled check back later <a href='../view/customerCare.php'>Customer Care..!</a>
        </div>
      </div>
        ";
    exit();
  }

   
 if($total_bal < $resultSettings->post_cost_pvc ){
  
   echo "
   <div class='container mt-4 text-center'>
     <div class='alert alert-warning'>You dont have enough PVC to make a posting, Post Attract $resultSettings->post_cost_pvc PVC, contact <a href='/view/customerCare.php'>customer care</a> to learn more...!
       <a href='/view/profile.php'>Back to profile</a>
     </div>
   </div>
    ";
  
   exit();
 }


}