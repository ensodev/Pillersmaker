<?php if(!isset($_SESSION))
{
session_start();
}
?>
<?php require_once  __DIR__ . '/../controller/checkSessionContol.php';?>
<?php checkNotSession(); ?>
<?php require_once __DIR__ . '/../controller/checkPaidMember.php'; ?>
<?php require_once  __DIR__ . '/header3.php';?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>

<?php 
 if(isset($_GET['result'])){
   $result = $_GET['result'];
   var_dump($result);
 }
?>

<script>
    title='Search User Profile';
    titleTag(Track Transactions);  
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
    font-size:12px;
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
    font-size:13px;
}

</style>



<!-- <?php
//  if($result){
?>  -->
<!-- -->

</div>



<div class="container text-center">
    
    <div class="row mt-2 text-center">
        <div class="col-md-2">
            
        </div>
         
        <div class="col-md-8 w3-green mt-2 mb-4 pt-3 pb-2 " style="opacity:0.8; border-radius:2px">
            <div class="text-right">
                <h5><span class="w3-text-white"><span class="w3-text-amber w3-animate-left">OOO</span> Track Transaction</span></h5>

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

                <form action="/model/trackTrans.php" method="POST" class= 'form'>
                    <div>
                         <input type="text" name="transid" placeholder="Enter Transaction id" class="form-control">   
                    </div>
                    <br>

                    <div>
                        <input type="submit" name="submit" value="Submit" class="form-control btn btn-warning">   
                    </div>
                </form>
            </div>
            <hr>
            
            
        </div>
        
        <div class="col-md-2"></div>
    </div>
</div>

<?php require_once __DIR__ . '/testimony.php';?>
<?php require_once __DIR__ . '/footer.php';?>
