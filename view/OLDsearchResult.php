<?php 
if(!isset($_SESSION))
{ 
session_start();
}

  require_once __DIR__ . '/../controller/checkSessionContol.php';
  checkNotSession();
?>
<?php require_once  __DIR__ . '/../model/profileSearchValidate.php';?>
<?php require_once  __DIR__ . '/../model/connectProfileDisplay.php';?>
<?php require_once  __DIR__ . '/../controller/profileSearchAlert.php';?> 

 
<?php require_once('header3.php');?>
<?php $userID = $_SESSION['USER_ID']; ?>
 
<script>
    title='Search';
    titleTag(title);  
</script>

<style>
.center-col{
    float:none !important ; 
    margin: 0 auto; 
}
.menu{
    padding:5px 15px;
    color:white;
    background-color:green;
    border-right:1px solid brown ;
    margin:0px;
    border-bottom-left-radius:10px;

}

.menu:hover{
    padding:5px 15px;
    color:white;
    opacity:0.9;
    background-color:green;
    border-right:3px solid brown ;
    cursor:pointer;
}
.like-menu{
   
    color:black;
    /* margin:5px 5px 5px 0px; */
    background-color:gold;
    border:1px dotted white ;
    border-radius:20px;
    cursor:pointer;
    font-size:15px;
}

.connection-menu{
   
   color:black;
   /* margin:5px 5px 5px 0px; */
   background-color:gold;
   border:1px dotted white ;
   border-radius:5px;
   cursor:pointer;
   font-size:15px;
   padding-left:20px;
   padding-right:20px;
}

.connet-menu{
    text-decoration:none;
    padding:5px 15px;
    margin:5px 5px 5px 0px;
    cursor:pointer;
}

.line-h{
    /* line-height: 1.6px; */
}

.line-h-ajusted{
    line-height: 17px;
}


p{
    font-size:15px;
}

</style>

<?php
    if(!$_GET){
      
        $msg = "User not found, check the Username/E-mail.. ";
        $msgColor = "info";
        SearchError($msg, $msgColor);
        exit();
    }

?>

</div>

<div class="container text-center">
     
    <div class="row mt-3 text-center">
        <div class="col-md-2">
            
        </div>
        
        <div class="col-md-8 w3-green mt-2 mb-4 pt-3 pb-3 " style="opacity:0.8; border-radius:2px">
            <div class="text-right">
                <h5><span class="w3-text-white"><span class="w3-text-amber w3-animate-left">OOO</span> PROFILE INFORMATION</span></h5>
                <hr>
            </div>
            <div class="card">
                <div class="card-header w3-green text-right">
                    <div class='mt-2 '>                      
                     
                    <a href="/view/profilePostwork.php?profilePosts=<?php echo $id ;?>&PostUserName=<?php echo $user_name;?>" class="btn btn-success" style="border:1px white solid">
                      <span class="badge badge-warning">
                        <?php echo $resultPostCount ?>
                      </span> My Posts
                    </a>

                    <!-- <a href="/view/postwork.php?id=<?php //echo $id ;?>&PostUserName=<?php //echo $user_name;?>" class="btn btn-success" style="border:1px white solid">
                      <span class="badge badge-warning">
                        <?php //echo $resultPostCount ?>
                      </span> My Posts
                    </a> -->
                    </div>
                    
                    <a href="/view/picturepage.php?pic=
                        <?php echo trim($pic) ; ?>&id=
                           <?php echo trim($id) ;?>">
                    <img src="../upload/<?php echo $pic ; ?>" style="width:150px; height:150px; border-radius:5px" class="mb-3 mt-3  w3-animate-right">
                    </a>
                    
                  <h6><span class="w3-text-yellow ">OOO </span><?php echo $user_name.' ' ;?><span class="w3-text-yellow"> OOO</h6>
 
                  <div>
                  
                  <?php 
                    if(!isset($resultFriend->approved)){
                       ?>
                        
                        <a class='connection-menu btn' 
                                href='/model/connectFriend.php?id=<?php echo $_SESSION['USER_ID'] ;?>
                                      &friend_id=<?php echo $id;?>'><span>
                                          <span class='badge w3-green' 
                                              style='border:1px solid red'>
                                                <?php echo $resultConnect;?>
                                          </span>
                                        Connect
                                             
                                      </span></a>
                       
                    <?php
                    }elseif ($resultFriend->approved == 1){
                  
                        echo "<span class='btn w3-amber'>
                        <span class='badge w3-green'>
                            $resultConnect
                        </span> Connected 
                        
                    </span> <a href='/view/compose.php?profileName=$user_name'class='btn w3-amber'>Message</a>

                    <div class='mt-2 mb-3'>
                      <a  href='/view/reportMembers.php?reportMem=$user_name' class='menu w3-brown'>Report</a>

                      <a href='/model/disconnectFriend.php?id=$userID&friend_id=$id' class='menu w3-brown'>Disconnect</a>
                      
                      <a  href='../model/dislike.php?id=$id' class='menu w3-brown'>Dislike</a>

                    </div>";
                    }else{
                        echo "<span class='btn w3-amber'>
                        <span class='badge w3-green'>
                            $resultConnect
                        </span> Request Sent 
                    </span>
                    <div class='mt-2'>
    

                      <a  href='/model/disconnectFriend.php?id=$userID&friend_id=$id' class='menu w3-brown'>Cancel Request</a>
                      <a  href='../model/dislike.php?id=$id' class='menu w3-brown'>Dislike</a>
                    </div>";
                    }
                    ?>
                   
                    
                    
                </div>
                   
                </div>

                <div class="card-body w3-text-amber text-left">
                    
                    <!-- <div><a href="editProfileAboutMe.php"><span class="menu">Edit About Me</span></a>
                    
                    
                    </div> -->
                    <hr>
                    <div class="text-dark">
                        <h5 class="p-2 mb-4 w3-green"><span class="w3-text-yellow w3-text-yellow">O </span>About Me</h4>
                        <h5 class="text-success">Full Name:</h5> 
                        <p ><?php echo $full_name;?></p>
                        <hr>

                        <p class=""> 
                           <h5 class="text-success">About Me</h5> <?php echo $about_me;?>
                        </p>
                    </div>
                   
                </div>

                
