    
<?php if(!isset($_SESSION))
{
session_start();
}
?>
   
<?php require_once  __DIR__ . '/../controller/checkSessionContol.php';?>  -->
<?php checkNotSession(); ?>
<?php require_once  __DIR__ . '/../model/sessionExpire.php';?>
<?php require_once  __DIR__ . '/header3.php';?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>
<?php require_once  __DIR__ . '/../model/viewPostProcess.php';?>
<?php require_once  __DIR__ . '/../model/postLikeDislikeVote.php';?>

<?php 
$replaceString = $resultMyPost->article;
 
require_once __DIR__ . "/../model/msgReformatRead.php";

$msg_articleX = $replaceString;
// echo $msg_messageX;
// exit(); 
if(isset($_GET['done'])){
  if($_GET['done'] == 'shop'){
    echo "  <div class='alert alert-success text-center'>
       The Seller will contact you soon!
    </div>";
  }
}


if(isset($_GET['done'])){
  if($_GET['done'] == 'job'){
    echo "<div class='alert alert-success text-center'>
              The Employement agency will contact you soon!
          </div>";
  }
}


if(isset($_GET['vcoin'])){
  if($_GET['vcoin'] == 'pvout'){
    echo "<div class='container'>
              <div class='alert alert-warning text-center'>
                You have exhusted your voting pvcoin kindly purchase another one or contact <a href='/view/customerCare.php'>customer care</a> for more info..!
              </div>
           </div>
    ";
  }
}

//alert if member has voted before
if(isset($_GET['voted'])){
  if($_GET['voted'] == 'voted'){
    echo "<div class='container'>
              <div class='alert alert-info text-center'>
                You have casted vote for this post already<a href='/view/customerCare.php'> Customer Care</a> for more info..!
              </div>
           </div>
    ";
  }
}

if(isset($_GET['voted'])){
  if($_GET['voted'] == 'vote'){
    echo "<div class='container'>
              <div class='alert alert-info text-center'>
                You just voted for this post..!
              </div>
           </div>
    ";
  }
}

if(isset($_GET['like'])){
  if($_GET['like'] == 'liked'){
    echo "<div class='container'>
              <div class='alert alert-success text-center'>
                You just like this post...!
              </div>
           </div>
    ";
  }
}

if(isset($_GET['like'])){
  if($_GET['like'] == 'before'){
    echo "<div class='container'>
              <div class='alert alert-warning text-center'>
                You have liked this post before...!
              </div>
           </div>
    ";
  }
}

if(isset($_GET['dislike'])){
  if($_GET['dislike'] == 'disliked'){
    echo "<div class='container'>
              <div class='alert alert-success text-center'>
                You just dislike this post...!
              </div>
           </div>
    ";
  }
}

if(isset($_GET['dislike'])){
  if($_GET['dislike'] == 'before'){
    echo "<div class='container'>
              <div class='alert alert-warning text-center'>
                You have disliked this post before...!
              </div>
           </div>
    ";
  }
}

?>

<script>
    
    titleTag('View Post');  
</script>

