<?php if(!isset($_SESSION))
{ 
session_start();
}  
?>
<?php require_once __DIR__ . '/../controller/checkSessionContol.php';?> 
<?php checkNotSession(); ?>
<?php require_once  __DIR__ . '/../model/sessionExpire.php';?>
<?php require_once  __DIR__ . '/../model/connectFriendDisplay.php';?>
<?php require_once  __DIR__ . '/../model/UserProfileProcess.php';?>
<?php require_once  __DIR__ . '/header3.php';?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>
<?php require_once  __DIR__ . '/../model/checkBanAccount.php';?>
<?php
// this is coming from apply vote
if(isset($_GET['appliedsucess'])){
    echo "
    <div class='container text-center mt-3'>
        <div class='alert alert-info'>
           Your application have been received and processing started..!
        </div>
    </div>
";
}
?> 
<script>
    title='Profile';
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

.connet-menu{
    text-decoration:none;
    padding:5px 15px;
    margin:5px 5px 5px 0px;
    cursor:pointer;
}

.line-h{
    line-height: 0.5px;
}

.line-h-ajusted{
    line-height: 17px;
}


p{
    font-size:15px;
}

</style>


<?php

 if($result){
     //format About me output and edit event output and other relivant once.

    $replaceString = $result->about_me;
    require_once __DIR__ . "/../model/msgReformatRead.php";
    $about_me_formated = $replaceString;   
    
    
    // echo $result->award1;
    // echo $result->award2;
    // echo $result->award3;

?>
 

 
<!-- -->

</div>



<div class="container text-center">
    
    <div class="row mt-3 text-center">
        <div class="col-md-1">
            
        </div>
        
        <div class="col-md-10 w3-green mt-2 mb-4 pt-3 pb-3 " style="opacity:0.8; border-radius:2px">
            <div class="text-right">
                <h5><span class="w3-text-white"><span class="w3-text-amber w3-animate-left">OOO</span> PROFILE INFORMATION</span></h5>
                <hr>
            </div>
            <div class="card">
                <div class="card-header w3-green text-right pt-4">
                    
                    <a href="/view/myWorkspace.php" class="btn btn-success" style="border:1px white solid">
                        Post Articles                 
                    </a>
                  
                    <br>
                    <a href='/view/picturepage.php?pic=
                    <?php echo trim($result->profile_pic) ; ?>
                    &id=
                    <?php echo trim($_SESSION['USER_ID']) ; ?>
                    '>
                        <img src="../upload/<?php echo $result->profile_pic ; ?>" style="width:150px; height:150px; border-radius:5px" class="mb-3 mt-3  w3-animate-left">
                    </a>

                    <div> <a  href="editProfilePicture.php" class="menu">Edit profile Picture</a>
                    </div>
                    <div class="mt-3">
                    <a  href="settings.php" class="menu">My Board</a>

                    <a  href="postwork.php?id=<?php echo $_SESSION['USER_ID'] ; ?>&PostUserName=<?php echo $_SESSION['USER_NAME']?>" class="menu ">

                     <span class="badge badge-warning">
                        <?php echo $resultPostCounts ;?>
                     </span>
                        My Posts
                    </a>

                   
                    </div>

                    <!-- <h6><?php echo $_SESSION['USER_FNAME'];?></h6> -->
                </div>

                <div class="card-body w3-text-amber text-left">
                    
                    <div><a href="editProfileAboutMe.php"><span class="menu">Edit About Me</span></a>
                    
                    
                    </div>
                    <hr>
                    <div class="text-dark">
                        <h5>About Me:</h4>
                        <p> <?php echo $_SESSION['USER_FNAME'];?></p>
                        <!-- <p class="line-h-ajusted">  -->
                            <?php echo $about_me_formated;?>
                        <!-- </p> -->
                    </div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    


                </div>

                
<!-- card body 2 -->
<div class="card-body w3-text-amber text-left">
                    
                    <div><a  href="editProfileTalents.php" class="menu">Edit Talents</a>
                    </div>
                  
                    <hr>
                    
                    <div class="text-dark">
                        <h5>Main Talent:</h4>
                        
                        
                        <p class="line-h-ajusted">
                            <?php echo $result->main_talent;?>
                        </p>
                  
                    </div>

                    <div class="text-dark">
                        <h5>Other Talent:</h4>
                        
                        <p class="">
                            <?php echo $result->second_talent;?>
                        </p>
                        
                  
                    </div>
                  </div>


                  
<!-- card body 2 -->
<div class="card-body w3-text-black text-left">
                    
                    <div><a  href="editProfileEvents.php" class="menu">Edit Events</a>
                    </div>
                  
                    <hr>
                    
                    <div class="text-dark">
                        <h5>Events |Awards |  Projects:</h4>
                        <hr>
                        <p class="line-h-ajusted">
                            <span style="color:green"><?php echo $award1_formated1 = reformat($result->award1);?></span>
                            <br> 
                            <h6><?php echo $result->award1_date;?></h6> 
                        </p>
                        <hr>
                        <p class="">
                            <span style="color:green"><?php echo $award1_formated2 = reformat($result->award2);?></span>
                            <br> 
                            <h6><?php echo $result->award2_date;?></h6> 
                        </p>
                        <hr>
                        <p class="">
                            <span style="color:green"><?php echo $award1_formated3 = reformat($result->award3);?></span>
                            <br> 
                            <h6><?php echo $result->award3_date;?></h6>
                        </p>
                    </div>
                 
                        <hr>
                        <div><a  href="editProfileContacts.php" class="menu">Edit Contacts</a>
                        </div>
                        
                        <hr>
                        <h5>Contacts:</h4>
                        <hr>
                        <p class="">
                            <a href="<?php echo $result->website;?>"><?php echo $result->website;?></a>
                        </p>
                        <hr>
                        <p class="">
                            <a href="mailto:<?php echo $result->email;?>"><?php echo $result->email;?></a>
                        </p>
                        <hr>
                        <p class="">
                            <a href="tel:<?php echo $result->mobile;?>"><?php echo $result->mobile;?></a>
                        </p>
                  
                    </div>
                  </div>

                <div class="card-footer w3-green">
                </div>
                    <div class="row text-center mt-2 mb-2">
                        <div class="col-md-3 col-sm-3 ">
                            <span class="like-menu btn btn-lg"> <span class="badge p-2 w3-green">
                            <?php echo $result->like_no;?>
                            </span> likes</span> 
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <span class="like-menu btn btn-lg"> <span class="badge p-2 w3-green">
                            <?php echo $result->liked_no;?> 
                            </span > liked</span> 
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <span class="like-menu btn btn-lg">
                            <span class="badge p-2 w3-green">
                            <?php echo $resultConnect ; ?>
                            </span > Connection</span> 
                        </div>
                        
                       

                    </div>

           
                        
                   
                </div>
            </div>

        </div>
        
        <div class="col-md-1"></div>
    </div>
</div>

<?php //require_once  __DIR__ . '/statistic.php';?>
<?php require_once __DIR__ . '/testimony.php';?>
<?php require_once __DIR__ . '/footer.php';?>


<!-- -->
<?php
}else{  
?>
<!-- -->

</div>



<div class="container text-center">
    
    <div class="row m-3 text-center">
        <div class="col-md-3">
            
        </div>
        
        <div class="col-md-6 w3-green mt-2 mb-4 pt-3 pb-3 " style="opacity:0.8; border-radius:2px">
            <div class="text-right">
                <h5><span class="w3-text-white"><span class="w3-text-amber w3-animate-left">OOO</span> PROFILE INFORMATION</span></h5>
                <hr>
            </div>
            <div class="card">
                <div class="card-header w3-green text-right">
                   
                    <img src="../images/home.png" style="width:150px; height:150px; border-radius:20px" class="mb-3 mt-3  w3-animate-fading1">
                    <div>
                        <!-- <a  href="editProfilePicture.php" class="menu">
                            Change Picture
                        </a> -->
                    </div>
                    <!-- <h6><?php echo $_SESSION['USER_FNAME'];?></h6> -->
                </div>


                <div class="card-body w3-text-amber text-left">
                    
                    <div>
                        <!-- <a href="editProfileAboutMe.php"><span class="menu">Edit</span></a> -->
                    
                    
                    </div>
                    <hr>
                    <div class="line-h text-dark">
                        <h5>About Me:</h4>
                        <p> <?php echo $_SESSION['USER_FNAME'];?></p>
                        <p class="line-h-ajusted"> 
                            <span style="color:red">
                                Profile not updated
                            </span>
                        </p>
                    </div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    


                </div>

                
<!-- card body 2 -->
<div class="card-body w3-text-amber text-left">
                    
                    <div>
                    <!-- <a  href="editProfileTalents.php" class="menu">Edit</a> -->
                    </div>
                  
                    <hr>
                    
                    <div class="line-h text-dark">
                        <h5>Talents:</h4>
                        
                        <p class="line-h-ajusted">
                        <span style="color:red">
                                Profile not updated
                        </span>
                        </p>
                        
                  
                    </div>
                  </div>


                  
<!-- card body 2 -->
<div class="card-body w3-text-amber text-left">
                    
                    <div>
                    <!-- <a  href="editProfileEvents.php" class="menu">Edit</a> -->
                    </div>
                  
                    <hr>
                    
                    <div class="line-h text-dark">
                        <h5>Awards and Events:</h4>
                        
                        
                        <p class="line-h-ajusted">
                        <span style="color:red">
                                Profile not updated
                        </span>
                        </p>
                        <p class="line-h-ajusted"> </p>
                        
                  
                    </div>
                  </div>

                <div class="card-footer w3-green">
                    <div class="row text-center mt-2 mb-2">
                        <div class="col-md-3 mb-2">
                            <span class="like-menu btn">likes <span class="badge w3-green"></span ></span> 
                        </div>

                        
                    </div>
                    
                </div>
            </div>

        </div>
        
        <div class="col-md-3"></div>
    </div>
</div>

<?php require_once  __DIR__ . '/testimony.php';?>
<?php require_once  __DIR__ . '/footer.php';?>

<!-- -->
<?php
  
}

