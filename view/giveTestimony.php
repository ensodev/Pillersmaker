<?php
require_once  __DIR__ . '/header2.php';
require_once  __DIR__ . '/../controller/checkSessionContol.php'; 

checkNotSession();
require_once  __DIR__ . '/../model/sessionExpire.php';
require_once __DIR__ . '/../model/dailyPageView.php';


//start

//CHECK IF USER CAN GIVE TESTIMONY HERE
//end

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

?>
<script>
    title='Testimony';
    titleTag(title);  
</script>

<div class="container">
    <div class="row text-center  pt-4 pb-4">
        <div class="col-md-3 "></div>
        <div class="col-md-6 text-left w3-green pt-3 pb-3 text-left ">
        <div class="text-right">
            <h5><span class="w3-text-yellow w3-animate-left">OOO </span>Send Testimony</h5>
            <hr>
            <small>
                    <a href="/index1.php" class="btn btn-default btn-sm text-light">Home</a>
                    <a href="/view/emailBoard.php" class="btn btn-default btn-sm text-light"> Message</a>
                    <a href="/view/explore.php" class="btn btn-default btn-sm text-light">Explore</a>
                    <a href="/view/settings.php" class="btn btn-default btn-sm text-light">Board</a>
                    
                  </small>

        </div>

            <form action="../model/testimonyProcess.php" method="POST">

            <div class="form mt-3">
                <textarea  class="form-control" name="message" placeholder="Testimony" style="height:200px"></textarea>
            </div>

            <div class="form mt-3">
                <button type="submit" value="submit" name="submit" class="btn w3-amber form-control mb-1">Send</button>                    
            </div>
        
     
        </div>

       
        <div class="col-md-3 text-left">
           
          
        </div>

       
    </div>
</div>

<?php require_once __DIR__ . '/testimony.php';?>
<?php require_once __DIR__ . '/footer.php';?>
