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

?>
<script>
    title='Customer Care: Members care contact our customer care here';
    titleTag(title);  
</script>

<div class="container">
    <div class="row text-center  pt-4 pb-4">
        <div class="col-md-3 "></div>
        <div class="col-md-6 text-left w3-green pt-3 pb-3 text-left ">
        <div class="text-right">
            <h5><span class="w3-text-yellow w3-animate-left">OOO </span>Customer Care</h5>
          
        </div>

            <form action="../model/customerCareProcess.php" method="POST">

            <div class="form mt-3">
                <input type="text"  class="form-control" name="subject" placeholder="Subject">
            </div>

 
            <div class="form mt-3">
                  
                <select name="issue" class="form-control"                       placeholder="Your Main Talent">
                <option value="Tech Consultancy">Tech Consultancy</option>
                <option value="Payment Issue">Payment issue</option>
                <option value="Technical Issue">Technical issue</option>
                <option value="Report Member">Report Member</option>
                <option value="Tour application">Tour application</option>
                <option value="Awards issue">Awards issue</option>
                <option value="Ban Resolve">Ban Resolve</option>
                


                <option value="Others">Others</option>
                        
                </select>
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
