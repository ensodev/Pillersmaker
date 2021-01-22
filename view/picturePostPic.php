  
<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php require_once  __DIR__ .'/../controller/checkSessionContol.php';?> 
<?php checkNotSession(); ?>

<?php require_once __DIR__ .'/../controller/checkPaidMember.php'; ?>
<?php require_once  __DIR__ .'/../view/header3.php';?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>
<?php

if(!isset($_GET['pic']) || !isset($_GET['id'])){

     echo "<div class='container mt-3'>
          <div class='alert alert-info text-center'>
            Something went wrong try agin later!
          </div>
        </div>";
    exit();
}
?>

<script>
    titleTag('Entertainment Chat Board');  
</script>

<!-- -->
<div class="container text-center">
    
    <div class="row mt-3">
        <div class="col-md-3">
            
        </div>
        
        <div class="col-md-6 w3-green mt-2 mb-4 pt-3 pb-3 " style="opacity:0.8; border-radius:2px">

            <div class="card">
            
              <div class="card-header text-success">
                <h3>Members Post Picture</h3>
              </div>

              <div class="card-body">
                <img style='width:286px; height:332px' 
                  src='/PostMedia/<?php 
                  if(isset($_GET['pic'])){
                      echo trim($_GET['pic']);
                  }
                    ?>'>
              </div>

              <div class="card-footer">
                  <a class="btn btn-warning text-dark form-control"
                  href='/model/votepicture.php?id=
                   <?php
                         if(isset($_GET['pic'])){
                            echo trim($_GET['pic']);
                         } ?>
                         &id=<?php 
                          if(isset($_GET['pic'])){
                              echo trim($_SESSION['USER_ID']);
                          }
                           ?> 

                    
                  '>Vote Picture</a>
                  <br>
                  <a href="/model/connectFriend.php?id=
                        <?php 
                          if(isset($_GET['pic'])){
                              echo trim($_SESSION['USER_ID']);
                          }
                           ?>&friend_id=
                        <?php
                         if(isset($_GET['pic'])){
                            echo trim($_GET['id']);
                         } ?>" 
                    class="btn btn-success text-dark form-control">Send Connection Request</a>
              </div>

            </div>

        </div>
              
        <div class="col-md-3">
            
        </div>
    </div>
</div>
                   
                   

<?php require_once __DIR__ .'/testimony.php';?>
<?php require_once __DIR__ .'/footer.php';?>
