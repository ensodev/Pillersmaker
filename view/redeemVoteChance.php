<?php
require_once  __DIR__ .'/../model/connection.php'; 
require_once  __DIR__ .'/header2.php';
require_once __DIR__ . '/../model/dailyPageView.php';
require_once  __DIR__ .'/../controller/checkSessionContol.php';  
checkNotSession();
require_once  __DIR__ .'/../model/sessionExpire.php';

require_once  __DIR__ .'/../model/pvcRedeem.php';
      
if(isset($_GET['redeemed'])){
  $redeem = $_GET['redeemed'];
  echo " 
    <div class='container text-center'>
      <div class='alert alert-success'>
        You have redeemed the total of $redeem PVC...!
      </div>
    </div>
  ";
} 
 
$last_amount_redeem = $resultRedeemHistory->last_amount_redeem ?? '0';
$redeem_total_time = $resultRedeemHistory->redeem_total_time ?? '0';
 
?>

<script>
    title='Redeem Board';
    titleTag(title);  
</script>

<style>
.menu{
    padding:5px 15px;
    color:white;
    background-color:green;
    border-right:1px solid brown ;
    margin:3px;
    border-bottom-left-radius:10px;
    text-decoration:none;


}

.menu:hover{
    padding:5px 15px;
    color:white;
    opacity:0.9;
    background-color:green;
    border-right:3px solid brown ;
    cursor:pointer;
   
}

</style>

<div class="container">
    <div class="row text-center pt-4 pb-4">
              
      <div class="col-md-2   text-left"></div>
  
          
      <div class="col-md-8 text-left w3-green " style="opacity:0.8; border-radius:2px ">
                
          <div class="mt-2 mb-2 pr-2 text-right">
            <h5> <span class="w3-text-amber">OOO</span> REDEEM POST PVC</h5>
          </div>
          <hr> 
          <div class="card text-center mb-3">
            <div class="card-header text-center">
             <p class='text-success'>HISTORY</p>
            </div>
 
            <div class="card-body text-center text-success">
              <table class='table'>
                <tr>
                  <th>Total Redeem</th>
                  <th>Last Redeemed</th>
                  <th>No of Redeem</th>
                <tr>

                <tr>
                  <th><?php echo $total_amount_redeem;?></th>
                  <th><?php echo $last_amount_redeem;?></th>
                  <th><?php echo $redeem_total_time;?></th>
                <tr>
 
                
              </table> 

               <table class='table'>
                <tr>
                  <th>Post Vote</th>
                  <th>Redeemable</th>
                <tr> 
                <tr>
                  <th><?php echo $total_vote;?></th>
                  <th><?php echo $availabeRedeem ;?></th>
                <tr>
              </table>
              <div>
              <?php   
               if($availabeRedeem > 12){

                ?> 
                <p class='text-danger'>12% Charges</p><hr>
                
                  <form action="../model/redeemChanceNow.php" method="POST">
                    <input type="hidden" name="post_id" value="<?php echo $post_id;?>">
                    <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                    <input type="submit" name="submit" value="Redeem" class="btn btn-warning">
                  </form>
                <?php
               
               }
              ?>
              </div>
            </div>

            <div class="card-footer text-center ">
            </div>


          </div>

      </div>         

      <div class="col-md-2 text-left"></div>
    
      </div>
</div>


<?php require_once __DIR__ . '/testimony.php';?>
<?php require_once __DIR__ . '/footer.php';?>
