<?php if(!isset($_SESSION))
{
session_start();
}
?>
<?php require_once  __DIR__ . '/../controller/checkSessionContol.php';?> 
<?php checkNotSession(); ?>
<?php require_once  __DIR__ . '/../model/sessionExpire.php';?>
<?php require_once __DIR__ . '/../controller/checkPaidMember.php'; ?>
<?php require_once  __DIR__ . '/header3.php';?>
<?php require_once  __DIR__ . '/../model/connection.php';?>
<?php require_once __DIR__ . '/../model/dailyPageView.php'; ?>

<?php

if(isset($_GET)){
  if(isset($_GET['pvcoinsent'])){
    if($_GET['pvcoinsent'] == 'yes'){
     echo "<div class='container text-center'>
      <div class='alert alert-success'>
        PVC sent to User, check the sent transaction bellow
        for your transaction ID..!
      </div>
     </div>";
    }
  }
}

 if(isset($_GET['error'])){
   
  if($_GET['error'] == 'submit'){
     echo "
      <div class='container text-center'>
        <div class='alert alert-warning'>
          Page can't be found, Request this page from the right source..!
        </div>
      </div>
     ";
     exit();
    }else if($_GET['error'] == 'field'){
    echo "
     <div class='container text-center'>
       <div class='alert alert-warning'>
         Please fill the all field..!
       </div>
     </div>
    ";
    exit();
   }else if($_GET['error'] == 'not1'){
    echo "
     <div class='container text-center'>
       <div class='alert alert-warning'>
         Sorry value can't be less than one..!
       </div>
     </div>
     
    ";
    exit();
   }else if($_GET['error'] == 'tooMuch'){
    echo "
    <div class='container text-center'>
      <div class='alert alert-warning'>
        Sorry value can't be up to inputed amount..!
      </div>
    </div>
    
   ";
   }else if($_GET['error'] == 'balance'){
    echo "
     <div class='container text-center'>
       <div class='alert alert-warning'>
         You dont have enough PVC to perform this transaction..!
       </div>
     </div>
    ";
    exit();
   }else if($_GET['error'] == 'sendself'){
    echo "
     <div class='container text-center'>
       <div class='alert alert-warning'>
         You can't send to yourself you might lose PVC if you try again..!
       </div>
     </div>
    ";
    exit();
   }else if($_GET['error'] == 'usernotfound'){
    echo "
     <div class='container text-center'>
       <div class='alert alert-warning'>
         User has no active account..!
       </div>
     </div>
    ";
    exit();
   }else{
    echo "
    <div class='container text-center'>
      <div class='alert alert-warning'>
        Something went wrong contact customer care..!
      </div>
    </div>
   ";
   exit();
   }
}
?>

<?php
$user_id = $_SESSION['USER_ID'];
$user_email = $_SESSION['USER_EMAIL'];
//get PVcoin info
$sql = "SELECT * FROM `vote_coin_table` WHERE user_id =:user_id";
$stmt= $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$resultRecord = $stmt->fetch();

//get sent transaction
$sql = "SELECT * FROM `view_coin_history` WHERE transtype = 'Received' AND point_email =:user_email ORDER BY trans_date DESC LIMIT 50";
$stmt= $pdo->prepare($sql);
$stmt->execute(['user_email'=>$user_email]);
$resultRecordSent = $stmt->fetchAll();

//get received transaction
$sql = "SELECT * FROM `view_coin_history` WHERE transtype = 'Sent' AND point_email =:user_email ORDER BY trans_date DESC LIMIT 50";
$stmt= $pdo->prepare($sql);
$stmt->execute(['user_email'=>$user_email]);
$resultRecordReceived = $stmt->fetchAll();
?>

<script>
    // title='Profile';
    titleTag('Pillersmaker | pvc board');  
</script>

