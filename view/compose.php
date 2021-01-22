<?php
require_once  __DIR__ . '/../view/header2.php';
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

$profileName = $_GET['profileName'] ?? "";

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


?> 
<script>
    title='Compose email';
    titleTag(title);  
</script>

<div class="container">
    <div class="row text-center  pt-4 pb-4">
        <div class="col-md-1 "></div>
        <div class="col-md-10 text-left w3-green pt-3 pb-3 text-left ">
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
                <input type="text" class="form-control" name="email" placeholder="Email" value= <?php echo $profileName?> >
            </div>


            <div class="form mt-3">
                <input type="text" class="form-control" name="subject" placeholder="Subject">
            </div>
            <p class='text-center'>
              <span style='color:black; font-size:12px'>.. | New Line;
              {p | New paragraph,
              p} | end Paragrph,
              {h | Heading,
              h} | end Heading,
              </span>
              
            </p>
            <div class="form mt-3">
                <textarea  class="form-control" name="message" placeholder="Message" style="height:200px"></textarea>
            </div>



            <div class="form mt-3">
                <button type="submit" value="submit" name="submit" class="btn w3-amber form-control mb-1">Send</button>                    
            </div>
        
     
        </div>

       
        <div class="col-md-1 text-left">
           
          
        </div>

       
    </div>
</div>

<?php require_once __DIR__ . '/testimony.php';?>
<?php require_once __DIR__ . '/footer.php';?>
