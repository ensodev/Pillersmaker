<?php
require_once  __DIR__ . '/header2.php';
require_once  __DIR__ . '/../controller/checkSessionContol.php'; 
require_once __DIR__ . '/../model/dailyPageView.php';

checkNotSession();

// require_once '../others/alertFunction.php'; 

// if(!isset($_SESSION['USER_ID']) && !isset($_SESSION['USER_ID'])){
//    $msg="Please login ";
//    $msgColor="danger";
//    msgAlert($msg, $msgColor);
// }
if (isset($_GET['msg']) && isset($_GET['msgColor'])){
    $msg = $_GET['msg'];
    $msgColor = $_GET['msgColor'];
    echo "
    <div class='container mt-3 text-center'>
      <div class='alert alert-$msgColor'>
        $msg
      </div>
    </div> 
    ";
}

if (isset($_GET['subjectTooMuch'])){
    $subjectTooMuch = $_GET['subjectTooMuch'];
    $msgColor = $_GET['msgColor'];
    echo "
    <div class='container mt-3 text-center'>
      <div class='alert alert-$msgColor'>
        $subjectTooMuch
      </div>
    </div>
    ";
}

if(!isset($_GET['RFrom']) || !isset($_GET['RSubject']) || !isset($_GET['RTime']) ||        !isset($_GET['RMessage'])){
  $msg = 'Misssing Identity, this message cant be replied, please use compose!';
  $msgColor = 'info';
    echo "
    <div class='container mt-3 text-center'>
      <div class='alert alert-$msgColor'>
        $msg
      </div>
    </div>
    ";

    exit();

}

$to = $_GET['RFrom'];
$subject =$_GET['RSubject'];
$time =$_GET['RTime'];
$time = date('d/m/y',$time);
$message =$_GET['RMessage'];

$replaceString = $message;    

require_once __DIR__ . "/../model/msgReformatRead.php";

// $string1 = "PZtag1";
// $string2 = "PZtag2";
// $string3 = "PZtag3";
// $string5 = "PZtag5";
// $string6 = "PZtag6";
// $string7 = "PZtag7";
// $string8 = "PZtag8";
// $string9 = "PZtag9";

// $stringRepalce1 = "<";
// $stringRepalce2 = ">";
// $stringRepalce3 = "</";
// $stringRepalce5 = "<br>";
// $stringRepalce6 = "<p>";
// $stringRepalce7 = "<h4>";
// $stringRepalce8 = "</p>";
// $stringRepalce9 = "</h4>";

// $replaceString = str_replace($string1, $stringRepalce1, $replaceString);
// $replaceString = str_replace($string2, $stringRepalce2, $replaceString);
// $replaceString = str_replace($string3, $stringRepalce3, $replaceString);
// $replaceString = str_replace($string5, $stringRepalce5, $replaceString);
// $replaceString = str_replace($string6, $stringRepalce6, $replaceString);
// $replaceString = str_replace($string7, $stringRepalce7, $replaceString);
// $replaceString = str_replace($string8, $stringRepalce8, $replaceString);
// $replaceString = str_replace($string9, $stringRepalce9, $replaceString);




$message = $replaceString;
// echo $msg_messageX;
// exit();


?>
<script>
    title='Compose email';
    titleTag(Reply);  
</script>
<div class="container">
    <div class="row text-center  pt-4 pb-4">
        <div class="col-md-2 "></div>

        <div class="col-md-8 text-left w3-green pt-3 pb-3 text-left ">
        <div class="text-right">
            <h5><span class="w3-text-yellow w3-animate-left">OOO </span>Send Message</h5>

             <div class="text-right">
      <!-- top/Down Short cut menu -->
               <small>
                <a href="/index1.php" class="btn btn-default btn-sm text-light">Home</a>
                <a href="/view/emailBoard.php" class="btn btn-default btn-sm text-light"> Message</a>
                <a href="/view/explore.php" class="btn btn-default btn-sm text-light">Explore</a>
                <a href="/view/settings.php" class="btn btn-default btn-sm text-light">Board</a>
                
               </small>
            <!-- shortcut menu end -->
      </div>

            <hr>
          
        </div>

            <form action="../model/messageProcessModel.php" method="POST">

            <div class="form">
                <input type="text" class="form-control" name="email" placeholder="admin@pillersmakers.com" value="<?php echo $to  ;?>">
            </div>


            <div class="form mt-3">
                <input type="text" class="form-control" name="subject" placeholder="Subject" value="<?php echo 'RE: '.$subject  ;?>">
            </div>

            <div class="form mt-3">
                <textarea  class="form-control" name="message" placeholder="Message" style="height:200px">
                
                <?php 
                
                echo "From: ".$to."--";
                echo "Subject: ".$subject."--";
                echo "Sent On: ".$time."--";
                echo "Message: ".$message;
                
                ?>
                
                </textarea>
            </div>



            <div class="form mt-3">
                <button type="submit" value="submit" name="submit" class="btn w3-amber form-control mb-1">Send</button>                    
            </div>
        
     
        </div>

       
        <div class="col-md-2 text-left">
           
          
        </div>

       </div>
    </div>


<?php require_once __DIR__ . '/testimony.php';?>
<?php require_once __DIR__ . '/footer.php';?>