<!-- -->
<div class="container text-center">
    
    <div class="row mt-3 text-center">
    
        <div class="col-md-1">
            
        </div>
        
        <div class="col-md-10 w3-green mt-2 mb-4 pt-3 pb-3 " style="opacity:0.8; border-radius:2px">
        
            <div class="text-right">
                <h5><span class="w3-text-white"><span class="w3-text-amber w3-animate-left">OOO</span> 
                <?php 

                  if ($resultMyPost->category == 'Sales Adverts' ){
                    echo "Sales Adverts";
                  }else if($resultMyPost->category == 'Job Adverts'){            
                    echo "Job Adverts";
                  
                  }else{
                    echo "Users Posts";
                  }
                ?>
                </span></h5>
                <hr>
             <!-- top/Down Short cut menu -->
           
             <div class="text-right">
                <small >
                <a href="/index1.php" class="btn btn-default btn-sm text-light">Home</a>
                <a href="/view/emailBoard.php" class="btn btn-default btn-sm text-light"> Message</a>
                <a href="/view/explore.php" class="btn btn-default btn-sm text-light">Explore</a>
                <a href="/view/settings.php" class="btn btn-default btn-sm text-light">Board</a>
               </small>
              
            </div>
            <!-- shortcut menu end -->  
            <hr />   
            </div>
 
            <div class="card">
              <div class="card-header w3-green">
               
                <h3 class="text-light">
                
                  <?php require_once __DIR__ . '/../advert/advert1.php';?>

                  <?php echo $resultMyPost->topic ;?>
                <h3>
                
              </div>

              <div class="card-body">

              <a href='/view/picturePostPic.php?pic=
                    <?php echo trim($resultMyPost->postfile) ; ?>
                    &id=
                    <?php echo $resultPostProfile->id ;?>
                    '>
                <img src="../PostMedia/<?php echo $resultMyPost->postfile ;?>" class="m-2" style="width:200px; height:210px" alt="">
                <p></p>
              </a>
                <div id="article" class=" container text-left w3-text-gray">
                  <?php echo $msg_articleX ;?>
                  
                </div>
               
              </div>

              <div class="card-footer">
                <div class="container text-left w3-text-gray">

                  <!-- if its a job or shop post dont display vote -->

                  
                     <?php 

                      if ($resultMyPost->category != 'Sales Adverts' ){

                        if($resultMyPost->category != 'Job Adverts'){

                          echo "  <a href='/model/postVoteOnly.php?postid=$post_id&user_id=$resultPostProfile->id'
                          class='btn btn-info'>

                          <span class='badge badge-warning'>
                            $resultPostVotes->total_vote
                          </span> Vote
          
                          </a>";
                        }
                      }

                      if($user_id != $_SESSION['USER_ID']){
                        if ($resultMyPost->category == 'Sales Adverts' ){

                            echo "  <a href='/model/salesContactMe.php?postid=$post_id&poster=$user_id&topic=$resultMyPost->topic'
                            class='btn btn-info'>

                            <span class='badge badge-warning'>
                              Contact Me
                            </span> 
            
                            </a>";
                        
                        }
                      }

                      if($user_id != $_SESSION['USER_ID']){
                        if ($resultMyPost->category == 'Job Adverts' ){

                          echo "  <a href='/model/followJob.php?postid=$post_id&poster=$user_id&topic=$resultMyPost->topic'
                          class='btn btn-info'>

                          <span class='badge badge-warning'>
                            Follow Job
                          </span> 
          
                          </a>";
                      
                        }
                      }
                      ?>
                   
                    
                      <a href="/model/postLikeOnly.php?postid=<?php echo $post_id ;?>&user_id=<?php echo $resultPostProfile->id ;?>"
                      class="btn btn-success">
                      <span class="badge badge-warning">
                          <?php echo $resultPostLikes->total_like;?>
                       </span>
                        Like
                      </a>

                    <!-- if its a job or shop post dont display Dislike -->
                    <?php 

                    if ($resultMyPost->category != 'Sales Adverts' ){

                      if($resultMyPost->category != 'Job Adverts'){

                      //   echo " <a href='/model/postDislikeOnly.php?postid=$post_id&user_id=$resultPostProfile->id'
                      // class='btn btn-danger'>
                      //   <span class='badge badge-warning'>
                      //   $resultPostDislikes->total_dislike
                      //  </span>
                      //   Dislike
                      // </a>";

                    }
                  }
                  ?>

                      <span class="btn w3-grey w3-text-white">
                        <span class="badge badge-warning">
                        <?php echo $resultMyPost->post_view;?>
                       </span>
                        View
                      </span>                      
                      
                </div>
                <hr>
                <div class="container text-left">

                 <a href='/view/picturepage.php?pic=
                    <?php echo $resultPostProfile->profile_pic ; ?>
                    &id=
                    <?php echo $resultPostProfile->id ;?>
                    '>
                  <img src="../upload/<?php echo $resultPostProfile->profile_pic ;?>" class="m-2" style="width:100px; height:110px" alt="Profile Picture">
                  </a>

                  <h6 class="w3-text-black">Author: 
                    <a href="/model/searchProfileProcess.php?id=
                      <?php echo $resultPostProfile->id;?>">
                   
                      <?php echo $resultPostProfile->user_name;?>
                    </a>
                  </h6>

                </div>

                <div class="container pt-4">
                  <div class="text-left w3-text-gray">
                    <h4>Comments</h4>
                  </div>
                  <div>
                    <h4></h4>
                  </div>
                </div>
              </div>
            </div>
             <!-- top/Down Short cut menu -->
           
             <div class="text-right">
                <small >
                <a href="/index1.php" class="btn btn-default btn-sm text-light">Home</a>
                <a href="/view/emailBoard.php" class="btn btn-default btn-sm text-light"> Message</a>
                <a href="/view/explore.php" class="btn btn-default btn-sm text-light">Explore</a>
                <a href="/view/settings.php" class="btn btn-default btn-sm text-light">Board</a>
               </small>
               <hr>
            </div>
            <!-- shortcut menu end -->
        </div>

        <div class="col-md-1">
        </div>

    </div>
</div>

<?php require_once   __DIR__ . '/testimony.php';?>
<?php require_once   __DIR__ . '/footer.php';?>