<div class="container text-center">
    
  <div class="row mt-3 text-center">
    <div class="col-md-1">    
    </div>
         
    <div class="col-md-10 w3-green mt-2 mb-4 pt-3 pb-3 " style="opacity:0.8; border-radius:2px"> 
      <div > 
        <h4 class="m-3 text-right"><span class="w3-text-amber w3-animate-left">OOO </span>PVC Board</h4>
      </div> 
     
      <div class="p-3 border rounded text-center">
        <div class='mb-3 text-left'>
          <!-- <a href='/view/myPvc.php'><span class='btn btn-sm btn-light mb-2'>PVC Cards</span></a> -->
          <!-- <a href='/view/cashOutPvc.php'><span class='btn btn-sm btn-light mb-2'>Cash PVC</span></a> -->
          <!-- <a href='/view/givePvcCard'><span class='btn btn-sm btn-light mb-2'>Gift Card</span></a> -->
          <!-- <a href='/view/buyPvc.php'><span class='btn btn-sm btn-light mb-2'>Buy Card</span></a> -->
        </div>
        <table class='table table-condensed table-responsive borderd'>
          <tr class='info'>
            <th>Balance</th>
            <th>Recieved</th>
            <th>Sent</th>
            <th>Used</th>
          </tr>
      
         <tr>
            <td>
              <?php if(isset($resultRecord->total_bal)){
                echo "$resultRecord->total_bal PVC";
                }
              ?>
            </td>
            <td>
            <?php if(isset($resultRecord->total_received)){
                echo "$resultRecord->total_received PVC";
                }
              ?>  
            </td>
            <td>
            <?php if(isset($resultRecord->total_sent)){
                echo "$resultRecord->total_sent PVC";
                }
              ?>   
            </td>
            <td>
            <?php if(isset( $resultRecord->total_used)){
                echo  "$resultRecord->total_used PVC";
                }
              ?>  
             </td>
          </tr> 
               
        </table>
      <form method="POST" action="/model/sellPvCoinProcess.php">
        <div>
          <input type="number" name="amount" placeholder="Amount" class="form-control">
        </div>
        <br>
 
        <div>
          <input type="text" name="receiver_email" placeholder="Receiver Email" class="form-control">
        </div>
        <br>

        <div>
          <input type="password" name="pin" placeholder="Your Pin" class="form-control">
        </div>
        <br>
        <div>
          <input type="submit" name="submit" value="Submit" class="form-control btn-warning">
        </div>
      </form>
    

      <div class="accordion" id="accordionExample">
  <hr>
 <div class="card">
   <div class="card-header w3-green" id="headingOne">
     <h2 class="mb-0">
       
     </h2>
   </div>
 
   <div id="article1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
     
     <div class="card-body text-success">
   

       Note that this transaction did not contain the used PVC, you can check the used PVC at the top of this page, if you have any question or issue regarding your transaction history kindly contact <a href='/view/customerCare.php'>Customer Care</a> 
       <br>
       Note also that we can only display the last 50 transaction on this page.
       <div><a href='/view/trackTrans.php' class='btn btn-danger mt-2'>Track Transaction</a></div> 
     </div>
   </div>
 </div>
 
 <!-- article2 -->
 <div class="card">
   <div class="card-header" id="headingTwo">
     <h2 class="mb-0">
       <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#article2" aria-expanded="false" aria-controls="article2">
         <p class="w3-text-green ">Sent PVC</p>
       </button>
     </h2>
   </div>
   <div id="article2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
   <div class="card-body text-left text-info">
      <table class='table table-responsive table condenced'>


                <tr class='info'>
            <th>ID</th>
            <th>Date</th>
            <th>User</th>
            <th>Amount</th>
            <th>Transaction id</th>
          </tr>
        <?php
        $i=0;
        foreach($resultRecordReceived as $value) {
          
          $i++;
          echo "
          
          <tr class='info'>
            <td>$i</td>
            <td>

            "; echo date('m/d/y G.i:s',$value->trans_date);
            
           echo"   </td>
            <td>$value->point_email</td>
            <td>$value->amount PVC</td>
            <td>$value->trans_id</td>
          </tr>
          
          ";         
        }          
        ?>

       </table>   
       
     </div>
   </div>
 </div>

 <!-- article4 -->
 <div class="card">
    <div class="card-header" id="headingthree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#article4" aria-expanded="false" aria-controls="article4">
          <p class="w3-text-green ">Receievd PVC</p>
        </button>
      </h2>
    </div>
    <div id="article4" class="collapse" aria-labelledby="headingthree" data-parent="#accordionExample">
      <div class="card-body text-left text-info">
      <table class='table table-responsive table condenced'>

        <tr class='info'>
            <th>ID</th>
            <th>Date</th>
            <th>User</th>
            <th>Amount</th>
            <th>Transaction id</th>
          </tr>
        <?php
        $i=0;
        foreach($resultRecordSent as $value) {
          
          $i++;
          echo "
          
          <tr class='info'>
            <td>$i</td>

            <td>";
              
              echo date('m/d/y', $value->trans_date);
           echo " </td>
            <td>$value->point_email</td>
            <td>$value->amount PVC</td>
            <td>$value->trans_id</td>
          </tr>
          
          ";         
        }          
        ?> 
      </table>  

      </div>
    </div>
  </div>
      
    </div>
    </div>

    <div class="col-md-1"></div>
    </div>
</div>


<?php require_once __DIR__ . '/testimony.php';?>
</div>
<?php require_once __DIR__ . '/footer.php';?>
