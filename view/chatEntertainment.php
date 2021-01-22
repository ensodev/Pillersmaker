
<?php if(!isset($_SESSION))
{
session_start();
}
?>
  
<?php require_once __DIR__ . '/../controller/checkSessionContol.php';?> 
<?php checkNotSession(); ?>
<?php require_once  __DIR__ . '/../model/sessionExpire.php';?>

<?php require_once __DIR__ . '/../controller/checkPaidMember.php'; ?>
<?php require_once  __DIR__ . '/header3.php';?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>

<?php $jqueryLoad = "chat"; ?>
<?php 

if(isset($_GET['reported'])){
  if($_GET['reported'] == 'yes'){
    echo "
      <div class='container text-center mt-3'>
        <div class='alert alert-success'>
            User have been reported to the admin and moderators..!
        </div>
      </div>    
    ";
  } 
}

if(isset($_GET['reported'])){
  if($_GET['reported'] == 'wait'){
    echo "
      <div class='container text-center mt-3'>
        <div class='alert alert-info'>
            You recently reported a user, you have to wait few munites to report user again, or click here <a href='/view/reportmembers.php'>Report Member</a>..!
        </div>
      </div>    
    ";
  }
} 


if(isset($_GET['reported'])){
  if($_GET['reported'] == 'lost'){
    echo "
      <div class='container text-center mt-3'>
        <div class='alert alert-info'>
            Prove of report on the chat is lost but we are going to keep watching the accused, thank you for reporting...! <a href='/view/reportmembers.php'>Report Member</a>..!
        </div>
      </div>    
    ";
  }
} 

?>
 

<script>
    titleTag('Entertainment Chat Board');  
</script>

<!-- -->
<div class="container text-center">
    
    <div class="row mt-3 text-center">
        <div class="col-md-2">
            
        </div>
         
        <div class="col-md-8 w3-green mt-2 mb-4 pt-3 pb-3 " style=" border-radius:2px">

            <div class="text-right">
                    <h5><span class="w3-text-white"><span class="w3-text-amber w3-animate-left">OOO
                        </span>
                          Chat Tray
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
            </div>
            
            <div id="chattray"class="w3-white p-4 m-2" style="height:300px; overflow-x:auto" >
           
            </div>
           
           <div class="text-warning" >
            <h5 id="success" pb-1> </h5>
           </div>
            <div class="w3-green" style="height:100px">
              <div>
                <form id="form">
                  <div>
                    <textarea name="message" id="message" class="form-control mt-2" style="height:70px" placeholder="what's on your mind"></textarea>
                  </div>
                  <div >
                    <input type="submit" name="submit" id="submit" class=" form-control btn btn-warning">
                  </div>
                </form>  
              </div>

            </div>


        </div>
              
        <div class="col-md-2">
            
        </div>
    </div>
</div>
                   
                   

<?php require_once __DIR__ . '/testimony.php';?>
<?php require_once __DIR__ . '/footer.php';?>
