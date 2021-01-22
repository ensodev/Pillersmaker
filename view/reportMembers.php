<?php
require_once  __DIR__ . '/header2.php';
require_once  __DIR__ . '/../controller/checkSessionContol.php'; 
checkNotSession();
require_once  __DIR__ . '/../model/sessionExpire.php';
require_once __DIR__ . '/../model/dailyPageView.php';

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

if (isset($_GET['errorAccused'])){
   if($_GET['errorAccused'] == 1){
    echo "
    <div class='container mt-3 text-center'>
      <div class='alert alert-danger'>
        User not a member, check the username or please click report member from user profile.
        
      </div>
    </div>
    ";
   }
}

?>
<script>
    title='Report Members';
    titleTag(title);  
</script>

<div class="container">
    <div class="row text-center  pt-4 pb-4">
        <div class="col-md-3 "></div>
        <div class="col-md-6 text-left w3-green pt-3 pb-3 text-left ">
        <div class="text-right">
            <h5><span class="w3-text-yellow w3-animate-left">OOO </span>Report Members</h5>
          
        </div>

            <form action="../model/reportMembersProcess.php" method="POST">

            <div class="form mt-3">
                <input type="text"  class="form-control" name="accused" placeholder="Enter the Username" value="<?php 
                    if(!isset($_GET['reportMem'])){
                        echo '';
                    }else{
                        if($_GET['reportMem'] =='' || $_GET['reportMem'] == false){
                            echo '';
                        }else{
                            $memberName =$_GET['reportMem'];
                            echo $memberName;
                        }
                    }
                
                ?>">
            </div>
            <div class="form mt-3">
                <textarea  class="form-control" name="message" placeholder="Message" style="height:200px"></textarea>
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
