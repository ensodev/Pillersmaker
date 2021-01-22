<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php require_once __DIR__ . '/../controller/checkSessionContol.php';?>
<?php checkNotSession();?>
<?php require_once  __DIR__ . '/../model/sessionExpire.php';?>
<?php require_once 'connection.php';?>
<?php require_once  __DIR__ . '/../controller/checkPaidMember.php'; ?>
<?php require_once  __DIR__ . '/../view/header3.php';?>

<?php


if(!isset($_POST['submit']) || !isset($_POST['transid'])){
  echo "transaction not fund";
}else{
    $trans_id = $_POST['transid'];
}

$sql = "SELECT trans_date, transtype, point_email AS email, amount, trans_id FROM `view_coin_history` WHERE trans_id =:trans_id";
$stmt=$pdo->prepare($sql);
$stmt->execute(['trans_id'=>$trans_id]);
$result = $stmt->fetchAll();

if(isset($result)){
?>

<div class="container text-center">
    
    <div class="row m-2 text-center">
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
                <div class='text-left'>
                <table class='table table-responsive table condenced'>


                      <tr class='info'>
                      <th>Date</th>
                      <th>Type</th>
                      <th>Email</th>
                      <th>Amount</th>
                      <th>Transaction id</th>
                      </tr>
                      <?php
                      $i=0;
                      foreach($result as $value) {

                      $i++;
                      echo "

                      <tr class='info'>
                      <td>";
                      
                      echo date('m/d/y G.i:s',$value->trans_date);
                      echo"<td>$value->transtype</td>
                      <td>$value->email</td>
                      <td>$value->amount PVC</td>
                      <td>$value->trans_id</td>
                      </tr>

                      ";         
                      }          
                      ?>

                      </table> 
                    </div>  

                
            </div>
            <hr>
            
            
        </div>
        
        <div class="col-md-2"></div>
    </div>
</div>

<?php require_once  __DIR__ . '/../view/testimony.php' ;?>
<?php require_once  __DIR__ . '/../view/footer.php' ;?>



<?php



}else{
 echo "<script>location.href='/view/trackTrans.php?error=1'</script>";
 header("location: ../view/trackTrans.php?error=1");
exit();
}