
<?php if(!isset($_SESSION))
{
session_start();
}
?>
  
<?php require_once  __DIR__ .'/../controller/checkSessionContol.php';?> 
<?php checkNotSession(); ?>
<?php require_once  __DIR__ .'/../model/sessionExpire.php';?>
<?php require_once  __DIR__ .'/../model/checkBanAccount.php';?>
<?php require_once __DIR__ .'/../controller/checkPaidMember.php'; ?>
<?php require_once  __DIR__ .'/header3.php';?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>

<?php require_once  __DIR__ .'/../model/myPosts.php';?>

 


<?php 
if(!isset($_GET['PostUserName'])){
   header ('Location: noPage.html');
   exit();
}
?>

<?php
$user_name = $_GET['PostUserName'] ; 
?>

<?php //$user_name = $_SESSION['USER_NAME'] ; ?>
 

<?php
    if(isset($_GET['deleted'])){
        ?>
        <div class="container mt-4 text-center">
          <div class='alert alert-warning'>Post deleted...!
            <a href="/view/profile.php">Back to profile</a>
          </div>
        </div>
      <?php
    }


    if(!isset($_GET['PostUserName']) || empty($_GET['PostUserName']) ){
        ?>
        <div class="container mt-4 text-center">
          <div class='alert alert-warning'>Post you are looking for is not availabe to you..!
            <a href="/view/profile.php">Back to profile</a>
          </div>
        </div>
      <?php
      exit();
    }
?> 
<script>
     
    titleTag('Post work');  
</script>

<!-- -->
<div class="container text-center">
    
    <div class="row mt-3 text-center">
        <div class="col-md-1">
            
        </div>
        
        <div class="col-md-10 w3-green mt-2 mb-4 pt-3 pb-3 " style="opacity:0.8; border-radius:2px">
        
            <div class="text-right">
                <h5><span class="w3-text-white"><span class="w3-text-amber w3-animate-left">OOO
                    </span>
                        <?php echo $_GET['PostUserName'];?>
                        Posts
                    </span>
                 </h5>
                <hr>
            <!-- top/Down Short cut menu -->
               <small>
                <a href="/index1.php" class="btn btn-default btn-sm text-light">Home</a>
                <a href="/view/emailBoard.php" class="btn btn-default btn-sm text-light"> Message</a>
                <a href="/view/explore.php" class="btn btn-default btn-sm text-light">Explore</a>
                <a href="/view/settings.php" class="btn btn-default btn-sm text-light">Board</a>
                
               </small>
            <!-- shortcut menu end -->
            <hr />
                <?php require_once __DIR__ . '/../advert/advert1.php';?>
            <hr />
            </div>
             
            <div class="container card" >

            <?php
                foreach ($resultRow as $post) {
                    ?> 
                <hr>   
                <div class="row">
                    <div class="col-md-2 text-right">
                        <a href="../view/viewPost.php?postid=<?php echo $post->id;?>&user_id=<?php echo $post->user_id;?>">
                            <img src="../PostMedia/<?php echo $post->postfile ;?>" class="m-2" style="width:80px; height:85px" alt="">
                        </a>
                        
                        
                    </div>
                   
                    <div class="col-md-6 pt-3">
                    
                        <h6 class=" text-left text-info ml-2">
                            <a  href="../view/viewPost.php?postid=<?php echo $post->id;?>&user_id=<?php echo $post->user_id;?>"><?php echo $post->topic ;?></a>
                        </h6>

                        <p class=" text-left text-info ml-2">Dated |
                         
                        <span class=" text-left text-info ml-2">
                            <?php echo $post->category ;?>
                        </span>
                        </p>
                        
                    </div>
                    <div class="col-md-4 pt-3">
                    <?php
                    if(!isset($_GET['profilePosts'])){
                    ?>
                        <p class=" text-left text-info">
                                <a href="editPost.php?postId=
                                <?php echo $post->id;?>&user_id=<?php echo $post->user_id;?>&topic=<?php echo $post->topic;?>&article=<?php echo trim($post->article);?>&category=<?php echo $post->category;?>&postfile=<?php echo $post->postfile;?>" class="btn btn-warning btn-sm  ml-2">Edit</a>

                                 <a href="/view/redeemVoteChance.php?postId=<?php echo $post->id;?>&user_id=<?php echo $post->user_id;?>" class="btn btn-danger btn-sm  ml-2">RDM</a> 
                            
                                <span class="btn btn-danger btn-sm  ml-2">Delete</span>

                                <!-- <a href="/model/deletePostProcess.php?postId=<?php //echo $post->id;?>&user_id=<?php //echo $post->user_id;?>" class="btn btn-danger btn-sm  ml-2">Delete</a> -->
                                
                        </p>
                    <?php
                    }
                    ?>
                    </div>
                </div>
                <?php
                } 
                ?>
                <hr>
                <div class="text-right">
                <?php
                    require_once  __DIR__ ."/../pagination/paginationFooterMyPosts.php";
                ?>
                <div>
             
            </div>
            
           
            <div class="col-md-1">
            
          </div>
          </div>
        </div>
</div>              
</div>               
</div>
<?php require_once __DIR__ .'/testimony.php';?>
<?php require_once __DIR__ .'/footer.php';?>