<!-- card body 2 -->
<div class="card-body w3-text-amber text-left">
                  
                    <hr>
                    
                    <div class=" text-dark">
                        <h5 class="p-2 mb-2 w3-green"><span class="w3-text-yellow w3-text-yellow">O </span>Talents</h4>
                        <hr>
                        
                        <p class="">
                            <h5 class="text-success">Main Talent:</h5> <?php echo $main_talent;?>
                        </p>
                        <hr>
                        <p class="">
                        <h5 class="text-success">Second Talent:</h5> <?php echo $second_talent;?>
                        </p>
                        
                  
                    </div>
                  </div>


                  
<!-- card body 2 -->
<div class="card-body w3-text-black text-left">
                    
                    <!-- <div><a  href="editProfileEvents.php" class="menu">Edit Events</a>
                    </div> -->
                  
                    <hr>
                    
                    <div class=" text-dark">
                        <h5 class="p-2 mb-4 w3-green"><span class="w3-text-yellow w3-text-yellow">O </span>Events |Awards |  Projects</h4>
                        <hr>
                        <p class="">
                            <h5  class="text-success"> Events:</h5> <span ><?php echo $award1;?></span>, 
                            On <?php echo $award1_date;?> 
                        </p>
                        <hr>
                        <p class="">
                            <h5 class="text-success"> Awards:</h5> <span ><?php echo $award2;?></span>, 
                            On <?php echo $award2_date;?> 
                        </p>
                        <hr>
                        <p class="">
                            <h5 class="text-success">Projects:</h5> <span ><?php echo $award3;?></span>, 
                            On <?php echo $award3_date;?> 
                        </p>
                    </div>
                 
                      
                        <hr>
                        <h5 class="p-2 mb-4 w3-green"><span class="w3-text-yellow w3-text-yellow">O </span>Contacts</h4>

                    <?php
                         if(isset($resultFriend->approved) AND $resultFriend->approved == 1){
                            ?>
                        <hr>
                        
                          <h5 class="text-success"> Website:</h5> <a href='<?php echo $website ;?>'><?php echo $website ;?></a>
                        
                        <hr>
                        
                            <h5 class="text-success">Email</h5><a href="mailto:<?php echo $email;?>"> <?php echo $email;?></a> 
                          
                        
                        <hr>
                        
                          <h5 class="text-success"> Moble:</h5><a href="tel:<?php echo $mobile;?>"> <?php echo $mobile;?></a> 
                        
                    <?php
                         }else{
                             ?>
                                
                            <p class="line-h-ajusted">>>></p>
                        
                             <?php
                         }
                    ?>
                    </div>
                  </div>

                <div class="card-footer w3-green text-center">
                    <div class="row mt-2 mb-2">
                        <div class="col-md-4">
                        <?php    
                        if($_GET['hiLike']== ""){
                           echo " <a href='../model/like.php?id=$id'>
                                <span class='like-menu btn'>
                                
                                    Like $user_name
                                    <span class='badge w3-green' style='border:1px solid red'>$likes
                                    </span >";
                        }else{
                            
                           echo" <span class='like-menu btn'>
                                <span class='badge w3-green'>$likes
                                </span >
                                You Liked $user_name
                                ";
                                
                             
                        }
                          
                        ?>
                        </div>

                        <div class="col-md-4">
                            
                                <!-- <span class="like-menu btn">liked 
                                    <span class="badge w3-green"><?php //echo         $liked; ?>
                                    </span >
                                </span> -->
                          
                        </div>

                       
                    </div>
                    
                </div>

            </div>

        </div>
        
        <div class="col-md-2"></div>
    </div>
 <!-- </div>  -->

<?php require_once __DIR__ . '/testimony.php';?>
<?php require_once __DIR__ . '/footer.php';?>
<?php exit(); ?>


