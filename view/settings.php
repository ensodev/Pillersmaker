<?php if(!isset($_SESSION))
{
session_start();
}
?>
<?php require_once  __DIR__ . '/../controller/checkSessionContol.php';?> 
<?php checkNotSession(); ?>
<?php require_once  __DIR__ . '/../model/sessionExpire.php';?>
<?php require_once  __DIR__ . '/header3.php';?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>

<?php

if(isset($_GET['lock'])){
    if($_GET['lock'] == 'yes'){
        echo "<div class='alert alert-success text-center'>
                Code activated, check your email for your links.
              </div>";
    }
        
}

?>
 
<script>
    // title='Profile';
    titleTag('My Board : Place where you can easily navigate the other part site');  
</script>

<div class="container text-center">
    
    <div class="row mt-3 text-center">
        <div class="col-md-1">
            
        </div>
        
        <div class="col-md-10 w3-green mt-2 mb-4 pt-3 pb-3 " style="opacity:0.8; border-radius:2px">
            <div class="text-right">
                <h5><span class="w3-text-white"><span class="w3-text-amber w3-animate-left">OOO</span> My Board</span></h5>
                <hr>
                <?php require_once __DIR__ . '/../advert/sirpheranmi.php';?>
            </div> 
            <div class="card">
                <div class="card-body  w3-text-green text-center">
                <div class="container">
 
                    <a href="/view/sellPvCoin.php"class="form-control btn btn-dark">PVC Transaction</a>

                    <a href="/view/trackTrans.php"class="form-control btn btn-warning">Track PVC Transaction</a>

                   <a href="/view/reportMembers.php"class="form-control btn btn-dark">Report User</a>
                   
                   <a href="/view/unapprovedConnection.php"class="form-control btn btn-warning">Unapproved Connection</a>

                   <a href="/view/chatEntertainment.php" class="form-control btn btn-dark">Chat Tray</a>
                   
                   <a href="/view/competitions.php"class="form-control btn btn-warning">Competition</a>

                   <a href="/view/profile.php"class="form-control btn btn-dark">Edit Profile</a>
                   
                   <a href="/view/giveTestimony.php"class="form-control btn btn-warning">Give Testimony</a>
                   
                   <a href="/view/customerCare.php"class="form-control btn btn-dark">Customer care</a>

                   <a href="/view/myWorkspace.php"class="form-control btn btn-warning">Post Article</a>
                    
                   <a href="/view/postwork.php?id=<?php echo $_SESSION['USER_ID'] ; ?>&PostUserName=<?php echo $_SESSION['USER_NAME']?>"class="form-control btn btn-dark">View my Posts</a>
                   
                   <a href="/view/ProfileSearch.php"class="form-control btn btn-warning">Search Members</a>
                   
                   <a href="/view/explore.php"class="form-control btn btn-dark">Explore Boards</a>
                   
                   <a href="/view/events.php"class="form-control btn btn-warning">PillersMaker Event</a>

                   <a href="/view/pvcpin.php"class="form-control btn btn-dark">Setup Pin</a>

                   <a href="/model/activateLockUnlockAccount.php"class="form-control btn btn-warning">Activate Lock Security</a>

                   <!-- <a href="/view/buyPvc.php"class="form-control btn btn-dark">Buy PVC Card</a> -->
                   
                   <!-- <a href="/model/#.php"class="form-control btn btn-warning">Transfer card PVC Card</a> -->

                   <!-- <a href="/view/cashOutPvc.php"class="form-control btn btn-dark">cash out PVC</a> -->
                   
                   <!-- <a href="/model/#.php"class="form-control btn btn-warning">My PVC Cards</a> -->

                   <a href="/view/kyc.php"class="form-control btn btn-dark">KYC</a>

                   <a href="/view/generateTicket.php"class="form-control btn btn-warning">Generate Ticket</a>

                   <a href="/view/Tickets.php?s=<?php echo trim($_SESSION['USER_ID'])?>"class="form-control btn btn-dark">Active Ticket</a>

                </div>
                </div>
            </div>

                
<!-- card body 2 -->
        <div class="col-md-1"></div>
    </div>
</div>


<?php require_once __DIR__ . '/testimony.php';?>
</div>
<?php require_once __DIR__ . '/footer.php';?>

