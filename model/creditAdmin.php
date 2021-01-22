<?php
     

    /**************************************************************************** 
     * This file increase admin pvc whenever someone vote
     * this file can be use if you want to get from post vote pvc
     * this file is not in use now as the link to it was disabled from
     * postVoteOnly.php
     * 
     * 
    */
          //update admin total coin table
          require_once 'getSettings.php';
          $admin_email = $resultSettings->admin_email;
          
          //$admin_user_name = $resultSettings->$admin_user_name;
        //calculation goes here

          $sql = "SELECT * FROM `vote_coin_table` WHERE user_email = :admin_email";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(['admin_email'=>$admin_email]);
          $resultAdminDetails = $stmt->fetch();

          if(!isset($resultAdminDetails)){
            require_once  __DIR__ . '/../view/header3.php';
              echo "
                  <div class='container text-center'>
                    <div class='container alert alert-info'>
                      PVC transaction disabled try back in few minutes or contact <a href='../view/customerCare.php'>Customer Care..!</a>
                      
                    </div>

                  </div>
              
              ";
              exit();
          }
          
          if ($voting == false){
            $total_received = $resultAdminDetails->total_received + $resultSettings->pvc_per_vote;
            $total_bal = $resultAdminDetails->total_bal + $resultSettings->pvc_per_vote;
          }
          
          if ($voting == true){
            $total_received = $resultAdminDetails->total_received + $resultSettings->pvc_per_vote;
            $total_bal = $resultAdminDetails->total_bal + $resultSettings->pvc_per_vote;
          }
          

          $admin_id = $resultAdminDetails->user_id;

          $sql ="UPDATE `vote_coin_table`
                SET total_bal =:total_bal, total_received =:total_used
                WHERE user_id =:user_id";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(['total_bal'=>$total_bal,'total_used'=>$total_received, 'user_id'=>$admin_id]);
          
          /**************************************************************** */