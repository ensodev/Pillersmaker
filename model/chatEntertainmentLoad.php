<?php if(!isset($_SESSION))
{
session_start();
}
?>
<?php 

     
  require_once __DIR__ . '/../model/connection.php';
  $user_id = $_SESSION['USER_ID'];
 
  $approvedChat = 500;

  //get the total row number
  $sql="SELECT COUNT(*) FROM `chatentertainment` ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $resultChatCount = $stmt->fetchColumn();

    if($resultChatCount > $approvedChat){

      //get the id with the higest figure
      $sql="SELECT MAX(id) AS LargestMax FROM chatentertainment";
      
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $resultChatMAX = $stmt->fetch();    
      
      $maxNumber = $resultChatMAX->LargestMax;
      
      //get the number of post to start deletion from
      $chatAllCount = $resultChatMAX->LargestMax - $approvedChat;
      

      $sql=" DELETE FROM `chatentertainment` WHERE id < $chatAllCount";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();

      //chat record selection start here 
      $sql="SELECT * FROM `chatentertainment` ORDER BY id ASC LIMIT 2000";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $resultChat = $stmt->fetchAll();

      // var_dump($resultChat);
      // exit();
    
      if(!$resultChat){
        echo "No chat ";
      }else{

   
      foreach ($resultChat as $chat) { 
          
        //display for present user as in you
        if($chat->user_id != $user_id){
      ?>
            <div class="mt-3">
            <div class='row ml-3 mr-3 border border-success' 
                  style='border-top-right-radius:30px;
                        border-bottom-right-radius:30px'>
              <div class='col-md-2 text-left pt-2 ' >
              <a href="/view/picturepage.php?pic=
                          <?php echo $chat->profile_pic ;?>&id=
                          <?php echo $chat->user_id ;?>">
                    <img style='width:35px; height:40px' 
                      src='/upload/<?php echo $chat->profile_pic;?>'>
                  </a>
                  <p>
                    <a href="/model/searchProfileProcess.php?id=
                    <?php echo $chat->user_id; ?>">
                      <?php echo $chat->user_name; ?>
                    </a>

                  </p>
                  
              </div>

              <div class='col-md-8 text-left p-2 '>
                  <div style="">
                  <?php echo $chat->message;?>
                  <br>
                  <?php echo  date('d/m/y G.i:s',$chat->time_posted);?>

                  </div>

                  <p><a href="#/model/reportChat.php?id=<?php echo $chat->id;?>" class="badge badge-warning">Report Post</a></p>

              </div>  

              <div class='col-md-2 text-left pt-2  align-text-bottom'>
                
              </div>  
            </div>
            </div>
    <?php
    }else{
    ?>
    <!-- Dispaly for other users-->
          <div class="mt-3 ">
          <div class='row border border-warning ml-3 mr-3 pr-2'
                style='border-top-left-radius:30px;
                      border-bottom-left-radius:30px'>

            <div class='col-md-2 text-right pt-2  align-text-bottom'>
              
            </div> 
            
            <div class='col-md-8 text-right p-2 '>
                <div style="">
                <?php echo $chat->message;?>
                <br>
                <?php echo  date('d/m/y G.i:s',$chat->time_posted);?>
                <p><a href="#/model/deleteChat.php?id=<?php echo $chat->id;?>" class="badge badge-danger"> X</a></p>
                </div>
            </div>  

            <div class='col-md-2 text-right pt-2 ' >
                <a href="/view/picturepage.php?pic=
                        <?php echo $chat->profile_pic ;?>&id=
                        <?php echo $chat->user_id ;?>">
                  <img style='width:35px; height:40px' 
                    src='/upload/<?php echo $chat->profile_pic;?>'>
                </a>
                <p>
                  <a href="/model/searchProfileProcess.php?id=
                  <?php echo $chat->user_id; ?>">
                    <?php echo $chat->user_name; ?>
                  </a>
                </p>
                
            </div>

            
          </div>
          </div>
    <?php
        }
      }
  
    }
      exit();
}

  $sql="SELECT * FROM `chatentertainment` ORDER BY id ASC LIMIT 2000";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $resultChat = $stmt->fetchAll();

    // var_dump($resultChat);
    // exit();
    
    if(!$resultChat){
      echo "No chat ";
    }else{

   
    foreach ($resultChat as $chat) { 
      if($chat->user_id != $user_id){
    ?>
    
    <!--display for user-->
    <div class="mt-3">
    <div class='row ml-3 mr-3 border border-success w3-lime' 
          style='border-top-right-radius:30px;
                 border-bottom-right-radius:30px'>
      <div class='col-md-2 text-left pt-2 ' >
      <a href="/view/picturepage.php?pic=
                  <?php echo $chat->profile_pic ;?>&id=
                  <?php echo $chat->user_id ;?>">
            <img style='width:35px; height:40px' 
              src='/upload/<?php echo $chat->profile_pic;?>'>
          </a>
          <p>
            <a href="/model/searchProfileProcess.php?id=
            <?php echo $chat->user_id; ?>">
              <?php echo $chat->user_name; ?>
            </a>

          </p>
          
      </div>

      <div class='col-md-8 text-left p-2 '>
          <div style="">
          <?php echo $chat->message;?>
          <br>
          <?php echo  date('d/m/y G.i:s',$chat->time_posted);?>

          </div>

          <p><a href="/model/reportChat.php?id=<?php echo $chat->id;?>" class="badge badge-warning">Report Post</a></p>

      </div>  

      <div class='col-md-2 text-left pt-2  align-text-bottom'>
        
      </div>  
    </div>
    </div>
<?php
    }else{
        
    // dispaly for others on chat board
      ?>
    <div class="mt-3">
    <div class='row border border-warning ml-3 mr-3 pr-2 w3-khaki'
          style='border-top-left-radius:30px;
                 border-bottom-left-radius:30px'>

      <div class='col-md-2 text-right pt-2  align-text-bottom'>
        
      </div> 
      
      <div class='col-md-8 text-right p-2 '>
          <div style="">
          <?php echo $chat->message;?>
          <br>
          <?php echo  date('d/m/y G.i:s',$chat->time_posted);?>
          <p><a href="#/model/deleteChat.php?id=<?php echo $chat->id;?>" class="badge badge-danger"> X</a></p>
          </div>
      </div>  

      <div class='col-md-2 text-right pt-2 ' >
          <a href="/view/picturepage.php?pic=
                  <?php echo $chat->profile_pic ;?>&id=
                  <?php echo $chat->user_id ;?>">
            <img style='width:35px; height:40px' 
              src='/upload/<?php echo $chat->profile_pic;?>'>
          </a>
          <p>
            <a href="/model/searchProfileProcess.php?id=
            <?php echo $chat->user_id; ?>">
              <?php echo $chat->user_name; ?>
            </a>
          </p>
          
      </div>

       
    </div>
    </div>
<?php
    }
  }
  
}