<?php
require_once  __DIR__ .'/header2.php';
// require_once  __DIR__ .'/../controller/checkSessionContol.php'; 
require_once __DIR__ . '/../model/dailyPageView.php';

// checkNotSession();


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


?>
<script>
    title='Pillersmaker | Payment page';
    titleTag(title);  
</script>

<div class="container">
    <div class="row text-center  pt-4 pb-4 m-2">
        <div class="col-md-6 text-left w3-green pt-3 pb-3">
          <h3>Payment Info and Directions</h3>
          <div class="container text-left w3-white pt-3 pb-3">
            <h4>Payment Directives</h4>
            <hr />     
            <p>We presently accept bank transfer and bank deposite.</p>
            <p></p>
            <hr>
            <h4>Payment Proccess</h4>
            <hr />     
            <p> 
            <ol>
              <li>Generate payment ticket id by <a href="/view/generateTicket.php">clicking here</a></li>
                <hr />
              <li>For bank information contact <a href="/view/bankInfo.php">here</a></li>
               <hr />
              <li>Make payment by bank tranfer/deposit</li>
               <hr />
              <li>Enter your payment information in the form here, select the right payment purpose and click Send Button.</li>
              <hr />
              
            </ol>
            </p>


            


          </div>
        </div>
        <div class="col-md-6 text-left w3-green pt-3 pb-3">
        <div class="text-right">
            <h4><span class="w3-text-yellow w3-animate-left">OOO </span>Payment Details</h4>
 
          
        </div>

            <form action="../model/paymentProcess.php" method="POST">

            <!-- <div class="form"> 
                 <input type="text" class="form-control" name="payment" placeholder="payment" value="payment" readonly>
                 </div>-->
 
            <div class="form mt-3">    
                <select name="service" class="form-control"                       placeholder="Your Main Talent">
                  <option value="compititionpayment">Competition</option>
                  <option value="membershippayment">Membership Upgrade</option>
                  <option value="supportpayment">Support/Donation</option>
                  <option value="advertismentpayment">Advertisement</option>
                  <option value="pvccoinpayment">Buy PVC</option>
                  <option value="pvccardpayment">Buy PVC Card</option>
                  <option value="otherspayment">Others</option>   
                </select>
            </div>

            <div class="form mt-3">
                <input type="text" class="form-control" name="ticketid" placeholder="Ticket Id">
            </div>
 
            <div class="form mt-3">
                <input type="text" class="form-control" name="subject" placeholder="Payment Purpose">
            </div>

            <div class="form mt-3">
                <textarea  class="form-control" name="message" placeholder="Payment Purpose" style="height:200px"></textarea>
            </div>



            <div class="form mt-3">
                <button type="submit" value="submit" name="submit" class="btn w3-amber form-control mb-1">Send</button>                    
            </div>
        
     
        </div>

       
        <!-- <div class="col-md-4 text-left">
           
          
        </div> -->

       
    </div>
    </div>



<?php require_once __DIR__ .'/testimony.php';?>
<?php require_once __DIR__ .'/footer.php';?>