?>


<?php

function reformat($award){

    $string1 = "PZtag1";
    $string2 = "PZtag2";
    $string3 = "PZtag3";
    $string5 = "PZtag5";
    $string6 = "PZtag6";
    $string7 = "PZtag7";
    $string8 = "PZtag8";
    $string9 = "PZtag9";

    $stringRepalce1 = "<";
    $stringRepalce2 = ">";
    $stringRepalce3 = "</";
    $stringRepalce5 = "<br>";
    $stringRepalce6 = "<p>";
    $stringRepalce7 = "<h4>";
    $stringRepalce8 = "</p>";
    $stringRepalce9 = "</h4>";

    $replaceString = $award;
    $replaceString = str_replace($string1, $stringRepalce1, $replaceString);
    $replaceString = str_replace($string2, $stringRepalce2, $replaceString);
    $replaceString = str_replace($string3, $stringRepalce3, $replaceString);
    $replaceString = str_replace($string5, $stringRepalce5, $replaceString);
    $replaceString = str_replace($string6, $stringRepalce6, $replaceString);
    $replaceString = str_replace($string7, $stringRepalce7, $replaceString);
    $replaceString = str_replace($string8, $stringRepalce8, $replaceString);
    $replaceString = str_replace($string9, $stringRepalce9, $replaceString);

    return $replaceString;

}

?>
