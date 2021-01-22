<?php
require_once  __DIR__ . '/header2.php';
require_once  __DIR__ . '/../controller/checkSessionContol.php'; 
require_once  __DIR__ . '/../model/readMessageProcess2.php'; 
require_once __DIR__ . '/../model/dailyPageView.php';

checkNotSession();

//reading messages
//this convert PZtags back to original code
$replaceString = $result->msg_message;
$string1 = "PZtag1";
$string2 = "PZtag2";
$string3 = "PZtag3";
$string5 = "PZtag5";
$string6 = "PZtag6";
$string7 = "PZtag7";
$string8 = "PZtag8";
$string9 = "PZtag9";
$string10 = "..";


$stringRepalce1 = "<";
$stringRepalce2 = ">";
$stringRepalce3 = "</";
$stringRepalce5 = "<br>";
$stringRepalce6 = "<p>";
$stringRepalce7 = "<h4>";
$stringRepalce8 = "</p>";
$stringRepalce9 = "</h4>";

$replaceString = str_replace($string1, $stringRepalce1, $replaceString);
$replaceString = str_replace($string2, $stringRepalce2, $replaceString);
$replaceString = str_replace($string3, $stringRepalce3, $replaceString);
$replaceString = str_replace($string5, $stringRepalce5, $replaceString);
$replaceString = str_replace($string6, $stringRepalce6, $replaceString);
$replaceString = str_replace($string7, $stringRepalce7, $replaceString);
$replaceString = str_replace($string8, $stringRepalce8, $replaceString);
$replaceString = str_replace($string9, $stringRepalce9, $replaceString);
$replaceString = str_replace($string10, $stringRepalce5, $replaceString);

$msg_messageX = $replaceString;
// echo $msg_messageX;
// exit();
?>
<script>
    title='Email';
    titleTag(title);  
</script>
<div class="container">
    
    <div class="row text-center  pt-4 pb-4">
        <div class="col-md-1 text-left">
        </div>
    
        <div class="col-md-10 text-left w3-green p-3 text-left ">
                <div class="text-right">
                <div>
                    <h5><span class="text-warning">OOO </span>READING MESSAGES</h5>
                </div>
        <!-- top/Down Short cut menu -->
                
                <small>
                    <a href="/index1.php" class="btn btn-default btn-sm text-light">Home</a>
                    <a href="/view/emailBoard.php" class="btn btn-default btn-sm text-light"> Message</a>
                    <a href="/view/explore.php" class="btn btn-default btn-sm text-light">Explore</a>
                    <a href="/view/settings.php" class="btn btn-default btn-sm text-light">Board</a>
                    
                </small>
                <!-- shortcut menu end -->
                </div>
                <hr />
                <?php require_once __DIR__ . '/../advert/advert1.php';?>

                <div class="card"> 
                    <div class="card-header"> 
                        <a href="/view/emailBoard.php" class="btn btn-success mb-1"><span>Back inbox</span></a>
                        <!-- <a href="#" class="btn btn-success mb-1"><span>Previous</span></a> -->
                    </div>
                


                    <!-- <hr> -->
                    <div class="card-body"> 
                        <h6  class="w3-text-green pl-2">
                            <span>From: </span>

                          <span class='w3-text-black'>
                                <a href='/model/searchProfileProcess.php?id=       <?php echo $result->sender_id; ?>'>
                                        <?php echo $result->user_name ; ?>
                                </a>
                            </span>  

                           
                        </h6>
                        <h6  class="w3-text-green pl-2">
                            <span>Subject:  </span>
                                <?php echo $result->msg_subject; ?>
                           
                        </h6>
                        <h6  class="w3-text-green pl-2">
                            <span>Date | Time: </span>
                            <?php echo  date('d/m/y G.i:s',$result->msg_time) ;?>
                        </h6>
                        <hr>
                        <p>
                        <?php 
                            echo
                             "<div class='w3-text-grey'>$msg_messageX</div>" 
                        ?>
                        </p>
                        <!-- <hr> -->
                    </div> 


                    <div class="card-footer"> 
                    
                        <!-- <a href="#" class="btn btn-success mb-1"><span>Forward</span></a> -->
                        <?php
                        if($result->user_name != $_SESSION['USER_NAME']){
                        ?>
                        <a href='/view/composeReply.php?RFrom=<?php echo $result->user_name ;?>&RSubject=<?php echo  $result->msg_subject ;?>&RMessage=<?php echo  $result->msg_message;?>&RTime=<?php echo $result->msg_time ;?>' class="btn btn-success mb-1"><span>Reply</span></a>

                        <?php
                        }
                        ?>
                      
                        <!-- <a href="#" class="btn btn-success mb-1"><span>Mark Unread</span></a> -->
                       
                        <a href='/model/deleteMessageProcess.php?id=<?php echo $result->msg_id ; ?>' class='btn btn-success  '><span>Delete</span></a>   
                        <!-- <a href="#" class="btn btn-success mb-1"><span>Delete All</span></a> -->
                
                        <!-- <a href="#" class="btn btn-success mb-1"><span>Connect</span></a> -->
                    </div>
            
                </div>

            <div class="col-md-1 text-left" style="opacity:0.8; border-radius:2px ">
            </div>

        </div>
    </div>

</div>
<?php require_once __DIR__ . '/testimony.php';?>
<?php require_once __DIR__ . '/footer.php';?>
